<?php

namespace App\Http\Controllers;

use App\Exports\ExportShowsToCSV;
use App\Exports\ShowsExportToCSV;
use App\Imports\ShowsImport;
use App\Models\Location;
use App\Models\Show;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use function PHPUnit\Framework\isNan;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        $shows = Show::all();

        return view('show.index', [
            'shows' => $shows,
            'resource' => 'show',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
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

    /**
     * exportToExcel method.
     * Exports the list of shows into an Excel file.
     */
    public function exportToExcel()
    {
        if (is_null(Auth::user()) || Auth::user()->role->id != 1) {
            return redirect()->route("show.index")->with("error", "You are not authorised to access this page.");
        }

        return Excel::download(new ExportShowsToCSV, 'showsList.xlsx');
    }

    /**
     * exportToCSV method.
     * Exports the list of shows into a CSV file.
     */
    public function exportToCSV()
    {
        if (is_null(Auth::user()) || Auth::user()->role->id != 1) {
            return redirect()->route("show.index")->with("error", "You are not authorised to access this page.");
        }

        return Excel::download(new ExportShowsToCSV, 'showsList.csv');
    }

    /**
     */
    public function importForm()
    {
        if (is_null(Auth::user()) || Auth::user()->role->id != 1) {
            return redirect()->route("show.index")->with("error", "You are not authorised to access this page.");
        }

        return view('show.import-form');
    }

    /**
     * importShows method.
     * Imports a list of shows from an uploaded .csv or .xslx file
     * @param Request $request
     */
    public function importShows(Request $request)
    {

        if (is_null(Auth::user()) || Auth::user()->role->id != 1) {
            return redirect()->route("show.index")->with("error", "You are not authorised to access this page.");
        }

        if (is_string(self::verifyCells($request))) {
            $cell = self::verifyCells($request);

            return redirect()->route('show.index')->with('error', 'The column ' . $cell . ' is missing in your Excel file.');
        }

        Excel::import(new ShowsImport, $request->userFile);

        return redirect()->route('show.index')->with('success', 'Show(s) have been added !');
    }

    public static function verifyCells(Request $request)
    {
        $requiredHeadings = [
            'title',
            'slug',
            'description',
            'poster_url',
            'bookable',
            'location_id',
            'artists',
            'price'
        ];

        $headingsArray = (new HeadingRowImport)->toArray($request->userFile);
        $headings = $headingsArray[0][0];

        foreach ($requiredHeadings as $requiredCell) {
            if (!in_array($requiredCell, $headings, true)) {
                return $requiredCell;
            }
        }

        return true;
    }
    public function order(Request $request){
        $request->validate([
            'field'=>'required',
            'orderType'=> 'required'
        ]);
        $shows= Show::orderby ($request->field,$request->orderType)->get();
        return view('show.index',['shows' => $shows]);
    } 
}
