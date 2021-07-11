<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Vaccine;
use App\Answer;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
	public function getOrder() {
		$orders = Order::paginate(10);
		foreach ($orders as $item) {
			$item->isAnswer = Answer::where('order_id', $item->id)->count() > 0 ? true : false;
		}
		return view('admin.order.order', ['orders' => $orders]);
	}

	public function changeState($id) {
		$order = Order::find($id);
		return response()->json([
			'message' => false,
			'data' => $order
		]);
	}

	public function updateState(Request $request, $id) {
		$state = Order::find($id);
		$state->user_id = Auth::user()->id;
		$state->state = $request->change;
		// update quantity 
		if ($request->change == 1) {
			$vaccine = Vaccine::find($state->vaccine_id);
			$vaccine->quantity -= $state->quantity;
			$vaccine->save(); 
		}
		// change status for order
		$state->save();
		return response()->json([
			'message' =>false
		]);
	}

	public function create() {
		$vaccines = Vaccine::all();
		if ($vaccines != null) {
			return view('admin.order.add', ['vaccines' => $vaccines]);
		}
		else {
			return abort(404);
		}
	}

	public function store(StoreOrderRequest $request) {
		$data = array();
		$data['user_id'] = Auth::user()->id;
		$data['vaccine_id'] = $request->vaccine;
		$data['customer_name'] = $request->customer_name;
		$data['customer_address'] = $request->customer_address;
		$data['customer_phone'] = $request->customer_phone;
		if ($request->customer_email ==null) {
			$data['customer_email'] = '';
		}
		else {
			$data['customer_email'] = $request->customer_email;
		}
		$data['quantity'] = $request->quantity;
		$price = Vaccine::find($request->vaccine)->late_price;
		$data['total'] = $price*($request->quantity);
		$data['state'] = 0;
		return Order::create($data);
	}

	public function edit($id) {
		$order = Order::find($id);
		if ($order == null) {
			return abort(404);
		}
		else {
			$vaccines = Vaccine::all();
			return view('admin.order.edit')->with(compact('order'))->with(compact('vaccines'));
		}
	}

	public function update(UpdateOrderRequest $request, $id) {
		$data = array();
		$data['user_id'] = Auth::user()->id;
		$data['vaccine_id'] = $request->vaccine;
		$data['customer_name'] = $request->customer_name;
		$data['customer_address'] = $request->customer_address;
		$data['customer_phone'] = $request->customer_phone;
		if ($request->customer_email ==null) {
			$data['customer_email'] = '';
		}
		else {
			$data['customer_email'] = $request->customer_email;
		}
		$data['quantity'] = $request->quantity;
		$price = Vaccine::find($request->vaccine)->late_price;
		$data['total'] = $price*($request->quantity);
		$data['state'] = 0;
		return Order::find($id)->update($data);
	}

	public function checkDateTime(Request $req)
	{
		$date = date('d-m-Y', strtotime($req->date));;
		$time = $req->time.":00";
		$quantity = Order::where('join_date', $date)->where('join_time', $time)->count();
		if ($quantity > 0) {
			return response()->json([
				'status' => false,
				'message' => "Thời gian đăng ký tiêm chủng [".$req->date." - ".$req->time.":00] đã vượt quá số lượng đăng ký cho phép. Vui lòng chọn ngày hoặc giờ khác"
			]);
		} else {
			return response()->json([
				'status' => true
			]);
		}
	}
}
