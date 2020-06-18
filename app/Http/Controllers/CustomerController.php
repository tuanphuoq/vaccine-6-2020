<?php

namespace App\Http\Controllers;

use App\Vaccine;
use App\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function registerView()
    {
    	$vaccines = Vaccine::all();
    	return view('pages.vaccine-register')->with(compact('vaccines'));
    }

    function registerPost(request $req)
    {
    	$order['vaccine_id'] = $req->vaccineId;
    	$order['user_id'] = 0;
    	$order['customer_name'] = $req->customerName;
    	$order['customer_address'] = $req->customerAddress;
    	$order['customer_email'] = $req->customerEmail;
    	$order['customer_phone'] = $req->customerPhone;
    	$order['quantity'] = $req->quantity;
        $price = Vaccine::find($req->vaccineId)->late_price;
    	$order['total'] = ($req->quantity)*$price;
    	$order['state'] = $req->state;
    	$codeReturn = Order::max('id') + 1;
    	Order::Create($order);
    	return response()->json(['code' => $codeReturn, 'total' => $req->total]);
    }

    function registerGet(request $req)
    {
    	$data = Order::find($req->vaccineCode);
    	if ($data != null) {
    		$data['vaccine_name'] = Vaccine::where('id', $data['vaccine_id'])->value('name');
	    	$data['vaccine_allocate'] = Vaccine::where('id', $data['vaccine_id'])->value('allocate');
	    	return response()->json(['data' => $data]);
    	} else {
    		return null;
    	}
    	
    }
}
