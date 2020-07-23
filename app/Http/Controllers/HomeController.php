<?php

namespace App\Http\Controllers;

use App\Events\PublicChat;
use App\PhoneModel;
use Illuminate\Http\Request;


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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        PublicChat::dispatch("Get my message?");


        return view('home');


    }
    public function home_page()
    {
        $product = PhoneModel::all();
        return response()->view('home', ['product' => $product]);
    }

    public function get_prod($id){
        $product = PhoneModel::findorfail($id);
        return response()->view('show',
            ['product' => $product]);
    }
}
