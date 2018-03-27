<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();

        $todo = DB::table('todo')->where('id_user', $user_id)->get();
        $doing = DB::table('doing')->where('id_user', $user_id)->get();
        $finished = DB::table('finished')->where('id_user', $user_id)->get();

        return view('home')->with("dados", ['todo' => $todo, 'doing' => $doing, 'finished' => $finished, 'id_user' => $user_id]);
    }


}
