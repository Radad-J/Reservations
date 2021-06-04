<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class CartController
 * @package App\Http\Controllers
 * @link https://github.com/hardevine/LaravelShoppingcart
 */
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $show = Show::find($request->show_id);

        // Make sure the show is bookable
        if ($show->bookable) {
            Cart::add($show->id, $show->title, 1, $show->price)
                ->associate('App\Models\Show');

            return redirect()->route('show.index')->with('success', 'The place has been added to the cart.');
        }

        return redirect()->route('show.index')->with('error', 'The show has no more representation available.');
    }

    /**
     * remove method.
     * Removes a single item from the cart
     * @param Request $request
     * @return RedirectResponse
     */
    public function remove(Request $request): RedirectResponse
    {
        Cart::remove($request->rowId);

        return back()->with('success', 'The item has been removed.');
    }

    /**
     * destroy method.
     * Empties the cart.
     *
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        Cart::destroy();

        return redirect()->route('cart.index');
    }
}
