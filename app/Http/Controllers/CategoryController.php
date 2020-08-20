<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Str;

class CategoryController extends Controller{

    public function __construct(){
        $this->middleware(['auth']);
    }
    
    public function index() {
        $data = Category::get();
        return view('backend.category.index', compact(['data']));
    }

    public function create() {
        return view('backend.category.create');
    }

    public function store(Request $request) {

        $rules = $this->validate($request,[
            'name' => 'required|unique:categories,name',
            'description' => 'required'
        ]);

        if($rules) {
            $data = new Category;
            $data->name = $request->name;
            $data->slug = Str::slug($request->name);
            $data->description = $request->description;

            if($data->save()) {
                return redirect('/manage/category')->with('success','Data Berhasil Disimpan');
            } else {
                return redirect('/manage/category')->with('failed','Data Gagal Disimpan');
            }
        }
    }

    public function edit($id){
        $data = Category::where('id',$id)->first();
        return view('backend.category.update', compact(['data']));
    }

    public function update(Request $request, $id) {
        $rules = $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);

        if($rules) {
            $data = Category::find($id);
            $data->name = $request->name;
            $data->slug = Str::slug($request->name);
            $data->description = $request->description;

            if($data->save()) {
                return redirect('/manage/category')->with('success','Data Berhasil Diubah');
            } else {
                return redirect('/manage/category')->with('failed','Data Gagal Diubah');
            }
        }
    }
    
    public function destroy($id) {
        $data = Category::where('id', $id)->first();
        if($data->delete()) {
            return redirect('/manage/category')->with('success','Data Berhasil Dihapus');
        } else {
            return redirect('/manage/category')->with('failed','Data Gagal Dihapus');
        }
    }
}
