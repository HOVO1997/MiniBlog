<?php

namespace App\Http\Controllers;

use App\PhoneModel;
use Illuminate\Http\Request;

class BasketController extends Controller
{

private  $i = 0;
    public function basket_view(){
        return view('basket');
    }

    public function basket_add($productId){

    $products = PhoneModel::find($productId);

    if (session('user.items') !== null){
        for ($i = 0; $i < count(session('user.items'));$i++){
            if(empty(session('user.items')[$i])){
                continue;
            }
            if (intval($productId) === session('user.items')[$i]->id){
                $unset = session('user.items')[$i];
                unset($unset);
                return redirect('home');
            }
        }
        session()->push('user.items',$products);
    }else{
        session()->push('user.items',$products);
    }
        return redirect('home');
    }

    public function basket_delete($request){

    session()->forget("user.items");

    return redirect()->back();


    }
}

