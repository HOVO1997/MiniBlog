<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AminController extends Controller
{
    public function index(){
        dd(User::all());
    }
}
