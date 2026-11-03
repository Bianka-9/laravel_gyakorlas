<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrinkController extends Controller {
    // public function getDrinks(){

    //     $drinks = DB::table('drinks')->get();
    //     return $drinks;
    // }

    public function getDrinkName(){
        $drinkName = DB::table('drinks')
                    ->select('drink as Ital')
                    ->get();
        return $drinkName;
    }

    public function getDrink(){
        // $drink = DB::table('drinks')
        //             ->where('id', 2)
        //             ->firstOrFail();


        $drink = DB::table('drinks')->find(2);
        return response()->json(['ital' => $drink]);
    }

    public function getLessHundred(){
        $drinks = DB::table('drinks')
                    ->where('amount', '<', '100')
                    ->get();
        return response()->json(['szukseges' => $drinks]);
    }

    public function getMoreHundred(){
        $drinks = DB::table('drinks')
                    ->select('amount')
                    ->where('package_id', 1)
                    ->get();
        return response()->json(['drinks' => $drinks]);
            
    }

    public function getDrinksAll(){
        $drinks = DB::table('drinks')
                ->join('packages', 'drinks.package_id', '=', 'packages.id')
                ->join ('types', 'drinks.type_id', '=', 'types.id')
                ->get();

            return response()->json(['drinks' => $drinks]);
    }

    public function updateDrink(int $id){
       $success = DB::table('drinks')
                        ->where('id', $id)
                        ->update([
                            'amount' => 75
                        ]);

        return $success . "módosítása végbement";
    }

    public function deleteDrink( int $id ){
       $success = DB::table('drinks')
            ->where('id', $id)
            ->delete();

        return response()->json([
            'success' => $success,
            'message' => 'sikeres törlés'

        ]);
    }

}
