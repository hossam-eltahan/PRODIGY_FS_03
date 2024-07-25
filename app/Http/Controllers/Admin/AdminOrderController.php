<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Order::query()->with('product');

        if ($request->has('status')) {
            $status = $request->status;
            switch ($status) {
                case 'Pending':
                    $query->where('status', 0);
                    break;
                case 'Completed':
                    $query->where('status', 1);
                    break;
                case 'Canceled':
                    $query->where('status', 2);
                    break;
            }
        }

        $orders = $query->get();

        return view('admin.order.index', compact('orders'));
    }

    /*
     * update status of orders
     * */
    public function updateStatus($id, $status)
    {
        $order = Order::findOrFail($id);
        $order->status = $status;
        $order->save();

        return redirect()->back()->with('success', 'تم تحديث حالة الطلب بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Order::findorFail($id);
            $category->delete();
            return response(['status' => 'success', 'message' => 'Deleted successfully']);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}
