<?php

namespace App\Http\Controllers;
use App\Models\ShitSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShitSizeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(ShitSize::all(), 200);
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


        $shit_size = ShitSize::create([
            'name' => $request->name,
            'tool' => $request->tool,
            'arz' => $request->arz,

        ]);

        return $this->successResponse($shit_size, 201);
        // return $this->errorResponse('Error', 500);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShitSize $shit_size)
    {
        return $this->successResponse($shit_size, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShitSize $shit_size)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $shit_size->update([
            'name' => $request->name,
            'tool' => $request->tool,
            'arz' => $request->arz,

        ]);

        return $this->successResponse($shit_size, 200);
        // return $this->errorResponse('Error', 500);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShitSize $shit_size)
    {
        $shit_size = $shit_size->delete();
        return $this->successResponse($shit_size, 200);
        // return $this->errorResponse('Error', 500);
    }
}
