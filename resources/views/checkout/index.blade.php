@extends('layouts.app')

@section('payment-script')
    <script src="https://js.stripe.com/v3/"></script>
    <style></style>
@endsection

@section('content')
    <h1>Payment Page</h1>
    <h3>This needs to be designed</h3>
    <form action="{{ route('checkout.charge') }}" method="post">
        @csrf
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ env('STRIPE_PUB_KEY') }}"
            data-amount="{{ Cart::total() * 100 }}"
            data-name="Payment"
            data-description="Enter your card's details"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="eur">
        </script>
    </form>
@endsection

@section('payment-script')
    <script>
        var stripe = Stripe("{{ env('STRIPE_PUB_KEY') }}");
        var elements = stripe.elements();
    </script>
@endsection
