<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago;
use Illuminate\Database\Eloquent\Model;
use App\Models\TiendaModel;

class CheckoutMP extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        
     $productosTienda = TiendaModel::all();
     $productos=[];
     $access_token='TEST-6678738600000427-092909-610f68117364afd8e10da0ca791ba649-1244103756';
     MercadoPago\SDK::setAccessToken($access_token);
    $preferences = [];
     foreach($productosTienda as $produTienda){
      $preference=new MercadoPago\Preference();
      $preference->back_urls=array(
        "success"=>"localhost:8000/store/exito",
        "failure"=>"localhost:8000/store/error",
        "pending"=>"localhost:8000/store/pendiente"
      );
        $item = new MercadoPago\Item();
        $item->title=$produTienda->quantity . " Quirocoins";
        $item->unit_price=$produTienda->unit_price;
        $item->quantity=1;
        $item->description=$produTienda->description;
        array_push($productos, $item);
        $preference->id;
        $preference->items=$productos;
        $preference->save(); 
        array_push($preferences, $preference);
      }
      
        return view("store", ['preferences' => $preferences]);
    }
}
