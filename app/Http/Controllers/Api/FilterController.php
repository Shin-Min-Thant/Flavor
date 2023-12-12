<?php

namespace App\Http\Controllers\Api;

use App\Models\Preorder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    //filter by calendar and list type
    public function calendarControl(Request $request){
        $dept = $request->dept;
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        if($dept === 'sales'){

            $filtered_data = Preorder::whereBetween('created_at', [$startDate, $endDate])->get();
        }
    }
}
