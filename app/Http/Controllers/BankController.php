<?php

namespace App\Http\Controllers;

use App\Http\Resources\BankResource;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(Bank::all(), 200);
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


        $bank = Bank::create([
            'name' => $request->name,

        ]);

        return $this->successResponse($bank, 201);
        // return $this->errorResponse('Error', 500);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        return $this->successResponse($bank, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }


        $bank->update([
            'name' => $request->name,
        ]);

        return $this->successResponse($bank, 200);
        // return $this->errorResponse('Error', 500);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $bank = $bank->delete();
        return $this->successResponse($bank, 200);
        // return $this->errorResponse('Error', 500);
    }
}
