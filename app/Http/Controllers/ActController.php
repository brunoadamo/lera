<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Narrative;

class ActController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Narrative $narrative)
    {
        // $narrative = $narrative->load(['user', 'comments', 'rates', 'kind', 'acts']);
        return view('admin.acts.create', compact('narrative'));
    }
}
