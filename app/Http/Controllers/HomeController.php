<?php

namespace App\Http\Controllers;

use App\Narrative;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $narratives = Narrative::when($request->search, function($query) use($request) {
            $search = $request->search;
            
            return $query->where('title', 'like', "%$search%")
                ->orWhere('content', 'like', "%$search%");
        })->with('rates', 'kind', 'user')
        ->withCount('comments')
        ->simplePaginate(5);

return view('pages.home', compact('narratives'));
    }
}
