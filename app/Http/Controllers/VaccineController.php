<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vaccine;
use App\Http\Requests\StoreVaccineRequest;
use App\Http\Requests\UpdateVaccineRequest;

class VaccineController extends Controller
{
	public function allVaccine() {
		$vaccines = Vaccine::orderBy('active', 'DESC')->paginate(10);
		return view('admin.vaccine.vaccine', ['vaccines' => $vaccines]);
	}

	public function create() {
		return view('admin.vaccine.add');
	}

	public function store(StoreVaccineRequest $request) {
		$data = $request->all();
		$vaccine = Vaccine::create($data);
		return response()->json([
			'error'=>false
		]);
	}

	public function uploadImg(Request $request) {
		$disk = 'public';
		$path=$request->file->storeAs('images','vaccine-'.time().'.png', $disk);
		$vaccine = Vaccine::find($request->vaccine_id);
		$vaccine->image = $path;
		$vaccine->save();
		return '{}';
	}

	public function edit($id){
		$vaccine = Vaccine::find($id);
		if ($vaccine == null){
			return abort(404);
		}
		else {
			return view('admin.vaccine.edit', ['vaccine' => $vaccine]);
		}	
	}

	public function update(UpdateVaccineRequest $request, $id) {
		$data = $request->all();
		$vaccine = Vaccine::find($id)->update($data);
		return response()->json([
			'error' => false
		]);
	}

	public function getVaccine() {
		$vaccines = Vaccine::where('active', '=', 1)->paginate(10);
		return view('pages.vaccine', ['vaccines' => $vaccines]);
	}

	// import update quantity
	public function importVaccine() {
		$vaccines = Vaccine::where('active', 1)->get();
		return view('admin.vaccine.import_vaccine', ['vaccines' => $vaccines]);
	} 
	public function import(Request $req) {
		$quantity = $req->quantity;
		$vaccines = $req->vaccine;
		// vaccine && quantity is array have same index
		// if quantity != 0 => import
		for ($i = 0; $i < count($vaccines); $i++) {
			if ($quantity[$i] != 0) {
				// update quantity
				$vaccine = Vaccine::find($vaccines[$i]);
				$vaccine->quantity = $vaccine->quantity + $quantity[$i];
				$vaccine->save();
			}
		}
		return redirect()->route('admin.import')->with('success', 'Cập nhật số lượng vaccine thành công.');
	} 
}
