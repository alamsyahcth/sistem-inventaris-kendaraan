<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Employee;

class EmployeeController extends Controller {

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index() {
        $data = Employee::get();
        return view('backend.employee.index', compact(['data']));
    }

    public function create() {
        return view('backend.employee.create');
    }

    public function store(Request $request) {

        $rules = $this->validate($request,[
            'name' => 'required',
            'gender' => 'required',
            'born' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'photo' => 'required',
        ]);

        if($rules) {

            $nik = date('ymd').rand(100,999);

            $file = $request->file('photo');
            $imgName = date('ymd').$nik.$file->getClientOriginalName();
            $to = 'img/employee';
            $file->move($to,$imgName);

            $data = new Employee;
            $data->nik = $nik;
            $data->name = $request->name;
            $data->gender = $request->gender;
            $data->born = $request->born;
            $data->birthday = $request->birthday;
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->photo = $imgName;

            if($data->save()) {
                return redirect('/manage/employee')->with('success','Data Berhasil Disimpan');
            } else {
                return redirect('/manage/employee')->with('failed','Data Gagal Disimpan');
            }
        }
    }

    public function edit($id){
        $data = Employee::where('id',$id)->first();
        return view('backend.employee.update', compact(['data']));
    }

    public function update(Request $request, $id) {
        $rules = $this->validate($request,[
            'name' => 'required',
            'gender' => 'required',
            'born' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);

        if($rules) {
            if($request->photo != '') {
                $file = $request->file('photo');
                $imgName = date('ymd').$request->nik.$file->getClientOriginalName();
                $to = 'img/employee';
                $file->move($to,$imgName);

                File::delete(base_path().'/public/img/employee/'.$request->old_photo);

                $data = Employee::find($id);
                $data->nik = $request->nik;
                $data->name = $request->name;
                $data->gender = $request->gender;
                $data->born = $request->born;
                $data->birthday = $request->birthday;
                $data->address = $request->address;
                $data->email = $request->email;
                $data->phone = $request->phone;
                $data->photo = $imgName;

                if($data->save()) {
                    return redirect('/manage/employee')->with('success','Data Berhasil Diubah');
                } else {
                    return redirect('/manage/employee')->with('failed','Data Gagal Diubah');
                }
            } else {
                $data = Employee::find($id);
                $data->nik = $request->nik;
                $data->name = $request->name;
                $data->gender = $request->gender;
                $data->born = $request->born;
                $data->birthday = $request->birthday;
                $data->address = $request->address;
                $data->email = $request->email;
                $data->phone = $request->phone;
                $data->photo = $request->old_photo;

                if($data->save()) {
                    return redirect('/manage/employee')->with('success','Data Berhasil Diubah');
                } else {
                    return redirect('/manage/employee')->with('failed','Data Gagal Diubah');
                }
            }
        }
    }
    
    public function destroy($id) {
        $data = Employee::where('id', $id)->first();
        File::delete(base_path().'/public/img/employee/'.$data->photo);
        if($data->delete()) {
            return redirect('/manage/employee')->with('success','Data Berhasil Dihapus');
        } else {
            return redirect('/manage/employee')->with('failed','Data Gagal Dihapus');
        }
    }
}
