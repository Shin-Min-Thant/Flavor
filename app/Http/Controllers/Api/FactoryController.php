<?php

namespace App\Http\Controllers\api;

use App\Models\ProductRaw;
use App\Models\PreorderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FactoryController extends Controller
{
    public function getRawList(Request $request){

        $preorder_raw_totals = DB::table('preorder_items')
        ->select(
            // 'preorder_items.preorder_id',
            'raws.material_name',
            'product_raws.raw_id',
            DB::raw('SUM(product_raws.amount) as raw_amount')
        )
        ->leftJoin('products', 'preorder_items.product_id', '=', 'products.id')
        ->leftJoin('product_raws', 'products.id', '=', 'product_raws.product_id')
        ->leftJoin('raws','product_raws.raw_id','raws.id')
        ->where('preorder_items.preorder_id',$request->preorder_id)
        ->groupBy('preorder_items.preorder_id','product_raws.raw_id','raws.material_name')
        ->get();


        $data = $preorder_raw_totals;



        return response()->json([
            'data' => $data,
            // 'total_boxes' => $total_boxes,
        ], 200);

    }

    public function getFactoryData(){

        $preorder_items = PreorderItem::select('preorder_items.*','preorders.total_quantity','products.bottles_per_box')
        ->leftJoin('preorders','preorder_items.preorder_id','preorders.id')
        ->leftJoin('products','preorder_items.product_id','products.id')
        ->get();
        for ($i = 0; $i < count($preorder_items); $i++) {
            $order_box = $preorder_items[$i]->order_count / $preorder_items[$i]->bottles_per_box;
            $preorder_items[$i]->order_box = ceil($order_box);
        }
        return response()->json([
            'data' => $preorder_items,
        ], 200);
    }
}
