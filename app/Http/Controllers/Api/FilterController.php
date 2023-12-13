<?php

namespace App\Http\Controllers\Api;

use App\Models\Preorder;
use App\Models\PreorderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    //filter by calendar and list type
    public function calendarControl(Request $request){
        // Validation rules
        $rules = [
            'dept' => 'required|string',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
        ];

        // Validate the request data
        $validator = \Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $dept = $request->dept;
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $filtered_data = [];

        if($dept === 'sales'){
            $filtered_data = Preorder::select('preorders.*','customers.name as customer_name','customers.region as customer_region')
            ->leftJoin('customers','preorders.customer_id','customers.id')
            ->whereBetween('preorders.created_at', [$startDate, $endDate])->get();
        }else if($dept === 'warehouse'){
            $filtered_data = PreorderItem::select('preorder_items.*','preorders.total_quantity','preorders.preorder_number','products.bottles_per_box')
            ->leftJoin('preorders','preorder_items.preorder_id','preorders.id')
            ->leftJoin('products','preorder_items.product_id','products.id')
            ->whereBetween('preorder_items.created_at', [$startDate, $endDate])->get();


            // $filtered_data = Preorder::select('preorders.*','customers.name as customer_name','customers.region as customer_region')
            // ->leftJoin('customers','preorders.customer_id','customers.id')
            // ->whereBetween('preorders.created_at', [$startDate, $endDate])->get();
        }
            // }else if($dept === 'admin'){
        //     $filtered_data = Preorder::whereBetween('created_at', [$startDate, $endDate])->get();
        // }else if($dept === 'sales'){
        //     $filtered_data = Preorder::whereBetween('created_at', [$startDate, $endDate])->get();
        // }else if($dept === 'sales'){
        //     $filtered_data = Preorder::whereBetween('created_at', [$startDate, $endDate])->get();
        // }

        return response()->json([
            'dept' => $request->dept,
            'filtered_data' => $filtered_data,
        ], 200);

    }
}
