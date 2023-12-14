<?php

namespace App\Http\Controllers\api\truck;

use Carbon\Carbon;
use App\Models\Truck;
use App\Models\OrderTruck;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrderTruckRequest;
use App\Http\Resources\OrderTruckResource;

class OrderTruckController extends Controller
{

    public function index(){
        $truck_list = Truck::get();
        return response()->json([
            'status' => 'success',
            'truck_list' => $truck_list,
        ], 200);
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
            'loaded_date_time'=>Carbon::now()
        ]);

        return new OrderTruckResource($orderTruck);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderTruck $orderTruck){
        return $this->isNotAuthorized($orderTruck) ? $this->isNostAuthorized($orderTruck) : $orderTruck->delete();
    }

    public function isNotAuthorized($orderTruck){
        if(Auth::user()->id!==$orderTruck->user_id){
            return $this->error('','You are not related to this preorder',403);
        }
}
}
