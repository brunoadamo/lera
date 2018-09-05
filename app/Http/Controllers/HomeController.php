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
            
            return $query->where(['title', 'like', "%$search%"])
                ->orWhere('content', 'like', "%$search%");
        })->where('is_published', false)
        ->with('rates', 'kind', 'user')
        ->withCount('acts')
        ->withCount('comments')
        ->simplePaginate(6);

        $narratives_full = Narrative::when($request->search, function($query) use($request) {
            $search = $request->search;
            
            return $query->where(['title', 'like', "%$search%"])
                ->orWhere('content', 'like', "%$search%");
        })->where('is_published', true)
        ->with('rates', 'kind', 'user')
        ->withCount('acts')
        ->withCount('comments')
        ->simplePaginate(8);

        return view('pages.home', compact('narratives', 'narratives_full'));
    }
}
