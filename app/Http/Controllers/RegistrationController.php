<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
	public function __construct(){
		$this->middleware('guest');
	}

    public function create(){
    	return view('registration.create');
    }

    public function store(){
    	$this->validate(request(), [
    		'name' => 'required|max:255',
    		'email' => 'required|email',
    		'password' => 'required',
    	]);

    	$user = User::create([
    		'name' => request('name'),
    		'email' => request('email'),
    		'password' => bcrypt(request('password')),
    	]);

    	auth()->login($user);

        session()->flash('message' , 'You successfully registered to mY blog.');

    	return redirect()->home();
    }
}
