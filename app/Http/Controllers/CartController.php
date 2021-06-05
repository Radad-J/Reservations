<?php

namespace App\Http\Controllers;

use App\Models\Representation;
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
    public function store(Request $request): RedirectResponse
    {
        $show = Show::find($request->show_id);

        // Get infos of the representation
        $representationInfo = Representation::getRepresentationInfo($request->representation_id);
        $dateAndTime = Representation::getDateAndTime($representationInfo->first()->when);

        // Make sure the show is bookable
        if ($show->bookable) {
            Cart::add($show->id, $show->title, 1, $show->price, [
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
     * removeOne method.
     * Remove a single instance of an item from the cart
     * @param Request $request
     * @return RedirectResponse
     */
    public function removeOne(Request $request): RedirectResponse
    {
        $updatedQuantity = Cart::get($request->rowId)->qty - 1;
        Cart::update($request->rowId, $updatedQuantity);

        return back()->with('success', 'One place has been removed.');
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
