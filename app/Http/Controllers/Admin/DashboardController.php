<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        Gate::authorize('dashboard');

        $counts = DB::select("select 
              (select count(id) from products) as products,
              (select count(id) from users) as users,
              (select count(id) from categories) as categories,
              (select count(id) from orders) as orders");

        return view('Admin.Dashboard.index', [
            'counts' => collect($counts)->first()
        ]);
    }
}
