<?php

namespace App\Http\Controllers\api;

use App\Models\Preorder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LogisticPReorderController extends Controller
{
    public function index(){

        
        $preorder_data = Preorder::select('preorders.*','customers.name as customer_name','customers.region as customer_region','customers.address as customer_address','order_trucks.*','trucks.*')
        ->leftJoin('customers','preorders.customer_id','customers.id')
        ->leftJoin('order_trucks', function($join) {
            $join->on('order_trucks.preorder_id','preorders.id');
            $join->on('order_trucks.truck_id', DB::raw('(SELECT truck_id FROM order_trucks WHERE order_trucks.preorder_id = preorders.id LIMIT 1)'));
        })
        ->leftJoin('trucks','order_trucks.truck_id','trucks.id')
        ->orderBy('preorders.id')
        ->get();



        return response()->json([
         'status' => 'success',
         'preorder_data' => $preorder_data
        ], 200);
     }
}
