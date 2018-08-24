<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Narrative;

class NarrativeController extends Controller
{
    public function index()
    {
        $narratives = Narrative::orderBy('title', 'desc')->leftJoin('users', 'users.id', '=', 'narratives.user_id')->get();
        

        return view('pages.narratives', ['narratives' => $narratives]);
        // return Narrative::all();
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
