<?php

namespace App\Http\Controllers;


use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoriesRequest;

class CategoryController extends Controller
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
        return view('category.index')->with('categories',Category::all());
    }
    public function create()
    {
        return view('category.create');
    }
    public function edit(Category $category)
    {
        //echo 'Edit heare';
        return view('category.create')->with('category', $category);
    }
    public function update(UpdateCategoriesRequest $request, Category $category)
    {
    	//$category->name = $request->name;
    	$category->update([
    		"name" => $request->name, 					//Category Name Field
    		'description'=>$request->description        //Category Description Field
    	]);
    	$category->save();
    	session()->flash('success','Category Updated Successfully');
    	return redirect(route('categories.index'));
    }

    //public function store(Request $request)
    public function store(CreateCategoryRequest $request)
    {
        /*$this->validate($request,[
        	'name' => 'required|unique:categories'
        ]);*/

        	/*$ncategory = new Category();*/

        	 Category::create([
        	 	'name'=>$request->name,
        	 	'description'=>$request->description
        	 ]);

        	 //Category::create($request->all());

        	 session()->flash('success','Category Created');

        	 return redirect(route('categories.index'));

    }
    public function destroy(Category $category){


        if($category->posts->count() > 0)
        {
            session()->flash('error','Category cannot be deleted,because it is associated to some posts.');
            return redirect()->back();
        }
    	$category->delete();
    	session()->flash('success','Category Deleted Successfully');
    	return redirect(route('categories.index'));
    }

}
