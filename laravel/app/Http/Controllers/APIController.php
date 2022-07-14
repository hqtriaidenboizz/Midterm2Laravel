<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function getProducts(){
        $restaurants = product::all();
        return response() -> json($restaurants);
    }
    public function searchByName(Request $request)
    {
        if($request->keyword == null)
        {
            return DB::all();
        }
        $result = DB::table('restaurants')
                ->where('name', 'like', "%$request->keyword%")
                ->get();
        return $result;
    }
}
