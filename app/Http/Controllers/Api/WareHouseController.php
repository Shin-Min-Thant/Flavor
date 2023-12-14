<?php

namespace App\Http\Controllers\api;

use App\Models\Preorder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WareHouseController extends Controller
{
    public function index(){
        $preorder_data = Preorder::select('preorders.*','products.bottles_per_box','preorder_items.order_count')
        ->leftJoin('preorder_items','preorders.id','preorder_items.preorder_id')
        ->leftJoin('products','preorder_items.product_id','products.id')
        ->orderBy('preorders.id')
        ->get();

        for ($i = 0; $i < count($preorder_data); $i++) {
         $order_box = $preorder_data[$i]->order_count / $preorder_data[$i]->bottles_per_box;
         $preorder_data[$i]->order_box = ceil($order_box);
     }
        return response()->json([
         'status' => 'success',
         'preorder_data' => $preorder_data
        ], 200);
     }
}
