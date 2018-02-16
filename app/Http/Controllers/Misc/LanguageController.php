<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use App\Models\Misc\Language;

class LanguageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {

        if($request->id != null) {
            $language = Language::whereId($request->id)->select('id','name')->first();
        }
        else {
            $language = Language::select('id','name')->get();
        }

        return response()->json([
            'status' => 'ok',
            'data' => $language
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
        
        $language = new Language();
        $language->name = $request->name;
        $bLanguage = $language->save();

        return response()->json([
            'status' => 'ok',
            'data' => $bLanguage
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

        $language = Language::find($request->id);
        $language->name = $request->name;
        $bLanguage = $language->save();
        
        return response()->json([
            'status' => 'ok',
            'data' => $bLanguage
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

        $language = Language::find($request->id);
        $bLanguage = $language->delete();
        
        return response()->json([
            'status' => 'ok',
            'data' => $bLanguage
        ]);
    }

}

?>