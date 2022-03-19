<?php

namespace App\Http\Controllers;

use App\Models\Foodchef;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function users(){
        $users = User::all();
        return view("admin.users",compact("users"));
    }
    public function deleteuser($id)
    {

        $user=User::find($id);
        $user->delete();
        return redirect()->back();
    }
    public function foodmenu (){
        $foods = Food::all();
        return view('admin.foodmenu',compact('foods'));
    }
    public function upload(Request $request){
        $data = $request->all();
        $food = new Food();
        $food->title = $data['title'];
        $food->description = $data['description'];
        $food->price = $data['price'];
        $image = $data['image'];
        $imagename =time().'.'.$image->getClientOriginalExtension();
        $data['image']->move('foodimage',$imagename);
        $food->image=$imagename;
        $food->save();
        return redirect()->back()->with('status','Add food success!');
    }
    public function deletemenu($id){
        $food = Food::find($id);
        $food->delete();
        return redirect()->back()->with('deleted','Delete food success!');

    }
    public function updateview($id){
        $food = Food::find($id);
        return view('admin.updateview',compact('food'));
    }
    public function update(Request $request,$id){
        $data = $request->all();
        $get_image = $request->image;
//        dd($get_image);
        $food = Food::find($id);
        $food->title = $data['title'];
        $food->description = $data['description'];
        $food->price = $data['price'];
        if ($get_image){
            $image = $data['image'];
            $imagename =time().'.'.$image->getClientOriginalExtension();
            $data['image']->move('foodimage',$imagename);
            $food->image=$imagename;
        }

        $food->save();
        return redirect()->back()->with('status','Update food success!');
    }

    #reservation
    public function reservation(Request $request)
    {
        $reservation = new Reservation();
        $reservation->name=$request->name;
        $reservation->email=$request->email;
        $reservation->phone=$request->phone;
        $reservation->guest=$request->guest;
        $reservation->date=$request->date;
        $reservation->time=$request->time;
        $reservation->message=$request->message;
        $reservation->save();
        return redirect()->back() ->with('alert', 'Reserved!');
    }
    public function viewreservation()
    {
        if(Auth::id())
        {
            $reservations=Reservation::all();
            return view("admin.adminreservation",compact("reservations"));
        }
        else
        {
            return redirect('login');
        }
    }
    #chef
    public function viewchef(){
        $foodchefs = Foodchef::all();
        return view("admin.adminchef",compact('foodchefs'));
    }
    public function uploadchef(Request $request){
        $data = $request->all();
        $foodchef = new Foodchef();
        $foodchef->name = $data['name'];
        $foodchef->speciality = $data['speciality'];
        $image = $data['image'];
        $imagename =time().'.'.$image->getClientOriginalExtension();
        $data['image']->move('chefimage',$imagename);
        $foodchef->image=$imagename;
        $foodchef->save();
        return redirect()->back()->with('status','Add food chef success!');
    }
    public function deletechef($id)
    {
        $foodchef=Foodchef::find($id);
        $foodchef->delete();
        return redirect()->back()->with('deleted','Delete food chef success!');
    }
    public function updatechef($id)
    {
        $foodchef=Foodchef::find($id);
        return view("admin.updatechef",compact("foodchef"));
    }
    public function updatefoodchef(Request $request ,$id){
        $data = $request->all();
        $get_image = $request->image;
        $foodchef = Foodchef::find($id);
        $foodchef->name = $data['name'];
        $foodchef->speciality = $data['speciality'];
        if ($get_image){
            $image = $data['image'];
            $imagename =time().'.'.$image->getClientOriginalExtension();
            $data['image']->move('chefimage',$imagename);
            $foodchef->image=$imagename;
        }

        $foodchef->save();
        return redirect()->back()->with('status','Update food chef success!');
    }

    #order

    public function orders()
    {
        $orders=Order::all();
        return view('admin.orders',compact('orders'));
    }

    public function search(Request $request)
    {
        $search=$request->search;
        $orders=Order::where('name','Like','%'.$search.'%')->orWhere('foodname','Like','%'.$search.'%')
            ->get();
        return view('admin.orders',compact('orders'));
    }
}
