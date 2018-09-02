<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Narrative;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // $request->user() returns an instance of the authenticated user...
        $narratives = Narrative::when($request->search, function($query) use($request) {
            $search = $request->search;
            
            return $query->where(['title', 'like', "%$search%"], ['id_user', '=', Auth::user()->id])
                ->orWhere('content', 'like', "%$search%");
        })->with('rates', 'kind', 'user')
        ->withCount('comments')
        ->withCount('acts')
        ->simplePaginate(8);
            
        return view('pages.profile', compact('narratives'));
        return view('profile');
    }
}
