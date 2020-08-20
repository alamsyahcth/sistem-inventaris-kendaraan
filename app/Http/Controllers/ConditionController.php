<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vechile;
use App\Condition;

class ConditionController extends Controller {

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index($id){
        $condition = Condition::where('vechile_id',$id)->get();
        $data = Vechile::where('id',$id)->first();
        return view('backend.vechile.condition', compact(['condition','data']));
    }

    public function store(Request $request){
        $data = new Condition;
        $data->vechile_id = $request->vechile_id;
        $data->damage_location = $request->damage_location;

        if ($data->save()) {
            return redirect('/manage/condition/'.$request->vechile_id)->with('success','Data Berhasil Ditambah');
        } else {
            return redirect('/manage/condition/'.$request->vechile_id)->with('failed','Data Gagal Ditambah');
        }
    }

    public function destroy($id, $vechile_id){
        $data = Condition::where('id',$id)->first();
        if ($data->delete()) {
            return redirect('/manage/condition/'.$vechile_id)->with('success','Data Berhasil Dihapus');
        } else {
            return redirect('/manage/condition/'.$vechile_id)->with('success','Data Gagal Dihapus');
        }
    }
}
