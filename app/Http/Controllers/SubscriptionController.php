<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    //
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscriptions,email'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $ipAddress = $request->ip();

        Subscription::create([
            'email' => $request->email,
            'ip_address' => $ipAddress
        ]);

        return redirect()->back()->with('success', 'Thank you for subscribing!');
    }
}
