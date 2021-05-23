<?php

namespace App\Http\Controllers;

use App\Vaccine;
use App\Template;
use App\Question;
use App\Order;
use App\Answer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function registerView()
    {
    	$vaccines = Vaccine::all();
		$templateID = 1;
		$template = Template::find($templateID);
		$template->questions = Question::where('template_id', $templateID)->get();
    	return view('pages.vaccine-register')->with(compact('vaccines', 'template'));
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
    	$order['join_date'] = date('d-m-Y', strtotime($req->vaccineDate));
    	$order['join_time'] = $req->vaccineTime.":00";
        $price = Vaccine::find($req->vaccineId)->reser_price;
    	$order['total'] = ($req->quantity)*$price;
    	$order['state'] = $req->state;
		dd($order);
    	$obj = Order::Create($order);
    	$codeReturn = $obj->id;
    	return response()->json(['code' => $codeReturn, 'total' => $req->total]);
    }

    function templatePost(request $req)
    {
		foreach ($req->arr as $item) {
			if ($item['answer'] != "") {
				$orderTemplate = [
					'order_id' => $req->orderID,
					'template_id' => $req->templateID,
					'question_id' => $item['question'],
					'answer' => $item['answer']
				];
				Answer::create($orderTemplate);
			} else {
				return response()->json(['status' => false]);
			}
		}
		return response()->json(['status' => true]);
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
