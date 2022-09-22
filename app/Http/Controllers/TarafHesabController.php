<?php

namespace App\Http\Controllers;

use App\Models\TarafHesab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TarafHesabController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(TarafHesab::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $store = TarafHesab::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);

        return $this->successResponse($store, 201);
        // return $this->errorResponse('Error', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TarafHesab $taraf_hesab)
    {
        return $this->successResponse($taraf_hesab, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $result = TarafHesab::find($id)->update([

            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return $this->successResponse($result, 200);
        // return $this->errorResponse('Error', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = TarafHesab::find($id)->delete();
        return $this->successResponse($result, 200);
    }
}
