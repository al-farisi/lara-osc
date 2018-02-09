<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class CheckoutController extends Controller
{

    public function charge(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        
            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));
        
            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 2000,
                'currency' => 'usd'
            ));
            return redirect('/')->with(['code' => 'success', 'message' => 'Order has been paid successfully!']);
            
        } catch (\Exception $ex) {
            return redirect('/')->with(['code' => 'danger', 'message' => $ex->getMessage()]);
        }
    }

}