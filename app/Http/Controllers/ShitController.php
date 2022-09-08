<?php

namespace App\Http\Controllers;


use App\Models\Shit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShitController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(Shit::all(), 200);
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


        $shit = Shit::create([
            'name' => $request->name,
            'tool' => $request->tool,
            'arz' => $request->arz,

        ]);

        return $this->successResponse($shit, 201);
        // return $this->errorResponse('Error', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shit $shit)
    {
        return $this->successResponse($shit, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shit $shit)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $shit->update([
            'name' => $request->name,
            'tool' => $request->tool,
            'arz' => $request->arz,
        ]);

        return $this->successResponse($shit, 200);
        // return $this->errorResponse('Error', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shit $shit)
    {
        $shit = $shit->delete();
        return $this->successResponse($shit, 200);
    }
}
