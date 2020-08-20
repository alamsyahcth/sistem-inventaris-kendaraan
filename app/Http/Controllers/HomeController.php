<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderBook;
use App\Employee;
use App\Vechile;
use App\Category;

class HomeController extends Controller{

    public function vechile() {
        $category = Category::get();
        $data = Vechile::get();
        $count = Vechile::count();
        return view('frontend.vechile', compact(['data','category','count']));
    }

    public function getCategory($slug) {
        $category = Category::get();
        $data = Category::where('categories.slug',$slug)->join('vechiles','vechiles.category_id','=','categories.id')->get();
        $count = Category::where('categories.slug',$slug)->join('vechiles','vechiles.category_id','=','categories.id')->count();
        return view('frontend.category', compact(['data','category','count']));
    }

    public function search(Request $request) {
        $category = Category::get();
        $data = Category::where('categories.name','like','%'.$request->keyword.'%')->orwhere('vechiles.name','like','%'.$request->keyword.'%')->join('vechiles','vechiles.category_id','=','categories.id')->get();
        $count = Category::where('categories.name','like','%'.$request->keyword.'%')->orwhere('vechiles.name','like','%'.$request->keyword.'%')->join('vechiles','vechiles.category_id','=','categories.id')->count();
        return view('frontend.search', compact(['data', 'category', 'count']));
    }

    public function data(){
        return view('frontend.data');
    }

    public function success($id) {
        $data = OrderBook::where('order_books.book_id',$id)->join('employees','employees.id','=','order_books.employee_id')->first();
        return view('frontend.success', compact(['data']));
    }

    public function createOrder(Request $request){
        $rules = $this->validate($request,[
            'nik' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'reason' => 'required',
        ]);

        $check = Employee::where('nik', $request->nik)->count();

        if($rules) {
            if($request->date_start < $request->date_end) {
                if ($check == 1) {
                    $employee = Employee::where('nik', $request->nik)->first();
                    $data = new OrderBook;
                    $data->employee_id = $employee->id;
                    $data->vechile_id = 1;
                    $book_id = 'B-'.date('ymd').rand(1000,9999);
                    $data->book_id = $book_id;
                    $data->date = date("Y-m-d");
                    $data->expired_date = date("Y-m-d");
                    $data->booking_date = $request->date_start;
                    $data->booking_end = $request->date_end;
                    $data->status = "Belum";
                    $data->reason = $request->reason;
                    if($data->save()) {
                        return redirect('/success/'.$book_id);
                    } else {
                        return redirect('/data')->with('failed','Maaf Data Gagal Disimpan');
                    }
                } else {
                    return redirect('/data')->with('failed_nik','Maaf NIK Salah');
                }
            } else {
                return redirect('/data')->with('failed','Maaf Tanggal Awal Harus Lebih Kecil');
            }
        }
    }
}
