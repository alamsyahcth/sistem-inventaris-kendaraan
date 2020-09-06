<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderBook;
use App\Book;
use App\Employee;
Use App\Vechile;

class BookingInController extends Controller {

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        $data = OrderBook::orderBy('id','desc')->get();
        return view('backend.book.index', compact(['data']));
    }

    public function view($id){
        $data = OrderBook::where('order_books.book_id',$id)
                ->join('vechiles','vechiles.id','=','order_books.vechile_id')
                ->join('employees','employees.id','=','order_books.employee_id')
                ->select('*', 'vechiles.photo as vechiles_photo', 'vechiles.name as vechiles_name', 'order_books.id as order_books_id')
                ->first();
        return view('backend.book.view', compact(['data']));
    }

    public function accepted($id, $order_books) {
        $data = new Book;
        $data->order_books_id = $order_books;
        $data->book_code = 'O-'.date('ymd').rand(1000,9999);
        $data->date = date("Y-m-d");
        $data->status = 'berjalan';

        if($data->save()) {
            OrderBook::where('book_id',$id)->update(['order_books.status'=>'Sudah']);
            return redirect('/manage/book')->with('success','Persetujuan Berhasil');
        }
    }

    public function refused($id, $vechile_id) {
        $data = OrderBook::where('book_id',$id)->update(['order_books.status'=>'Tolak']);
        if($data) {
            Vechile::where('id',$vechile_id)->update(['status'=>'available']);
            return redirect('/manage/book-in')->with('success','Penolakan Berhasil');
        } else {
            return redirect('/manage/book-in')->with('failed','Penolakan Gagal');
        }
    }

}
