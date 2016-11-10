<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ChecklistController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function load(){
        $items = DB::table('checklistItems')->where('id', '3')->pluck('item');
        return view('checklist', ['items' => $items]);
    }
    public function add(){
        DB::table('checklistItems')->insert(
            ['UserID'=> DB::table('usersForTravelApp')->where('item', Input::get('item'))->value('id')]
            );
        $items = DB::table('checklistItems')->where('id', '3')->pluck('item');
        return view('checklist', ['items' => $items]);
    }
}