<?php

namespace App\Http\Controllers;

use App\Http\Resources\KarbariResource;
use App\Models\Karbari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KarbariController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(Karbari::all(), 200);
//        return response()->json(Karbari::all(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jens_id' => 'required|integer',
            'name' => 'required|string',

        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $karbari = Karbari::create([
            'jens_id' => $request->jens_id,
            'name' => $request->name,

        ]);

        return $this->successResponse($karbari, 201);
        // return $this->errorResponse('Error', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  $this->successResponse(Karbari::find($id), 200);
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
            'jens_id' => 'required|integer',
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $result = Karbari::find($id)->update([
            'jens_id' => $request->jens_id,
            'name' => $request->name,
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
        $result = Karbari::find($id)->delete();
        return $this->successResponse($result, 200);
    }
}
