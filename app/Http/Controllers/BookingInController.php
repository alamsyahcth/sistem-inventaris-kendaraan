<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderBook;
use App\Employee;
Use App\Vechile;

class BookingInController extends Controller {

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        $data = OrderBook::get();
        return view('backend.book.index', compact(['data']));
    }

    public function view($id){
        $data = OrderBook::where('order_books.book_id',$id)->join('vechiles','vechiles.id','=','order_books.vechile_id')->join('employees','employees.id','=','order_books.employee_id')->select('*', 'vechiles.photo as vechiles_photo')->first();
        return view('backend.book.view', compact(['data']));
    }

    public function accepted($id) {
        $data = OrderBook::where('id',$id)->update(['order_books.status'=>'Sudah']);
        if($data) {
            return redirect('/manage/book-in')->with('success','Persetujuan Berhasil');
        } else {
            return redirect('/manage/book-in')->with('failed','Persetujuan Gagal');
        }
    }

    public function refused($id) {
        $data = OrderBook::where('id',$id)->update(['order_books.status'=>'Tolak']);
        if($data) {
            return redirect('/manage/book-in')->with('success','Penolakan Berhasil');
        } else {
            return redirect('/manage/book-in')->with('failed','Penolakan Gagal');
        }
    }

}
