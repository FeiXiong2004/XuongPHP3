<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::paginate(10);
        return view('admin.colors.index', compact('colors'));
    }
    public function create(){
        return view('admin.colors.create');
    }
    public function store(Request $request){
        Color::create($request->all());
        return redirect()->route('admin.color.index')->with('message', 'Color created successfully');
    }
    public function edit(Color $color){
        return view('admin.colors.edit', compact('color'));
    }
    public function update(Request $request, Color $color){
        $color->update($request->all());
        return redirect()->route('admin.color.index')->with('message', 'Color updated successfully');
    }
    public function destroy(Color $color){
        $color->delete();
        return redirect()->route('admin.color.index')->with('message', 'Color deleted successfully');
    }
}
