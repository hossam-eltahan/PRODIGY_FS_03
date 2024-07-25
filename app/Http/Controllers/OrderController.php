<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\SendOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function send(SendOrderRequest $request)
    {
        // dd($request->all());
        $formData = new Order;
        $formData->name = $request->name;
        $formData->country_code = $request->country_code;
        $formData->number = $request->number;
        $formData->address = $request->address;
        $formData->status = 0;
        $formData->offer = $request->offer;
        $formData->product_id = $request->product_id;
        $formData->save();
        return redirect()->back()->with('success', 'تم تقديم النموذج بنجاح!');
    }

}
