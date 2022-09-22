<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(Order::all(), 200);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [


            'status_id' => 'required|integer',
            'taraf_hesab_id' => 'required|integer',
            'jens_id' => 'required|integer',
            'karbari_id' => 'required|integer',
            'size_id' => 'required|integer',
            'tedad' => 'required|integer',
            'printing_color' => 'required|integer',
            'selefon_id' => 'required|integer',
            'talakoob_id' => 'required|integer',
            'uv_id' => 'required|integer',
            'letter_press_id' => 'required|integer',
            'sahafi_id' => 'required|integer',
            'total_price' => 'required|integer',
            'peyaneh_price' => 'required|integer',
            'order_date' => 'required',
            'bank_id' => 'required|integer',


        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }
        $order_number = Carbon::now()->microsecond;

        $order = Order::create([

            'order_number' => $order_number,
            'status_id' => $request->status_id,
            'taraf_hesab_id' => $request->taraf_hesab_id,
            'jens_id' => $request->jens_id,
            'karbari_id' => $request->karbari_id,
            'size_id' => $request->size_id,
            'tedad' => $request->tedad,
            'printing_color' => $request->printing_color,
            'selefon_id' => $request->selefon_id,
            'talakoob_id' => $request->talakoob_id,
            'uv_id' => $request->uv_id,
            'size_ekhtesasi' => $request->size_ekhtesasi,
            'paper_sizes_id' => $request->paper_sizes_id,
            'letter_press_id' => $request->letter_press_id,
            'sahafi_id' => $request->sahafi_id,
            'total_price' => $request->total_price,
            'peyaneh_price' => $request->peyaneh_price,
            'order_date' => $request->order_date,
            'bank_id' => $request->bank_id,


        ]);

        return $this->successResponse($order, 201);
        // return $this->errorResponse('Error', 500);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Order $order)
    {
        $validator = Validator::make($request->all(), [


            'status_id' => 'required|integer',
            'taraf_hesab_id' => 'required|integer',
            'jens_id' => 'required|integer',
            'karbari_id' => 'required|integer',
            'size_id' => 'required|integer',
            'tedad' => 'required|integer',
            'printing_color' => 'required|integer',
            'selefon_id' => 'required|integer',
            'talakoob_id' => 'required|integer',
            'uv_id' => 'required|integer',
            'letter_press_id' => 'required|integer',
            'sahafi_id' => 'required|integer',
            'total_price' => 'required|integer',
            'peyaneh_price' => 'required|integer',
            'order_date' => 'required',
            'bank_id' => 'required|integer',

        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }

        $order->update([

            'order_number' => $request->order_number,
            'status_id' => $request->status_id,
            'taraf_hesab_id' => $request->taraf_hesab_id,
            'jens_id' => $request->jens_id,
            'karbari_id' => $request->karbari_id,
            'size_id' => $request->size_id,
            'tedad' => $request->tedad,
            'printing_color' => $request->printing_color,
            'selefon_id' => $request->selefon_id,
            'talakoob_id' => $request->talakoob_id,
            'uv_id' => $request->uv_id,
            'letter_press_id' => $request->letter_press_id,
            'sahafi_id' => $request->sahafi_id,
            'size_ekhtesasi' => $request->size_ekhtesasi,
            'paper_sizes_id' => $request->paper_sizes_id,
            'total_price' => $request->total_price,
            'peyaneh_price' => $request->peyaneh_price,
            'order_date' => $request->order_date,
            'bank_id' => $request->bank_id,

        ]);

        return $this->successResponse($order, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $result = Order::find($id)->delete();
        return $this->successResponse($result, 200);
    }
}
