<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Response;
use Redirect;
use DB;
use App\{Country, State, City};


use App\Http\Requests\Users\UpdateProfileRequest;
use App\User;

class UsersController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	   /* public function __construct()
	    {
	        $this->middleware('auth');
	    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	return view('users.index')->with('users',User::all());
    }
    public function edit()
    {
    	return view('users.edit')->with('user',auth()->user())->with('countries',Country::all());
        //return view('users.edit')->with('user',auth()->user());
    }
    public function view($id)
    {
        
        $user = User::find($id);
        return view('users.view-details')->with('user_list',User::where('id', '=', $id)->get());
    }
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function update(UpdateProfileRequest $request)
    {
    	
        $user = auth()->user();
    	$user->update([
    		'name'	=> $request->name,
    		'about' => $request->about,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
    	]);
    	session()->flash('success','User updated successfully.');
    	return redirect()->back();
    }

    public function makeAdmin(User $user)
    {
    	$user->role = 'admin';
    	$user->save();
    	session()->flash('success','User made admin successfully.');
    	return redirect(route('users.index'));
    }
}
