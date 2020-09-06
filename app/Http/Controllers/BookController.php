<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\OrderBook;
use App\Book;
use App\BookFinish;
use App\Employee;
Use App\Vechile;
use App\Condition;

class BookController extends Controller{

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        $data = Book::join('order_books','order_books.id','=','books.order_books_id')
                ->join('employees','employees.id','=','order_books.employee_id')
                ->select('*','employees.name as employees_name', 'books.status as books_status')
                ->orderBy('books.id','desc')
                ->get();
        return view('backend.order.index', compact(['data']));
    }

    public function view($id){
        $data = Book::join('order_books','order_books.id','=','books.order_books_id')
                ->join('employees','employees.id','=','order_books.employee_id')
                ->join('vechiles','vechiles.id','=','order_books.vechile_id')
                ->select('*','employees.name as employees_name', 'books.id as books_id', 'books.status as books_status','employees.photo as employees_photo','vechiles.photo as vechiles_photo','vechiles.id as vechiles_id','employees.id as employees_id','vechiles.name as vechiles_name', 'vechiles.status as vechiles_status')
                ->where('books.book_code',$id)
                ->first();
        return view('backend.order.view',compact(['data']));
    }

    public function report($id) {
        $data = Book::join('order_books','order_books.id','=','books.order_books_id')
                ->join('employees','employees.id','=','order_books.employee_id')
                ->join('vechiles','vechiles.id','=','order_books.vechile_id')
                ->select('*','employees.name as employees_name', 'books.id as books_id', 'books.status as books_status','employees.photo as employees_photo','vechiles.photo as vechiles_photo','vechiles.id as vechiles_id','employees.id as employees_id','vechiles.name as vechiles_name', 'vechiles.status as vechiles_status')
                ->where('books.book_code',$id)
                ->first();
        $pdf = PDF::loadView('backend.order.report', compact(['data']));
        return $pdf->stream();
    }

    public function finish(Request $request) {
        $order = OrderBook::where('id',$request->order_books_id);
        $book = Book::where('id',$request->books_id);
        $vechiles = Vechile::where('id',$request->vechiles_id);
        $data = new BookFinish;
        $data->book_id = $request->books_id;
        $data->book_finish_code = 'F-'.date('ymd').rand(1000,9999);
        $data->date = date("Y-m-d");
        $data->status = 'dikembalikan';

        if($request->broken_description != '') {
            $data->broken_status = 'trouble';
            $data->broken_description = $request->broken_description;
            $condition = new Condition;
            $condition->vechile_id = $request->vechiles_id;
            $condition->damage_location = $request->broken_description;
            $condition->save();
        } else {
            $data->broken_status = 'fine';
            $data->broken_description = 'Kendaraan tidak ada masalah atau kerusakan';
        }

        if($data->save() && $order->update(['status'=>'Selesai']) && $book->update(['status'=>'selesai']) && $vechiles->update(['status'=>'available'])) {
            return redirect('/manage/book-finish')->with('success', 'Data Peminjaman Selesai');
        } else {
            return redirect('/manage/book')->with('failed', 'Data Pengembalian Gagal Disimpan');
        }
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

}
