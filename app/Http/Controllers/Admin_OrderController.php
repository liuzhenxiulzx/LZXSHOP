<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_OrderController extends Controller
{
    // 订单管理
    public function ordermanage(){
        return view('admin.transaction.Orderform');
    }
    // 订单处理
    public function orderprocess(){
        return view('admin.transaction.Order_handling');
    }
    // 退款管理
    public function refund(){
        return view('admin.transaction.Refund');
    }
}
