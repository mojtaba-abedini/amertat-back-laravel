<?php

namespace App\Http\Controllers;

use App\Http\Resources\JensResource;
use App\Models\Jens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JensController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(Jens::all(), 200);
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


        $jens = Jens::create([
            'name' => $request->name,

        ]);

        return $this->successResponse($jens, 201);
        // return $this->errorResponse('Error', 500);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jens $jen)
    {
        return $this->successResponse($jen, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jens $jen)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $jen->update([
            'name' => $request->name,
        ]);

        return $this->successResponse($jen, 200);
        // return $this->errorResponse('Error', 500);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jens $jen)
    {
        $jen = $jen->delete();
        return $this->successResponse($jen, 200);
        // return $this->errorResponse('Error', 500);
    }
}
