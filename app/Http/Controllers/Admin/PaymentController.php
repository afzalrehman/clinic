<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment()
    {
        return view('admin.payment.list');
    }
    public function payment_create()
    {
        return view('admin.payment.add');
    }
}
