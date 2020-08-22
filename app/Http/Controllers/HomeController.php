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
        $data = Vechile::where('status','available')->get();
        $countAll = Vechile::count();
        $count = Vechile::where('status','available')->count();
        return view('frontend.vechile', compact(['data','category','countAll','count']));
    }

    public function getCategory($slug) {
        $category = Category::get();
        $data = Category::where('vechiles.status','available')
                ->where('categories.slug',$slug)
                ->join('vechiles','vechiles.category_id','=','categories.id')
                ->get();
        $count = Category::where('categories.slug',$slug)
                ->join('vechiles','vechiles.category_id','=','categories.id')
                ->count();
        return view('frontend.category', compact(['data','category','count']));
    }

    public function search(Request $request) {
        $category = Category::get();
        $data = Category::where('vechiles.status','available')
                ->where('categories.name','like','%'.$request->keyword.'%')
                ->orwhere('vechiles.name','like','%'.$request->keyword.'%')
                ->join('vechiles','vechiles.category_id','=','categories.id')
                ->get();
        $count = Category::where('categories.name','like','%'.$request->keyword.'%')
                ->orwhere('vechiles.name','like','%'.$request->keyword.'%')
                ->join('vechiles','vechiles.category_id','=','categories.id')
                ->count();
        return view('frontend.search', compact(['data', 'category', 'count']));
    }

    public function data($slug){
        $vechile = Vechile::where('slug',$slug)->first();
        $count = Vechile::where('slug',$slug)->count();
        if($count>0) {
            return view('frontend.data', compact(['vechile']));
        } else {
            return redirect('/')->with('failed_vechile','Maaf data kendaraan tidak ditemukan');
        }
    }

    public function success($id) {
        $data = OrderBook::where('order_books.book_id',$id)->join('employees','employees.id','=','order_books.employee_id')->first();
        $count = OrderBook::where('book_id',$id)->count();
        if($count>0){
            return view('frontend.success', compact(['data']));
        } else {
            return redirect('/')->with('failed_vechile','Maaf book id tidak ditemukan');
        }
    }

    public function createOrder(Request $request){
        $rules = $this->validate($request,[
            'nik' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'reason' => 'required',
        ]);

        $check = Employee::where('nik', $request->nik)->count();
        $order_check = OrderBook::join('employees','employees.id','=','order_books.employee_id')
                        ->where('employees.nik',$request->nik)
                        ->where('order_books.status','=','Belum')
                        ->orwhere('order_books.status','=','Sudah')
                        ->count();
        $slug = Vechile::select('slug')->where('id',$request->vechile_id)->first();

        if($rules) {
            if($request->date_start < $request->date_end) {
                if ($check == 1) {
                    if ($order_check == 0) {
                        $employee = Employee::where('nik', $request->nik)->first();
                        $data = new OrderBook;
                        $data->employee_id = $employee->id;
                        $data->vechile_id = $request->vechile_id;
                        $book_id = 'B-'.date('ymd').rand(1000,9999);
                        $data->book_id = $book_id;
                        $data->date = date("Y-m-d");
                        $data->expired_date = date("Y-m-d");
                        $data->booking_date = $request->date_start;
                        $data->booking_end = $request->date_end;
                        $data->status = "Belum";
                        $data->reason = $request->reason;
                        if($data->save()) {
                            if(Vechile::where('id',$request->vechile_id)->update(['vechiles.status'=>'Not'])){
                                return redirect('/success/'.$book_id);
                            } else {
                                return redirect('/data/'.$slug->slug)->with('failed','Maaf Data Gagal Disimpan');
                            }
                        } else {
                            return redirect('/data/'.$slug->slug)->with('failed','Maaf Data Gagal Disimpan');
                        }
                    } else {
                        return redirect('/data/'.$slug->slug)->with('failed_nik','Maaf Anda Sedang Meminjam Kendaraan');
                    }
                } else {
                    return redirect('/data/'.$slug->slug)->with('failed_nik','Maaf NIK Salah');
                }
            } else {
                return redirect('/data/'.$slug->slug)->with('failed','Maaf Tanggal Awal Harus Lebih Kecil');
            }
        }
    }
}
