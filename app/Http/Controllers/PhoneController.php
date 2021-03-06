<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhoneModel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = PhoneModel::all();
        return response()->view('admin', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             'firm' => 'required|max:255',
            'model' => 'required|max:255',
            'price' => 'required|integer|max:99999999',
            'cont' =>'required|max:255'
        ]);

        $image = $request->file('select_file');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("images"), $new_name);

        $product = new PhoneModel();
        $product->firm = $request->firm;
        $product->model = $request->model;
        $product->price = $request->price;
        $product->content = $request->cont;
        $product->image = $new_name;
        $product->save();

        return redirect('/admin')
            ->with(['msg'=>'The product has been created successfully!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = PhoneModel::findorfail($id);
        return response()->view('show',
            ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = PhoneModel::findorfail($id);
        return response()->view('edit',
            ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
            'firm' => 'required|max:255',
            'model' => 'required|max:255',
            'price' => 'required|integer|max:99999999',
            'cont' =>'required|max:255'
        ]);
        $image = $request->file('select_file');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("images"), $new_name);

        $product['firm'] = $request->firm;
        $product['model'] = $request->model;
        $product['price'] = $request->price;
        $product['content'] = $request->cont;
        $product['image'] = $new_name;
        PhoneModel::where('id', $id)->update($product);

        return redirect('/admin')->with(
            ['msg' => 'The products has been successfully updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {

        $img = PhoneModel::select('image')->where('id', $id)->get()[0]["image"];
        $public =  public_path()."\images"."\\$img";
        PhoneModel::where('id', $id)->delete();
        unlink($public);
        return redirect('/admin')->with(
            ['msg' => 'The products has been successfully deleted']);
    }

    public function locale($locale){
        session(['locale'=> $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }
}
