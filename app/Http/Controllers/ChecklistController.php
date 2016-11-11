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
            ['id'=> DB::table('usersForTravelApp')->where('email', Auth::user()->email)->value('id'),'item'=>Input::get('itemAdd'),'isDone'=>'0']
            );
        $items = DB::table('checklistItems')->get()->where('id', DB::table('usersForTravelApp')->where('email', Auth::user()->email)->value('id') );
        return view('checklist', ['items' => $items]);
    }
    public function delete(){
        DB::table('checklistItems')->where('item', Input::get('itemDelete'))->delete();

        $items = DB::table('checklistItems')->get()->where('id', DB::table('usersForTravelApp')->where('email', Auth::user()->email)->value('id') );
        return view('checklist', ['items' => $items]);
    }
    public function check($itemName, $isChecked){
        DB::table('checklistItems')->where('item', $itemName)->update(['isDone'=>$isChecked]);
        $items = DB::table('checklistItems')->get()->where('id', DB::table('usersForTravelApp')->where('email', Auth::user()->email)->value('id'));

        return view('checklist', ['items' => $items]);
    }
}