<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Narrative;
use App\Act;

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


    public function status(Act $act, int $status)
    {
        $act->status = $status;
        $narrative_id = $act->narrative_id;
        $act->save();

        return redirect('/narrative/' . $narrative_id);
        
    }
    public function denied(Act $act)
    {
        $act->status = 99;
        $narrative_id = $act->narrative_id;
        $act->save();

        return redirect('/narrative/' . $narrative_id);
        
    }
}
