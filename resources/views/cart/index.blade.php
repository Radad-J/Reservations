@extends('layouts.app')

@section('content')
    <div class="px-4 px-lg-0">
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            @if(Cart::count())
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Quantity</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Date & Time</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Remove</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Cart::content() as $show)
                                        <tr>
                                            <th scope="row" class="border-0">
                                                <div class="p-2">
                                                    <img
                                                        src="{{ asset('/storage/' . $show->model->poster_url) }}"
                                                        alt="{{ $show->model->title }}" width="70"
                                                        class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0">
                                                            <a href="#"
                                                               class="text-dark d-inline-block align-middle">
                                                                {{ $show->model->title }}
                                                            </a>
                                                        </h5>
                                                        <span
                                                            class="text-muted font-weight-normal font-italic d-block">
                                                        At : {{ $show->options->theatre }}
                                                    </span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle">
                                                <strong>{{ number_format($show->price, 2) }} €</strong></td>
                                            <td class="border-0 align-middle"><strong>{{ $show->qty }}</strong></td>
                                            <td class="border-0 align-middle">
                                                <strong>{{ $show->options->date . ' at ' . $show->options->time }}</strong>
                                            </td>
                                            <td class="border-0 align-middle">
                                                <form action="{{ route('cart.remove', $show->rowId) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="text-dark"
                                                            style="background: none; border: none">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <form action="{{ route('cart.empty') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-dark">Empty the cart</button>
                                </form>
                        </div>
                    </div>
                </div>

                <div class="row py-5 p-4 bg-white rounded shadow-sm">
                    <div class="col-lg-12">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary</div>
                        <div class="p-4">
                            <p class="font-italic mb-4">Shipping and additional costs are calculated based on your
                                current location.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Order Subtotal </strong><strong>{{ Cart::subtotal() }}
                                        €</strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Tax</strong><strong>{{ Cart::tax()  }} € (21 %)</strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Total</strong>
                                    <h5 class="font-weight-bold">{{ Cart::total() }} €</h5>
                                </li>
                            </ul>
                            <a href="{{ route('checkout.index') }}"
                               class="btn btn-outline-success rounded-pill py-2 btn-block">
                                Proceed to checkout
                            </a>
                        </div>
                    </div>
                </div>
                @else
                    <div>
                        <p>Your cart is empty.</p>
                        <p>Find places for your favorite show <a href="{{ route('show.index') }}">here</a>
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
