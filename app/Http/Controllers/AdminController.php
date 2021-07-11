<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vaccine;
use App\Post;
use App\Order;

class AdminController extends Controller
{
    public function index()
    {
        $vaccines = Vaccine::count();
        $limit = Vaccine::where('quantity', '<', 50)->count();
        $posts = Post::count();
        $orders = Order::count();
        return view('admin.dashboard', [
            'vaccines' => $vaccines,
            'limit' => $limit,
            'posts' => $posts,
            'orders' => $orders,
        ]);
    }
}
