<?php

namespace App\Http\Controllers;

use App\Models\Vahed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VahedPriceController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(Vahed::all(), 200);
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
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $vahed = Vahed::create([
            'name' => $request->name,

        ]);

        return $this->successResponse($vahed, 201);
        // return $this->errorResponse('Error', 500);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vahed $vahed)
    {
        return $this->successResponse($vahed, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vahed $vahed)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $vahed->update([
            'name' => $request->name,
        ]);

        return $this->successResponse($vahed, 200);
        // return $this->errorResponse('Error', 500);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vahed $vahed)
    {
        $vahed = $vahed->delete();
        return $this->successResponse($vahed, 200);
        // return $this->errorResponse('Error', 500);
    }
}
