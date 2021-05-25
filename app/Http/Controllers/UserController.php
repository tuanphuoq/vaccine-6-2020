<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
	public function getUser() {
		$this->authorize('role-admin');
		$users = User::paginate(10);
		return view('admin.user.user', ['users' => $users]);
	}

	public function changeRole($id) {
		$this->authorize('role-admin');
		$user = User::find($id);
		if ($user ==null) {
			return abort(404);
		}else {
			return response()->json([
				'message' => false,
				'data' => $user
			]);
		}
	}

	public function updateRole(Request $request, $id) {
		$this->authorize('role-admin');
		$state = User::find($id);
		$state->role = $request->change;
		$state->save();
		return response()->json([
			'message' =>false
		]);
	}

	public function edit($id) {
		$this->authorize('role-admin');
		$user = User::find($id);
		if ($user ==null) {
			return abort(404);
		}
		else {
			return view('admin.user.edit', ['user' => $user]);
		}
	}

	public function update(UpdateUserRequest $request, $id) {
		$this->authorize('role-admin');
		$user = User::find($id);
		$user->fullname = $request->fullname;
		$user->address = $request->address;
		$user->phone = $request->phone;
		$user->save();
		return response()->json([
			'message' => false
		]);
	}

	public function create() {
		$this->authorize('role-admin');
		return view('admin.user.add');
	}

	public function store(StoreUserRequest $request) {
		$this->authorize('role-admin');
		$data = array();
		$data['fullname'] = $request->fullname;
		$data['address'] = $request->address;
		$data['email'] = $request->email;
		$data['password'] = Hash::make($request->password);
		$data['phone'] = $request->phone;
		$data['role'] = 0;
		return User::create($data);
	}

	public function delete($id){
		$this->authorize('role-admin');
		$post = User::find($id)->delete();
		return response()->json([
			'message' => 'Xoa thanh cong'
		]);
	}

	public function changePassword()
	{
		return view('admin.user.password');
	}

	public function savePassword(Request $req)
	{
		// dd($req->all());
		if ($req->oldPass == "") {
            $message = "Mật khẩu cũ không được để trống";
			return redirect()->route('changepassword')->with('error', $message);
        } else if ($req->newPass == "" || $req->rePass == "") {
            $message = "Mật khẩu mới và mật khẩu xác nhận không được để trống";
			return redirect()->route('changepassword')->with('error', $message);
        } else if ($req->newPass != $req->rePass) {
            $message = "Xác nhận mật khẩu không đúng";
			return redirect()->route('changepassword')->with('error', $message);
        } else {
            if (Auth::user()->password == Hash::make($req->oldPass)) {
				$user = User::find(Auth::user()->id);
				$user->password = Hash::make($req->newPass);
				$user->save();
				$message = "Cập nhật mật khẩu thành công";
				// success
				return redirect()->route('changepassword')->with('success', $message);
			} else {
				$message = "Sai mật khẩu để cập nhật mật khẩu mới";
				return redirect()->route('changepassword')->with('error', $message);
			}
        }
	}
}
