<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pharmacy;

class SystemController extends Controller
{


    
    public function saveInfo(Request $request){
        $newUser = new Pharmacy;
        $newUser->medname = $request->medname;
        $newUser->brand = $request->medbrand;
        $newUser->price = $request->medprice;
        $newUser->save();

        
        return redirect('/dashboard');
    }

    public function deleteTask($id){
        $user = Pharmacy::find($id);
        $user -> delete();

        return redirect('/dashboard');
    }

    public function updateTask(Request $request,$id){
        $user = Pharmacy::find($id);
        $user -> medname = $request->medname;
        $user -> brand = $request -> medbrand;
        $user -> price = $request -> medprice;
        $user -> save();

        return redirect('/dashboard');
    }
}
