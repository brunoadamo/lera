<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Narrative;
use App\Kind;

class NarrativeController extends Controller
{

    //fronend-------------------------
    public function index(Request $request)
    {
        $narratives = Narrative::when($request->search, function($query) use($request) {
                        $search = $request->search;
                        
                        return $query->where('title', 'like', "%$search%")
                            ->orWhere('content', 'like', "%$search%");
                    })->where('is_published', false)
                    ->with('rates', 'kind', 'user')
                    ->withCount('comments')
                    ->simplePaginate(5);

        return view('pages.narratives', compact('narratives'));
    }
    
    public function single(Narrative $narrative, Request $request)
    {
        $narrative = $narrative->load(['user', 'comments', 'rates', 'kind']);

        $narrative = $narrative->load(['acts' => function ($query) {
            $query->where('status', 1);
        }]);

        $colaborate = $narrative->load(['acts']);

        return view('pages.narrative', compact('narrative', 'colaborate'));
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

    public function comment(Request $request, Narrative $narrative)
    {
        $this->validate($request, ['content' => 'required']);

        $narrative->comments()->create([
            'content' => $request->content
        ]);
        //flash()->overlay('Comentário criado!');

        return redirect("/narrative/{$narrative->id}");
    }
    public function act(Request $request, Narrative $narrative)
    {
        $this->validate($request, ['content' => 'required']);

        $narrative->acts()->create([
            'content' => $request->content
        ]);
        //flash()->overlay('Comentário criado!');

        return redirect("/narrative/{$narrative->id}");
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
