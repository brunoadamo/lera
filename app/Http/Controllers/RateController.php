<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rate;

class RateController extends Controller
{
    public function index()
    {
        return Rate::all();
    }

    public function show(Rate $rate)
    {
        return $rate;
    }
    public function showByIdNarrative($id)
    {
        $rate = Rate::where('narrative_id', $id)->get();
        return $rate;
    }
    public function showByIdUser($id)
    {
        $rate = Rate::where('user_id', $id)->get();
        return $rate;
    }
    public function showByStatus($id)
    {
        $rate = Rate::where('status', $id)->get();
        return $rate;
    }

    public function store(Request $request)
    {
        $rate = Rate::create($request->all());

        return response()->json($rate, 201);
    }

    public function update(Request $request, Rate $rate)
    {
        $rate->update($request->all());

        return response()->json($rate, 200);
    }

    public function delete(Rate $rate)
    {
        $rate->delete();

        return response()->json(null, 204);
    }
}
