<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function load(){
        $items = DB::table('checklistItems')->get()->where('id', DB::table('usersForTravelApp')->where('email', Auth::user()->email)->value('id'));

        return view('checklist', ['items' => $items]);
    }
    public function add(){
        DB::table('checklistItems')->insert(
            ['id'=> DB::table('usersForTravelApp')->where('email', Auth::user()->email)->value('id'),'item'=>Input::get('item'),'isDone'=>'0']
            );
        $items = DB::table('checklistItems')->where('id', DB::table('usersForTravelApp')->where('email', Auth::user()->email)->value('id') );
        return view('checklist', ['items' => $items]);
    }
}