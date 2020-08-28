<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;

class ItemController extends Controller{

    public function index(){
      try{
         $item  = Item::query();
         $item->select("*");
         $item =$item->get();
         return response()->json(['stat'=>'success','data'=>$item],200);
      }
      catch(\Exception $exc){
          return response()->json(['stat'=>'err','msg'=>"error",'data'=>$exc],200);
      }
    }
}
