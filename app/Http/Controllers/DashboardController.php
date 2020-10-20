<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderBook;
use App\Book;
use App\BookFinish;
use App\Employee;
Use App\Vechile;

class DashboardController extends Controller{

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        $vechile_count = Vechile::count();
        $order_book_count = OrderBook::where('status','=','berjalan')->count();
        $book_count = Book::count();
        $book_finish_count = BookFinish::count();
        return view('backend.dashboard', compact(['vechile_count','order_book_count','book_count','book_finish_count']));
    }

}
