<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('user.profile', [
            'user' => $request->user(),
        ]);
    }
    public function updatePhone(Request $request)
    {
        $request->validate([
            'phone_number' => [
                'required',
                'regex:/^[0-9+\s\-]{8,20}$/'
            ],
        ]);

        $user = Auth::user();
        $user->phone_number = $request->phone_number;
        $user->save();

        return redirect()
            ->route('profile')
            ->with('success', 'Phone number updated successfully.');
    }
}
