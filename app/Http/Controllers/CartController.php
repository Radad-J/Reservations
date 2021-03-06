<?php

namespace App\Http\Controllers;

use App\Models\Representation;
use App\Models\Show;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

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
    public function store(Request $request): RedirectResponse
    {
        $show = Show::find($request->show_id);

        // Get infos of the representation
        $representationInfo = Representation::getRepresentationInfo($request->representation_id);
        $dateAndTime = Representation::getDateAndTime($representationInfo->first()->when);

        // Check if user is not logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in before making a purchase.');
        }

        // Make sure the show is bookable
        if ($show->bookable) {
            Cart::add($show->id, $show->title, $request->order_quantity, $show->price, [
                'representation_id' => $request->representation_id,
                'theatre'           => $representationInfo->first()->designation,
                'date'              => $dateAndTime['date'],
                'time'              => $dateAndTime['time']
            ])->associate(Show::class);

            return redirect()->route('show.index')->with('success', 'The place has been added to the cart.');
        }

        return redirect()->route('show.index')->with('error', 'The show has no more representation available.');
    }

    /**
     * remove method.
     * Removes an item from the cart
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
