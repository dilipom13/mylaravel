<?php

namespace App\Http\Controllers;


use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagsRequest;

class TagsController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('tags.index')->with('tags',Tag::all());
    }
    public function create()
    {
        return view('tags.create');
    }
    public function edit(Tag $tag)
    {
        //echo 'Edit heare';
        return view('tags.create')->with('tag', $tag);
    }
    public function update(UpdateTagsRequest $request, Tag $tag)
    {
    	//$tag->name = $request->name;
    	$tag->update([
    		"name" => $request->name, 					//Tag Name Field
    	]);
    	$tag->save();
    	session()->flash('success','Tag Updated Successfully');
    	return redirect(route('tags.index'));
    }

    //public function store(Request $request)
    public function store(CreateTagRequest $request)
    {
        /*$this->validate($request,[
        	'name' => 'required|unique:Tags'
        ]);*/

        	/*$nTag = new Tag();*/

        	 Tag::create([
        	 	'name'=>$request->name,
        	 ]);

        	 //Tag::create($request->all());

        	 session()->flash('success','Tag Created');

        	 return redirect(route('tags.index'));

    }
    public function destroy(Tag $tag){
    	

        if( $tag->posts->count() > 0 )
        {
            session()->flash('error','Tag cannot be deleted,because it is associated to some posts.');
            return redirect()->back();
        }


    	$tag->delete();
    	session()->flash('success','Tag Deleted Successfully');
    	return redirect(route('tags.index'));
    }

}
