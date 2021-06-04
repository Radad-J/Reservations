<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     * @throws ApiErrorException
     */
    public function index()
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $intent = PaymentIntent::create([
            'amount' => Cart::total() * 100,
            'currency' => 'eur',
        ]);

        $clientSecret = $intent->client_secret;

        return view('checkout.index', [
            'clientSecret' => $clientSecret
        ]);
    }

    /**
     * Charge method.
     * Uses Stripe's facades to charge the customer's card
     * @Route /charge, as checkout.charge
     * @link https://blog.quickadminpanel.com/stripe-payments-in-laravel-the-ultimate-guide/
     * @param Request $request
     * @return RedirectResponse
     */
    public function charge(Request $request): RedirectResponse
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            Charge::create(array(
                'customer' => $customer->id,
                'amount' => Cart::total() * 100, // Price in cents
                'currency' => 'eur'
            ));

            Cart::destroy();

            return redirect()->route('show.index')->with('success', 'The payment was successful !');
        } catch (\Exception $e) {
            return redirect()->route('show.index')->with('error', 'There was a problem with the payment : ' . $e->getMessage());
        }
    }
}
