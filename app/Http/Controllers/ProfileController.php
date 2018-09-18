<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Narrative;
use App\Act;
use Auth;

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
        $narratives = Narrative::where('user_id', Auth::user()->id)
        ->with('rates', 'kind', 'user')
        ->withCount('comments')
        ->withCount('acts')
        ->simplePaginate(10);

        //load just the narratives that has the user id in act
        $colaborates = Narrative::whereHas('acts', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->get();

        return view('pages.profile', compact('narratives','colaborates'));
    }
}
