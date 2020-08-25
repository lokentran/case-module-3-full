<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;

class BillController extends Controller
{
    public function index() {
        $bills = Bill::all();
        return view('backend.bill.list',compact('bills'));
    }

    public function detail($id) {
        $bill = Bill::findOrFail($id);
        // dd($bill);
        return view('backend.bill.detail',compact('bill'));
    }

}
