<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Service;
use Illuminate\Support\Carbon;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy user đầu tiên (hoặc bạn có thể chỉ định user_id cụ thể)
        $user = User::find(2);

        if (!$user) {
            $this->command->error('No users found. Please seed users first.');
            return;
        }

        // Lấy danh sách service
        $services = Service::all();

        if ($services->isEmpty()) {
            $this->command->error('No services found. Please seed services first.');
            return;
        }

        // Tạo 5 đơn hàng mẫu
        for ($i = 1; $i <= 5; $i++) {

            $invoice = Invoice::create([
                'user_id' => $user->id,
                'total' => 0,
                'status' => $i === 5 ? 'canceled' : 'active',
                'created_at' => Carbon::now()->subDays(rand(1, 10)),
                'updated_at' => now(),
            ]);

            $total = 0;

            // Mỗi invoice có 1–3 service
            $items = $services->random(rand(1, 3));

            foreach ($items as $service) {
                $qty = rand(1, 3);
                $price = $service->price;

                InvoiceDetail::create([
                    'invoice_id' => $invoice->id,
                    'service_id' => $service->id,
                    'quantity' => $qty,
                    'price' => $price,
                ]);

                $total += $price * $qty;
            }

            // Update tổng tiền
            $invoice->update([
                'total' => $total,
            ]);
        }

        $this->command->info('Invoice & InvoiceDetail sample data seeded successfully!');
    }
}
