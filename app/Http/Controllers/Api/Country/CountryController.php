<?php

namespace App\Http\Controllers\Api\Country;

use App\Http\Controllers\Api\Controller;
use App\Models\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\UserNotDefinedException;

class CountryController extends Controller
{
    public function index()
    {
        return response()->json(Country::all(), 200);
    }

    public function findById($id)
    {
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        return response()->json($country, 200);
    }

    public function addCountry(Request $request)
    {
        $rules =[
            'alias' => 'required|min:2|max:2',
            'name' => 'required|min:3',
            'name_en' => 'required|min:3'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $newCountry = Country::create($request->all());
        return response()->json($newCountry, 201);
    }

    public function updateCountry(Request $request, $id)
    {
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $rules =[
            'alias' => 'min:2|max:2',
            'name' => 'min:3',
            'name_en' => 'min:3'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $country->update($request->all());
        return response()->json($country, 200);
    }

    public function deleteCountry($id)
    {
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $country->delete();
        return response()->json($country, 204);
    }
}
