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

class ReportPeminjamanController extends Controller {

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index() {
        return view('backend.report.peminjaman');
    }

    public function report(Request $request) {
        $rules = $this->validate($request,[
            'date_start' => 'required',
            'date_end' => 'required',
        ]);

        if ($rules) {
            if($request->date_start < $request->date_end) {
                $data = Book::join('order_books','order_books.id','=','books.order_books_id')
                    ->join('employees','employees.id','=','order_books.employee_id')
                    ->join('vechiles','vechiles.id','=','order_books.vechile_id')
                    ->join('book_finishes','book_finishes.book_id','=','books.id')
                    ->select('*','employees.name as employees_name', 'books.id as books_id', 'books.status as books_status','employees.photo as employees_photo','vechiles.photo as vechiles_photo','vechiles.id as vechiles_id','employees.id as employees_id','vechiles.status as vechiles_status','vechiles.name as vechiles_name',)
                    ->get();
                $date = date("D Y M");
                $pdf = PDF::loadView('backend.report.peminjamanPrintReport', compact(['data','date']));
                return $pdf->stream();
            } else {
                return redirect('/manage/report-peminjaman')->with('failed', 'Tanggal Awal Harus Lebih Kecil');
            }
        }
    }

}
