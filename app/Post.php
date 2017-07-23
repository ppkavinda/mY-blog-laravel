<?php

namespace App;

use App\User;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'title',
    	'body',
        'user_id',
    ];

    public function comments(){
    	return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
  
    public function addComment($body){
        // Comment::create([
        //  'body' => $body,
        //  'post_id' => $this->id,
        // ]);

        $this->comments()->save($body);
    }

    public function scopeFilter($query, $filters){
        if($month = $filters['month']){
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if($year = $filters['year']){
            $query->whereYear('created_at' , $year);
        }
    }
    public static function archives(){
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('month', 'year')
            ->orderByRaw("max('created_at')")
            ->get();

    }
}
