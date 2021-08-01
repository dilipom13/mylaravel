<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    //
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
    public function index(){
        return view('posts.index')->with('posts_record',Post::all());
    }
    public function create(){
    	//return view('posts.create');
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }
    public function store(CreatePostRequest $request){

    	//dd($request->all());
        //dd($request->image->store('posts'));
        $image = $request->image->store('posts');

    	$post = Post::create([
    		'title'		   =>	$request->title,
    		'description'  =>   $request->description,
    		'content'      =>   $request->content,
    		'image'        =>   $image,
            'published_at' =>   $request->published_at,
            'category_id'  =>   $request->category
    	]);

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

    	session()->flash('success','Post Created Successfully');
    	return redirect(route('posts.index'));
    }
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
    }
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title','content','description','published_at','category_id']);



        if($request->hasFile('image')){

            // Upload it

            $image = $request->image->store('posts');

            // Delete Old One

            Storage::delete($post->image);

            //

            $data['image'] = $image;
        }

        // Update attributes
        //$post->category()->associate($request->category);
        $post->category_id = $request->category;



        if($request->tags)
        {
            $post->tags()->sync($request->tags);
        }

        $post->update($data);

        // Flash Message

        session()->flash('success','Post updated successfully');

        // Redirect User

        return redirect(route('posts.index'));

    }
    public function destroy($id)
    {
        //dd($post->id);
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();

        if($post->trashed())
        {
            Storage::delete($post->image);
            $post->forceDelete();
        }
        else
        {
            $post->delete();    
        }
        session()->flash('success','Post Deleted Successfully');
        return redirect(route('posts.index'));
    }
    public function trashed()
    {   
        //$trashed = Post::withTrashed()->get();
        $trashed = Post::onlyTrashed()->get();
        
        //dd($reuest->all());
        //dd($trashed);
        return view('posts.index')->with('posts_record',$trashed);
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        $post->restore();
        session()->flash('success','Post Restore Successfully');
        return redirect()->back();
    }
}