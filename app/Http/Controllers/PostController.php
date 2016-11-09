<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $posts = DB::table('posts')->get();
        foreach($posts as $key => $value){
            $value->UserID = DB::table('usersForTravelApp')->where('id', $value->UserID)->value('email');
        }
        return view('post', ['posts' => $posts]);
    }
    public function create(){
        DB::table('posts')->insert(
            ['UserID'=> DB::table('usersForTravelApp')->where('email', Input::get('email'))->value('id') ,'Post'=>Input::get('Post')]
            );
        $posts = DB::table('posts')->get();
        foreach($posts as $key => $value){
            $value->UserID = DB::table('usersForTravelApp')->where('id', $value->UserID)->value('email');
        }
        return view('post', ['posts' => $posts]);
    }
}