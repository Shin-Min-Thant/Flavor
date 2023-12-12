<?php

namespace App\Http\Controllers\Api\status;

use App\Http\Requests\PreorderStatusRequest;
use App\Http\Resources\PreorderStatusResource;
use Illuminate\Http\Request;
use App\Models\PreorderStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PreOrderstatusController extends Controller
{
    public function index(){
        return PreOrderstatusController::collection(
            PreorderStatus::where('user_id',Auth::user()->id)->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PreorderStatusRequest $request){
        $request->validated($request->all());
        $userId = Auth::user()->id;

        $preOrderstatus=PreorderStatusRequest::create([
            'preorder_id'=>$request->preorder_id,
            'stauts'=>$request->status,
            'user_id'=>$userId,
            'updated_at'=>$request->updated_at
        ]);


        return new PreorderStatusResource($preOrderstatus);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreorderStatus $preorderStatus){
        return $this->isNotAuthorized($preorderStatus) ? $this->isNostAuthorized($preorder) : $preorder->delete();
    }

    public function isNotAuthorized($preorderStatus){
        if(Auth::user()->id!==$preorderStatus->user_id){
            return $this->error('','You are not related to this preorder',403);
        }
}
}
