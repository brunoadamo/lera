<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Narrative;
use App\Kind;

class PortfolioController extends Controller
{

    //fronend-------------------------
    public function index(Request $request)
    {
        $narratives = Narrative::when($request->search, function($query) use($request) {
                        $search = $request->search;

                        return $query->where('title', 'like', "%$search%")
                            ->where('is_published', true)
                            ->orWhere('content', 'like', "%$search%")
                            ->where('is_published', true);
                    })->where('is_published', true)
                    ->with('rates', 'kind', 'user', 'acts')
                    ->withCount('comments')
                    ->withCount('acts')
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
        
        $kinds = Kind::pluck('title', 'id')->all();

        return view('pages.portfolio', compact('narratives', 'kinds'));
    }
    
    public function single(Narrative $narrative)
    {
        $narrative = $narrative->load(['user', 'comments', 'rates', 'kind']);

        return view('pages.narrative', compact('narrative'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kinds = Kind::pluck('title', 'id')->all();

        return view('admin.narratives.create', compact('kinds'));
    }
    //fronend-------------------------


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Narrative
     */

    protected function store(array $data){
        $file_name = 'null';

        if (Input::file('picture')->isValid()) {
            $path = public_path('uploads/narrative/cover/');
            $extension = Input::file('picture')->getClientOriginalExtension();
            $file_name = uniqid().'.'.$extension;

            Input::file('picture')->move($path, $file_name);
        }

        return Narrative::create([
            'title' => $data['title'],
            'theme' => $data['theme'],
            'kind_id' => $data['kind_id'],
            'act_n' => $data['act_n'],
            'clue' => $data['clue'],
            'content' => $data['content'],
            'picture' => $file_name,
            'user_id' => Auth::id(),
            'status' => 1,

        ]);
    }
}
