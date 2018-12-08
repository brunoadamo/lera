<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Narrative;
use App\Kind;
use App\User ;


class NarrativeController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'picture' => 'max:5120|image',
        ]);
    }

    //fronend-------------------------
    public function index(Request $request)
    {
        $narratives = Narrative::when($request->search, function($query) use($request) {
                        $search = $request->search;

                        return $query->where('title', 'like', "%$search%")
                            ->where('is_published', false)
                            ->orWhere('content', 'like', "%$search%")
                            ->where('is_published', false);
                    })->when($request->kind_id, function($query) use($request) {
                        $kind_id = $request->kind_id;

                        return $query->where('kind_id', $kind_id)
                            ->where('is_published', false);
                    })->where('is_published', false)
                    ->with('rates', 'kind', 'user', 'acts')
                    ->withCount('comments')
                    ->withCount('acts')
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);

        $kinds      = Kind::pluck('title', 'id')->all();

        return view('pages.narratives', compact('narratives', 'kinds'));
    }
 

    public function single(int $id, Request $request)
    {
        //charge the colaborate with the pattern
        // $narrative->load(['user', 'comments', 'rates', 'kind', 'acts']);
        // $narrative = $narrative->load(['user', 'comments', 'rates', 'kind', 'acts']);
        $narrative  = Narrative::find($id)->load(['user', 'comments', 'rates', 'kind']);
        $colaborate = Narrative::find($id)->load(['user', 'comments', 'rates', 'kind']);


        // $colaborate = $narrative->load(['acts' => function ($query) {
        //     $query->where('status', 0);
        // }]);
        //load just the narratives that has the user id in act
        // $colaborates = Narrative::whereHas('acts', function ($query) {
        //     $query->where('user_id', Auth::user()->id);
        // })->get();

        $narrative->load(['acts' => function ($query) {
            $query->where('status', 1);
        }]);

        $colaborate->load(['acts' => function ($query) {
            $query->where('status', '<>', 1);
        }]);

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Narrative $narrative)
    {
        if($narrative->user_id != auth()->user()->id) {
            return redirect('/narratives');
        }

        $kinds = Kind::pluck('title', 'id')->all();

        return view('admin.narratives.edit', compact('narrative', 'kinds'));
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

    protected function store(Request $data){

        $path               = 'uploads/narrative/cover/';
        $file_name          = "example.jpg";
        $is_published       = 0;
        
        if(Input::hasFile('picture')){

            if (Input::file('picture')->isValid()) {
                
                $path_full = public_path($path);
                $extension = Input::file('picture')->getClientOriginalExtension();
                $file_name = uniqid().'.'.$extension;
    
                Input::file('picture')->move($path_full, $file_name);
            }
        }
        
        if($data['act_n'] == 1){
            $is_published     = 1;
        }

        Narrative::create([
            'title' => $data['title'],
            'theme' => $data['theme'],
            'kind_id' => $data['kind_id'],
            'act_n' => $data['act_n'],
            'clue' => $data['clue'],
            'content' => $data['content'],
            'folder' => $path,
            'picture' => $file_name,
            'user_id' => auth()->user()->id,
            'is_published' => $is_published,
            'status' => 1,
        ]);
        return redirect('/narratives');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, Narrative $narrative){

        $path               = $narrative->folder;
        $file_name          = $narrative->picture;
        $is_published       = 0;
        
        if(Input::hasFile('picture')){

            if (Input::file('picture')->isValid()) {
                
                $path_full = public_path($path);
                $extension = Input::file('picture')->getClientOriginalExtension();
                $file_name = uniqid().'.'.$extension;
    
                Input::file('picture')->move($path_full, $file_name);
            }
        }

        if($data['act_n'] == 1){
            $is_published     = 1;
        }
        
        $narrative->update([
            'title' => $data['title'],
            'theme' => $data['theme'],
            'kind_id' => $data['kind_id'],
            'act_n' => $data['act_n'],
            'clue' => $data['clue'],
            'content' => $data['content'],
            'folder' => $path,
            'picture' => $file_name,
            'is_published' => $is_published,
            'user_id' => auth()->user()->id,
            'status' => 1,
        ]);

        return redirect('/narratives');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        // if($comment->user_id != auth()->user()->id && auth()->user()->is_admin == false) {
        //     flash()->overlay("You can't delete other peoples comment.");
        //     return redirect('/admin/posts');
        // }
        
        $narrative        = Narrative::find($id);

        $narrative->delete();
        // flash()->overlay('narrative deleted successfully.');

        return redirect('/profile');
    }
}
