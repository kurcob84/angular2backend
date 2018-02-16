<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use App\Models\Misc\Position;

class PositionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {

        if($request->id != null) {
            $position = Position::whereId($request->id)->select('id','name')->first();
        }
        else {
            $position = Position::select('id','name')->get();
        }

        return response()->json([
            'status' => 'ok',
            'data' => $position
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
        
        $position = new Position();
        $position->name = $request->name;
        $bPosition = $position->save();

        return response()->json([
            'status' => 'ok',
            'data' => $bPosition
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

        $position = Position::find($request->id);
        $position->name = $request->name;
        $bPosition = $position->save();
        
        return response()->json([
            'status' => 'ok',
            'data' => $bPosition
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

        $position = Position::find($request->id);
        $bPosition = $position->delete();
        
        return response()->json([
            'status' => 'ok',
            'data' => $bPosition
        ]);
    }

}

?>