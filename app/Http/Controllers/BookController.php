<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderBook;
use App\Book;
use App\Employee;
Use App\Vechile;

class BookController extends Controller{

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        $data = Book::join('order_books','order_books.id','=','books.order_books_id')
                ->join('employees','employees.id','=','order_books.employee_id')
                ->select('*','employees.name as employees_name', 'books.status as books_status')
                ->get();
        return view('backend.order.index', compact(['data']));
    }

}
