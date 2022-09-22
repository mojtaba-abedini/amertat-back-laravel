<?php

namespace App\Http\Controllers;


use App\Models\PaperSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaperSizeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(PaperSize::all(), 200);
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
            'shit_id' => 'required|integer',

        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }

        $paper_size = PaperSize::create([


            'name' => $request->name,
            'shit_id'  => $request->shit_id,


        ]);

        return $this->successResponse($paper_size, 201);
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
        return  $this->successResponse(PaperSize::find($id), 200);
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
            'shit_id' => 'required|integer',
           
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }

        $paper_size = PaperSize::find($id)->update([

            'name' => $request->name,
            'shit_id'  => $request->shit_id,


        ]);

        return $this->successResponse($paper_size, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = PaperSize::find($id)->delete();
        return $this->successResponse($result, 200);
    }
}
