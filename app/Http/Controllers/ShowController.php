<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Show;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index() {
        $shows = Show::all();

        return view('show.index', [
            'shows' => $shows,
            'resource' => 'show',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create() {
        $locations = Location::all('designation');

        return view('show.create', [
            'locations' => $locations,
            'resource' => 'show'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request): string {
        // TODO: Error handling
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'location' => 'required',
            'showImage' => 'required|image|mimes:jpeg,png,jpg|max:4092'
        ]);

        $show               = new Show;
        $show->slug         = Str::of($request->title)->slug();
        $show->title        = $request->title;
        $show->description  = $request->description;
        $show->location_id  = $request->location;
        $show->price        = $request->price;
        $show->bookable     = !empty($request->bookable) && $request->bookable === 'on';

        if ($request->file('showImage')->isValid()) {
            // Rewrite image's name to avoid duplicates
            $imageName = Carbon::now()->timestamp . '.' . $request->showImage->extension();
            $show->poster_url = $imageName;
            $request->showImage->move(public_path('images/uploaded-posters'), $imageName);
        } else {
            return view('show.create', [
                'resource' => 'show'  // TODO: Add error handling
            ]);
        }

        return $show->save()
            ? redirect()->route('show.index')->with('message', 'Show has been added !')
            : view('show.create', ['resource' => 'show']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id) {
        $show = Show::find($id);

        //Récupérer les artistes du spectacle et les grouper par type
        $collaborateurs = [];

        foreach ($show->artistTypes as $at) {
            $collaborateurs[$at->type->type][] = $at->artist;
        }

        return view('show.show', [
            'show' => $show,
            'collaborateurs' => $collaborateurs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $shows = Show::query()
            ->where('title', 'LIKE', "%{$search}%")
            //TODO
            //Save for other search options
            /*->orWhere('body', 'LIKE', "%{$search}%")*/
            ->get();

        // Return the search view with the resluts compacted
        return view('show.index', [
            'shows' => $shows,
            'resource' => 'show',
        ]);
    }
}
