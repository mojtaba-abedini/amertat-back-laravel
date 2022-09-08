<?php

namespace App\Http\Controllers;

use App\Http\Resources\SizeResource;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(Size::all(), 200);
//        return response()->json(Size::all(),200);
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

            'jens_id' => 'required|integer',
            'karbari_id' => 'required|integer',
            'name' => 'required|string',
            'paperTool' => 'required|integer',
            'paperArz' => 'required|integer',

        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }

        $size = Size::create([

            'jens_id'  => $request->jens_id,
            'karbari_id'  => $request->karbari_id,
            'name' => $request->name,
            'paperTool'  => $request->paperTool,
            'paperArz' => $request->paperArz,

        ]);

        return $this->successResponse($size, 201);
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
        return  $this->successResponse(Size::find($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $validator = Validator::make($request->all(), [

            'jens_id' => 'required|integer',
            'karbari_id' => 'required|integer',
            'name' => 'required|string',
            'paperTool' => 'required|integer',
            'paperArz' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }

        $size->update([
            'jens_id'  => $request->jens_id,
            'karbari_id'  => $request->karbari_id,
            'name' => $request->name,
            'paperTool'  => $request->paperTool,
            'paperArz' => $request->paperArz,
        ]);

        return $this->successResponse($size, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Size::find($id)->delete();
        return $this->successResponse($result, 200);
    }
}
