<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\OrderDataTable;
use App\DataTables\PendingOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ProductAccountStore;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function index(OrderDataTable $dataTables)
    {
        return $dataTables->render('admin.order.index');
    }

    public function pendingOrder(PendingOrderDataTable $dataTables)
    {
        return $dataTables->render('admin.order.pending-order');
    }

    public function show($id)
    {
        $orders = Order::findOrFail($id);
        $orderProducts = OrderProduct::where('order_id', $id)->get();
        $transaction = Transaction::where('order_id', $id)->first();
        $oderProductAccounts = ProductAccountStore::with('product')->where('order_id', $id)->get();
        return view('admin.order.edit', compact('orders', 'orderProducts', 'oderProductAccounts', 'transaction'));
    }

    public function changeStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->order_status = !$order->order_status;
        $order->save();
        return response(['message' => 'Thay đổi trạng thái thành công', 'status' => 'success']);
    }
}
