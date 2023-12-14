<?php

namespace App\Http\Controllers\Api\Sales;
use App\Http\Requests\salePreorderRequest;
use App\Http\Resources\salePreorderResource;
use App\Models\Preorder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SalePreorderController extends Controller
{
    public function index(){
       $preorder_data = Preorder::select('preorders.*','customers.name as customer_name','customers.region as customer_region','customers.address as customer_address','products.bottles_per_box','preorder_items.order_count')
       ->leftJoin('customers','preorders.customer_id','customers.id')
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(salePreorderRequest $request){
        $request->validated($request->all());
        $userId = Auth::user()->id;

        $preOrder=Preorder::create([
            'customer_id'=>$request->customer_id,
            'preorder_number'=>$request->preorder_number,
            'stauts'=>$request->status,
            'user_id'=>$userId,
            'permit_status'=>$request->permit_status
        ]);

        return new salePreorderResource($preOrder);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Preorder $preorder){
        return $this->isNotAuthorized($preorder) ? $this->isNostAuthorized($preorder) : $preorder->delete();
    }

    public function isNotAuthorized($preorder){
        if(Auth::user()->id!==$preorder->user_id){
            return $this->error('','You are not related to this preorder',403);
        }
}
}
