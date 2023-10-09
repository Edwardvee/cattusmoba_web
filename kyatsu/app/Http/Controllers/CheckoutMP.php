<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago;

class CheckoutMP extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
                
        $access_token='TEST-6678738600000427-092909-610f68117364afd8e10da0ca791ba649-1244103756';
        MercadoPago\SDK::setAccessToken($access_token);
        $preference=new MercadoPago\Preference();
        $preference->back_urls=array(
        "success"=>"google.com",
        "failure"=>"youtube.com",
        "pending"=>"ornnhub.com"
        );
        $productos=[];
        $item = new MercadoPago\Item();
        $item->title="Quirocoins";
        $item->quantity=1;
        $item->unit_price=1500;
        array_push($productos, $item);
        $preference->id;
        $preference->items=$productos;
        $preference->save();

    }
}
