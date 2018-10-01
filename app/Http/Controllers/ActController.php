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
    /**
     * Show the form for updating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function update(Request $data, Act $act)
    {

        $narrative_id = $act->narrative_id;
        $act->update([
            'content' => $data['content']           
        ]);

        return redirect('/narrative/' . $narrative_id);
    }
    


    public function status(Act $act, int $status)
    {
        $act->status    = $status;
        $narrative_id   = $act->narrative_id;
        $act->save();
        
        $act_now_n     = (Act::where('narrative_id', $narrative_id)
             ->where('status', 1)
             ->count()) + 1;

        $narrative      = Narrative::find($narrative_id);
 
        //publish the narrative if all acts are filed
        if($narrative->act_n == $act_now_n){
            Narrative::where('id', $narrative_id)->update(['is_published' => 1]);
        }
        
        //update all the others acts from this narrative = denied all others
        if($status == 1){

            Act::where('narrative_id', $narrative_id)
                ->where('status', 0)
                ->update(['status' => 99]);
        }

        return redirect('/narrative/' . $narrative_id);
        
    }
    public function denied(Act $act)
    {
        $act->status = 99;
        $narrative_id = $act->narrative_id;
        $act->save();

        return redirect('/narrative/' . $narrative_id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Act $act, Narrative $narrative)
    {
        return view('admin.acts.edit', compact('act', 'narrative'));
    }
}
