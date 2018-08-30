<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Narrative;

class NarrativeController extends Controller
{

    //fronend-------------------------
    public function index(Request $request)
    {
        $narratives = Narrative::when($request->search, function($query) use($request) {
                        $search = $request->search;
                        
                        return $query->where('title', 'like', "%$search%")
                            ->orWhere('content', 'like', "%$search%");
                    })->with('rates', 'kind', 'user')
                    ->withCount('comments')
                    ->simplePaginate(5);

        return view('pages.narratives', compact('narratives'));
    }
    
    public function single(Narrative $narrative)
    {
        $narrative = $narrative->load(['user', 'comments', 'rates', 'kind']);

        return view('pages.narrative', compact('narrative'));
    }
    //fronend-------------------------


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Narrative
     */

    protected function create(array $data){
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

    public function show(Narrative $narrative)
    {
        return $narrative;
    }
    public function showByIdNarrative($id)
    {
        $narrative = Narrative::where('narrative_id', $id)->get();
        return $narrative;
    }
    public function showByIdUser($id)
    {
        $narrative = Narrative::where('user_id', $id)->get();
        return $narrative;
    }
    public function showByStatus($id)
    {
        $narrative = Narrative::where('status', $id)->get();
        return $narrative;
    }

    public function store(Request $request)
    {
        $narrative = Narrative::create($request->all());

        return response()->json($narrative, 201);
    }

    public function update(Request $request, Narrative $narrative)
    {
        $narrative->update($request->all());

        return response()->json($narrative, 200);
    }

    public function delete(Narrative $narrative)
    {
        $narrative->delete();

        return response()->json(null, 204);
    }
}
