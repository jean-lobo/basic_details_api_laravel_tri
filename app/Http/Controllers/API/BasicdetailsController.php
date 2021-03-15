<?php

namespace App\Http\Controllers\API;
use App\Models\Basicdetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\BasicdetailsResource;
class BasicdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'first_name' => 'required|min:2|max:30',
            'last_name' => 'required|min:2|max:30',
            //'dob'=>'required|date_format:d/m/Y|before:now',
            'dob'=>'required|before:now',
            'phone' => 'required|regex:/(\+91)[0-9]{10}/',
           'email' => 'required|email|max:255',
            'password'=>'required|max:255',
           'address'=>'required|max:255' 
 ]);
     if($validator->fails()){
    return response(['error' => $validator->errors(), 'Validation Error']);
        }
        $basicdetails= Basicdetails::create($data);

        return response([ 'basicdetails' => new BasicdetailsResource($basicdetails), 'message' => 'Created successfully'], 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basicdetails  $basicdetails
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $basicdetails = Basicdetails::find($id);
  
        if (is_null($basicdetails)) {
            return $this->sendError('Details not found.');
        }
        return response([ 'basicdetails' => new BasicdetailsResource($basicdetails), 'message' => 'Retrieved successfully'], 200);
       // return $this->sendResponse(new BasicdetailsResource($basicdetails), 'Details retrieved successfully.');
    }
   /* public function show(Basicdetails $basicdetails)
    {
        return response([ 'basicdetails' => new BasicdetailsResource($basicdetails), 'message' => 'Retrieved successfully'], 200);
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basicdetails  $basicdetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basicdetails $basicdetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basicdetails  $basicdetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basicdetails $basicdetails)
    {
        //
    }
}
