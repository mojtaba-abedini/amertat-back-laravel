<?php

namespace App\Http\Controllers;

use App\Models\PaperPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaperPriceController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(PaperPrice::all(), 200);
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
            'name' => 'required|string',
            'jens_id' => 'required|integer',
            'gram_id' => 'required|integer',
            'shit_size_id' => 'required|integer',
            'price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $paper_price = PaperPrice::create([
            'name' => $request->name,
            'jens_id' => $request->jens_id,
            'gram_id' => $request->gram_id,
            'shit_size_id' => $request->shit_size_id,
            'price' => $request->price,


        ]);
        return $this->successResponse($paper_price, 201);
        // return $this->errorResponse('Error', 500);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(PaperPrice $paper_price)
    {
        return $this->successResponse($paper_price, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaperPrice $paper_price)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'jens_id' => 'required|integer',
            'gram_id' => 'required|integer',
            'shit_size_id' => 'required|integer',
            'price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $paper_price->update([
            'name' => $request->name,
            'jens_id' => $request->jens_id,
            'gram_id' => $request->gram_id,
            'shit_size_id' => $request->shit_size_id,
            'price' => $request->price,

        ]);

        return $this->successResponse($paper_price, 200);
        // return $this->errorResponse('Error', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaperPrice $paper_price)
    {
        $paper_price = $paper_price->delete();
        return $this->successResponse($paper_price, 200);
    }
}
