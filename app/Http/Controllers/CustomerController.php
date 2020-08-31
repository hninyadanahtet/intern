<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Restaurant;
use App\Menu_Type;
use App\Menu;


class CustomerController extends Controller
{
    public function home()
    {
        return view('foodDelivery.home');
    }
   public function index()
   {
        $restaurants = Restaurant::all();
        return view('foodDelivery.index',compact('restaurants'));          
   }
   public function show(Restaurant $restaurant,$id)
   {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant = Restaurant::where('id', $id)->with('meal_types')->first();
        $meal_types = $restaurant->meal_types;    
        $menu_types = Menu_type::where('restaurant_id',$id)->get(); 
        $menus = Menu::where('restaurant_id',$id)->with('menu_type')->get();
        return view('foodDelivery.show',compact('restaurant','menus', 'meal_types','menu_types') );
   }

   ///It is not include under the comment
//    public function create(Restaurant $restaurant,$id)
//    {
//         $restaurant = Restaurant::findOrFail($id);
//         dd($restaurant);
//         $id = $restaurant->id;
       

//        $restaurant = Restaurant::where('id', $id)->with('meal_types')->first();
//        $meal_types = $restaurant->meal_types;      
//        $menu_types = Menu_type::where('restaurant_id',$id)->get();
//        $menus = Menu::where('restaurant_id',$id)->with('menu_type')->get();
       
//        return view('restaurants.showRestaurant',compact('restaurant','menus', 'meal_types','menu_types') );
//    }
}

