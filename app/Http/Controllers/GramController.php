<?php

namespace App\Http\Controllers;
use App\Models\Gram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GramController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(Gram::all(), 200);
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
            'gram' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $gram = Gram::create([
            'gram' => $request->gram,

        ]);

        return $this->successResponse($gram, 201);
        // return $this->errorResponse('Error', 500);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gram $gram)
    {
        return $this->successResponse($gram, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gram $gram)
    {
        $validator = Validator::make($request->all(), [

            'gram' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $gram->update([
            'gram' => $request->gram,
        ]);

        return $this->successResponse($gram, 200);
        // return $this->errorResponse('Error', 500);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gram $gram)
    {
        $gram = $gram->delete();
        return $this->successResponse($gram, 200);
        // return $this->errorResponse('Error', 500);
    }
}
