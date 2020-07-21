<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->json()->get('fullname') != null){
            $newOrder = new Order();
            $newOrder->status = 1;
            $newOrder->fullname = $request->json()->get('fullname');
            $newOrder->address = $request->json()->get('address');
            $newOrder->phone = $request->json()->get('phone');
            $newOrder->email = $request->json()->get('email');
            $newOrder->total = $request->json()->get('total');
            $newOrder->total_inc_ship = $request->json()->get('total') + $request->json()->get('shippingFee');
            try {
                if($newOrder->save()){
                    $orderDetails = $request->json()->get('order');
                    if(count($orderDetails) > 0){
                        foreach ($orderDetails as $pizza) {
                            $orderDetail = new OrderDetail();
                            $orderDetail->order_id = $newOrder->id;
                            $orderDetail->pizza_id = $pizza['id'];
                            $orderDetail->quantity = $pizza['qty'];
                            $orderDetail->save();
                        }
                    }
                }
            } catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => "Error!"
                    ], 400
                );
            }

            return response()->json([
                    'status' => true,
                    'message' => "Success!"
                ], 200
            );
        }else{
            return response()->json([
                'status' => false,
                'message' => "Error!"
            ], 400
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
