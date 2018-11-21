<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Admin_TradeController extends Controller
{
    // 交易信息
    public function trade(){
        return view('admin.transaction.transac');
    }
    // 交易订单图
    public function orderimg(){
        return view('admin.transaction.Order_Chart');
    }
    // 交易金额
    public function trademoney(){
        return view('admin.transaction.Amounts');
    }
}


