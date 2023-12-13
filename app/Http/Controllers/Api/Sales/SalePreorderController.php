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
        return salePreorderResource::collection(
            Preorder::orderBy('created_at','desc')->get()
        );
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
        return $this->isNotAuthorized($preorder) ? $this->isNostAuthorized($preorderStatus) : $preorder->delete();
    }

    public function isNotAuthorized($preorder){
        if(Auth::user()->id!==$preorder->user_id){
            return $this->error('','You are not related to this preorder',403);
        }
}
}
