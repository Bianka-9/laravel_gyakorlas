<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drink;

class PubController extends Controller
{
    public function getDrinks(){
        $drinks = Drink::all();
        return response()->json(['drinks' => $drinks]);
    }

    public function getDrink( Drink $drink ){
       // $drink = Drink::find( $id );
       $name =  $drink->drink;
        return response()->json(['drink' => $name]);

    }
}
