<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\Service;
use App\Models\PaypalPayment;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Str;

class PayPalService
{
    protected Client $client;
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('paypal.base_url');
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout'  => 30,
        ]);
    }

    private function getAccessToken(): string
    {
        try {
            $response = $this->client->post('/v1/oauth2/token', [
                'auth' => [config('paypal.client_id'), config('paypal.client_secret')],
                'form_params' => ['grant_type' => 'client_credentials'],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            if (empty($data['access_token'])) {
                abort(500, 'PayPal token error');
            }

            return $data['access_token'];
        } catch (RequestException $e) {
            $body = $e->hasResponse() ? (string) $e->getResponse()->getBody() : $e->getMessage();
            abort(500, 'PayPal token request failed: ' . $body);
        }
    }

    public function createOrderAndRedirect(Invoice $invoice, Service $service, $amount, int $userId)
    {
        $amountStr = number_format((float) $amount, 2, '.', '');
        $reference = (string) Str::uuid();

        $accessToken = $this->getAccessToken();

        try {
            $response = $this->client->post('/v2/checkout/orders', [
                'headers' => [
                    'Authorization' => "Bearer {$accessToken}",
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'intent' => 'CAPTURE',
                    'purchase_units' => [[
                        'reference_id' => $reference,
                        'description'  => 'Service: ' . ($service->name ?? 'Service'),
                        'amount' => [
                            'currency_code' => 'USD',
                            'value' => $amountStr,
                        ],
                    ]],
                    'application_context' => [
                        'brand_name' => 'Lunasjaya',
                        'landing_page' => 'BILLING',
                        'user_action' => 'PAY_NOW',
                        'return_url' => route('paypal.return'),
                        'cancel_url' => route('paypal.cancel'),
                    ],
                ],
            ]);
        } catch (RequestException $e) {
            $body = $e->hasResponse() ? (string) $e->getResponse()->getBody() : $e->getMessage();
            abort(500, 'PayPal create order failed: ' . $body);
        }

        $data = json_decode($response->getBody()->getContents(), true);

        $paypalOrderId = $data['id'] ?? null;
        if (!$paypalOrderId) abort(500, 'PayPal order id missing');

        $approveUrl = collect($data['links'] ?? [])->firstWhere('rel', 'approve')['href'] ?? null;
        if (!$approveUrl) abort(500, 'PayPal approve link not found');

        // Lưu DB paypal_payments
        PaypalPayment::create([
            'invoice_id' => $invoice->id,
            'user_id' => $userId,
            'service_id' => $service->id,
            'paypal_order_id' => $paypalOrderId,
            'paypal_capture_id' => null,
            'amount' => $amountStr,
            'currency' => 'USD',
            'status' => 'CREATED',
            'raw_response' => $data,
        ]);

        // Lưu session để return/cancel tìm nhanh (optional)
        session([
            'paypal_order_id' => $paypalOrderId,
            'paypal_invoice_id' => $invoice->id,
        ]);

        return redirect()->away($approveUrl);
    }

    public function capture(string $orderId): array
    {
        $accessToken = $this->getAccessToken();

        $response = $this->client->post("/v2/checkout/orders/{$orderId}/capture", [
            'headers' => [
                'Authorization' => "Bearer {$accessToken}",
                'Content-Type'  => 'application/json',
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
