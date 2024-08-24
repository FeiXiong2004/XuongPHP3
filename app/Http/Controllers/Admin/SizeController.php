<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index(){
        $sizes = Size::paginate(10);
        return view('admin.sizes.index',compact('sizes'));
    }
    public function create(){
        return view('admin.sizes.create');
    }
    public function store(Request $request){
        Size::create($request->all());
        return redirect()->route('admin.size.index')->with('message','Size created successfully');
    }
    public function edit(Size $size){
        return view('admin.sizes.edit',compact('size'));
    }
    public function update(Request $request, Size $size){
        $size->update($request->all());
        return redirect()->route('admin.size.index')->with('message','Size updated successfully');
    }
    public function destroy(Size $size){
        $size->delete();
        return redirect()->route('admin.size.index')->with('message','Size deleted successfully');
    }
}
