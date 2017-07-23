<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	protected $fillable = [
		'name',
		'email',
		'password',
	];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function posts(){
    	return $this->hasMany(Post::class);
    }

    public function comments(){
    	return $this->hasMany(Comment::class);
    }

    public function publish($post){
        $this->posts()->save($post);
    }

}
