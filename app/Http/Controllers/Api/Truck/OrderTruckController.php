<?php

namespace App\Http\Controllers\api\truck;

use App\Http\Requests\OrderTruckRequest;
use App\Models\OrderTruck;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrderTruckResource;

class OrderTruckController extends Controller
{

    public function index(){
        return OrderTruckResource::collection(
            OrderTruck::where('user_id',Auth::user()->id)->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderTruckRequest $request){
        $request->validated($request->all());
        $userId = Auth::user()->id;

        $orderTruck=OrderTruck::create([
            'truck_id'=>$request->truck_id,
            'preorder_id'=>$request->preorder_id,
            'loaded_date_time'=>$request->loaded_date_time
        ]);

        return new OrderTruckResource($orderTruck);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderTruck $orderTruck){
        return $this->isNotAuthorized($orderTruck) ? $this->isNostAuthorized($preorderStatus) : $preorder->delete();
    }

    public function isNotAuthorized($orderTruck){
        if(Auth::user()->id!==$orderTruck->user_id){
            return $this->error('','You are not related to this preorder',403);
        }
}
}
