<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\log;
date_default_timezone_set('America/New_York');


class LogController extends Controller{
    // index
    public function index() {
        $logs = Log::all();
        $products = Product::all();
        return view('home', ['logs' => $logs, 'products' => $products]);
    }
    public function store(Request $request) {
        $request->validate([
            'qty' => 'required',
            'item' => 'required',
            'total' => 'required'
        ]);
        $log = new Log();
        $log->product_id = $request->item;
        $log->qty = $request->qty;
        $log->item = $request->item;
        $log->total = $request->total;
        $log->save();
        return redirect('/');
    }
    // return logs by date in request
    public function getreport(Request $request) {
        $date = $request->date;
        $logs = Log::where('created_at', 'like', $date.'%')->get();
        return view('reports', ['logs' => $logs]);
    }
    // return reports page
    public function reports() {
        $logs = Log::all();
        return view('reports', ['logs' => $logs]);
    }
}