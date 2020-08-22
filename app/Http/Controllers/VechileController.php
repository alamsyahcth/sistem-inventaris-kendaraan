<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Str;
use App\Vechile;
use App\Category;

class VechileController extends Controller {

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index() {
        $data = Vechile::get();
        return view('backend.vechile.index', compact(['data']));
    }

    public function create() {
        $category = Category::get();
        return view('backend.vechile.create', compact(['category']));
    }

    public function store(Request $request) {

        $rules = $this->validate($request,[
            'category_id' => 'required',
            'name' => 'required',
            'police_number' => 'required',
            'stnk_no' => 'required',
            'color' => 'required',
            'merk' => 'required',
            'no_rangka' => 'required',
            'no_mesin' => 'required',
            'photo' => 'required',
        ]);

        if($rules) {

            $file = $request->file('photo');
            $imgName = date('ymd').rand(100,999).$file->getClientOriginalName();
            $to = 'img/vechile';
            $file->move($to,$imgName);

            $data = new Vechile;
            $data->category_id = $request->category_id;
            $data->name = $request->name;
            $data->slug = Str::slug($request->name);
            $data->police_number = $request->police_number;
            $data->stnk_no = $request->stnk_no;
            $data->color = $request->color;
            $data->merk = $request->merk;
            $data->no_rangka = $request->no_rangka;
            $data->no_mesin = $request->no_mesin;
            $data->photo = $imgName;
            $data->status = 'available';

            if($data->save()) {
                return redirect('/manage/vechile')->with('success','Data Berhasil Disimpan');
            } else {
                return redirect('/manage/vechile')->with('failed','Data Gagal Disimpan');
            }
        }
    }

    public function edit($id){
        $category = Category::get();
        $data = Vechile::where('id',$id)->first();
        return view('backend.vechile.update', compact(['data','category']));
    }

    public function update(Request $request, $id) {
        $rules = $this->validate($request,[
            'category_id' => 'required',
            'name' => 'required',
            'police_number' => 'required',
            'stnk_no' => 'required',
            'color' => 'required',
            'merk' => 'required',
            'no_rangka' => 'required',
            'no_mesin' => 'required',
        ]);

        if($rules) {
            if($request->photo != '') {
                $file = $request->file('photo');
                $imgName = date('ymd').$request->nik.$file->getClientOriginalName();
                $to = 'img/vechile';
                $file->move($to,$imgName);

                File::delete(base_path().'/public/img/vechile/'.$request->old_photo);

                $data = Vechile::find($id);
                $data->category_id = $request->category_id;
                $data->name = $request->name;
                $data->slug = Str::slug($request->name);
                $data->police_number = $request->police_number;
                $data->stnk_no = $request->stnk_no;
                $data->color = $request->color;
                $data->merk = $request->merk;
                $data->no_rangka = $request->no_rangka;
                $data->no_mesin = $request->no_mesin;
                $data->photo = $imgName;
                $data->status = 'available';

                if($data->save()) {
                    return redirect('/manage/vechile')->with('success','Data Berhasil Diubah');
                } else {
                    return redirect('/manage/vechile')->with('failed','Data Gagal Diubah');
                }
            } else {
                $data = Vechile::find($id);
                $data->category_id = $request->category_id;
                $data->name = $request->name;
                $data->slug = Str::slug($request->name);
                $data->police_number = $request->police_number;
                $data->stnk_no = $request->stnk_no;
                $data->color = $request->color;
                $data->merk = $request->merk;
                $data->no_rangka = $request->no_rangka;
                $data->no_mesin = $request->no_mesin;
                $data->photo = $request->old_photo;
                $data->status = 'available';

                if($data->save()) {
                    return redirect('/manage/vechile')->with('success','Data Berhasil Diubah');
                } else {
                    return redirect('/manage/vechile')->with('failed','Data Gagal Diubah');
                }
            }
        }
    }
    
    public function destroy($id) {
        $data = Vechile::where('id', $id)->first();
        File::delete(base_path().'/public/img/vechile/'.$data->photo);
        if($data->delete()) {
            return redirect('/manage/vechile')->with('success','Data Berhasil Dihapus');
        } else {
            return redirect('/manage/vechile')->with('failed','Data Gagal Dihapus');
        }
    }
}
