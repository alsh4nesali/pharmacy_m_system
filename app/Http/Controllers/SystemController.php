<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pharmacy;
use App\models\Orders;

class SystemController extends Controller
{


    public function saveOrders(Request $request){
        $newOrder = new Orders;
        $newOrder->fullname = $request->fullname;
        $newOrder->email = $request->email;
        $newOrder->medname = $request->medname;
        $newOrder->quantity = $request->quantity;
        $newOrder->save();

        
        return view('welcome',['medInformation' => Pharmacy::all()]);
    }

    
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
