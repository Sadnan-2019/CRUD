<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;
use App\Models\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function AddToCart(Request $request){
/*return $request->id;*/
        $CartProduct=Product::find($request->id);
        Cart::add([

            'id'=>$request->id,
            'name'=>$CartProduct->productname,
            'price'=>$CartProduct->productprice,
            'qty'=>$request->qty,
            'weight'=>$request->weight,
            'options'=>[

                'image'=>$CartProduct->photo


            ]


        ]);
/*return $CartProduct;
exit();*/

        return redirect('/show-cart');



    }


    public function Showcart(){
        $categorieshome =Category::where('publicationstatus',1)
            ->take(3)
        ->get();

        $cartproducts=Cart::content();
       /* return $cartproduct;*/

        return view('front-end.cart.show-cart',[



            'categorieshome'=>$categorieshome,
            'cartproducts'=>$cartproducts



        ]);






    }



    public function Deletecart($id){

     Cart::remove($id);
     return redirect('/show-cart');



    }


    public function Updatecart(Request $request){
        Cart::update($request->rowId,$request->qty);

        return redirect('/show-cart');







    }
}
