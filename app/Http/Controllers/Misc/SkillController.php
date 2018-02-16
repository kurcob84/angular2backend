<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use App\Models\Misc\Skill;

class SkillController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {

        if($request->id != null) {
            $skill = Skill::whereId($request->id)->select('id','name')->first();
        }
        else {
            $skill = Skill::select('id','name')->get();
        }

        return response()->json([
            'status' => 'ok',
            'data' => $skill
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
        
        $skill = new Skill();
        $skill->name = $request->name;
        $bSkill = $skill->save();

        return response()->json([
            'status' => 'ok',
            'data' => $bSkill
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

        $skill = Skill::find($request->id);
        $skill->name = $request->name;
        $bSkill = $skill->save();
        
        return response()->json([
            'status' => 'ok',
            'data' => $bSkill
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

        $skill = Skill::find($request->id);
        $bSkill = $skill->delete();
        
        return response()->json([
            'status' => 'ok',
            'data' => $bSkill
        ]);
    }

}

?>