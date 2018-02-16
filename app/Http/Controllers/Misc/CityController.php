<?php

namespace App\Http\Controllers\Misc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use App\Models\Misc\City;


class CityController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {

        if($request->id != null) {
            $city = City::whereId($request->id)->select('id','name')->first();
        }
        else {
            $city = City::select('id','name')->get();
        }

        return response()->json([
            'status' => 'ok',
            'data' => $city
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        
        $city = new City();
        $city->name = $request->name;
        $bCity = $city->save();

        return response()->json([
            'status' => 'ok',
            'data' => $bCity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $city = City::find($request->id);
        $city->name = $request->name;
        $bCity = $city->save();
        
        return response()->json([
            'status' => 'ok',
            'data' => $bCity
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $city = City::find($request->id);
        $bCity = $city->delete();
        
        return response()->json([
            'status' => 'ok',
            'data' => $bCity
        ]);
    }

}

?>