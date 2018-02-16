<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use App\Models\Misc\Benefit;

class BenefitController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {

        if($request->id != null) {
            $benefit = Benefit::whereId($request->id)->select('id','name')->first();
        }
        else {
            $benefit = Benefit::select('id','name')->get();
        }

        return response()->json([
            'status' => 'ok',
            'data' => $benefit
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
        
        $benefit = new Benefit();
        $benefit->name = $request->name;
        $bBenefit = $benefit->save();

        return response()->json([
            'status' => 'ok',
            'data' => $bBenefit
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

        $benefit = Benefit::find($request->id);
        $benefit->name = $request->name;
        $bBenefit = $benefit->save();
        
        return response()->json([
            'status' => 'ok',
            'data' => $bBenefit
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

        $benefit = Benefit::find($request->id);
        $bBenefit = $benefit->delete();
        
        return response()->json([
            'status' => 'ok',
            'data' => $bBenefit
        ]);
    }

}

?>