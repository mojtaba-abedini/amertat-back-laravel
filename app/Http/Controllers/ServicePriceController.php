<?php

namespace App\Http\Controllers;


use App\Models\ServicePrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicePriceController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(ServicePrice::all(), 200);
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

            'form_price' => 'required|integer',
            'selephon_price' => 'required|integer',
            'uv_price' => 'required|integer',
            'letter_press_price' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $service_price = ServicePrice::create([
            'form_price' => $request->form_price,
            'selephon_price' => $request->selephon_price,
            'uv_price' => $request->uv_price,
            'letter_press_price' => $request->letter_press_price,

        ]);

        return $this->successResponse($service_price, 201);
        // return $this->errorResponse('Error', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//       dd(ServicePrice::all()->where('id', $id));
        return $this->successResponse(ServicePrice::all()->where('id', $id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'form_price' => 'required|integer',
            'selephon_price' => 'required|integer',
            'uv_price' => 'required|integer',
            'letter_press_price' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }

        ServicePrice::where('id', $id)->update([
            'form_price' => $request->form_price,
            'selephon_price' => $request->selephon_price,
            'uv_price' => $request->uv_price,
            'letter_press_price' => $request->letter_press_price,
        ]);
//

        return $this->successResponse($request->all(), 200);
        // return $this->errorResponse('Error', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = ServicePrice::find('id', $id)->delete();
        return $this->successResponse($result, 200);
    }
}
