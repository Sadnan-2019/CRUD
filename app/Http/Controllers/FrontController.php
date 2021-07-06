<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
class FrontController extends Controller
{
    public function index(){




$categorieshome =Category::where('publicationstatus',1)
    ->take(3)

    ->get();
$newproduct =Product::where('publicationstatus',1)
     ->orderby('id','ASC')
    ->take(4)
    ->get();

$featureproducts=Product::where('publicationstatus',1)
    ->skip(5)
    ->take(3)
    ->get();

$offerproducts=Product::where('publicationstatus',1)
    ->skip(8)
    ->take(1)
    ->get();

$inspiredproducts=Product::where('publicationstatus',1)
    ->take(8)
    ->skip(1)
    ->get();



return view('front-end.home.home',[
    'categorieshome'=>   $categorieshome,
    'newproduct'=>$newproduct,
    'featureproducts'=>$featureproducts,
    'offerproducts'=>$offerproducts,
    'inspiredproducts'=>$inspiredproducts


]);



    }

    public function Viewcategory($id){
        $categorieshome=Category::where('publicationstatus',1)
                     ->take(3)
                     ->get();
              $categoryProducts=Product::where('CategoryId',$id)
                  ->where('publicationstatus',1)
                  ->get();

           return view('front-end.category.category-content',[
            'categorieshome'=>$categorieshome,
             'categoryProducts'=>$categoryProducts




           ]);

    }




 public function Productdetails($id){
     $categorieshome=Category::where('publicationstatus',1)
         ->take(3)
         ->get();

     $productdetails=Product::find($id);
     $category=Product::select('products.CategoryId','categories.category')
         ->join('categories','categories.id','=','products.CategoryId')
         ->find($id);

        return view('front-end.product.product-details',[

            'categorieshome'=>$categorieshome,
            'productdetails'=>$productdetails,
            'category'=>$category



        ]);







    }
}
