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

class BookFinishController extends Controller {

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index() {
        $data = BookFinish::orderBy('id','desc')->get();
        return view('backend.finish.index', compact('data'));
    }

    public function view($id) {
        $data = Book::join('order_books','order_books.id','=','books.order_books_id')
                ->join('employees','employees.id','=','order_books.employee_id')
                ->join('vechiles','vechiles.id','=','order_books.vechile_id')
                ->join('book_finishes','book_finishes.book_id','=','books.id')
                ->select('*','employees.name as employees_name', 'books.id as books_id', 'books.status as books_status','employees.photo as employees_photo','vechiles.photo as vechiles_photo','vechiles.id as vechiles_id','employees.id as employees_id','vechiles.status as vechiles_status','vechiles.name as vechiles_name')
                ->where('book_finishes.book_finish_code',$id)
                ->first();
        return view('backend.finish.view', compact('data'));
    }

    public function report($id) {
        $data = Book::join('order_books','order_books.id','=','books.order_books_id')
                ->join('employees','employees.id','=','order_books.employee_id')
                ->join('vechiles','vechiles.id','=','order_books.vechile_id')
                ->join('book_finishes','book_finishes.book_id','=','books.id')
                ->select('*','employees.name as employees_name', 'books.id as books_id', 'books.status as books_status','employees.photo as employees_photo','vechiles.photo as vechiles_photo','vechiles.id as vechiles_id','employees.id as employees_id','vechiles.status as vechiles_status','vechiles.name as vechiles_name')
                ->where('book_finishes.book_finish_code',$id)
                ->first();
        $pdf = PDF::loadView('backend.finish.report', compact(['data']));
        return $pdf->stream();
    }

}
