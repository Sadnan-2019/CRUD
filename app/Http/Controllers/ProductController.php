<?php

namespace App\Http\Controllers;



use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends Controller
{


    public function index(){
        $brands = Brand:: where('publicationstatus',1)->get();
        $categories = Category:: where('publicationstatus',1)->get();

        return view('admin.product.add-product',[

            'categories'=>$categories,
            'brands'=>$brands



        ]);



    }

  public function SaveProduct(Request $request){

        $ProductImage=$request->file('photo');
        $ImageOriginal=$ProductImage->getClientOriginalName();
        $directory='product-image/';
        $Imageurl=$directory.$ImageOriginal;
/*        $ProductImage->move($directory,$ImageOriginal);*/
      Image::make($ProductImage)->resize(300,300)->save($Imageurl);






      $product=new Product();
        $product->CategoryId=$request->CategoryId;
        $product->BrandId=$request->BrandId;
        $product->productname=$request->productname;
        $product->productdescription=$request->productdescription;
        $product->productprice=$request->productprice;
        $product->productquantity=$request->productquantity;
        $product->photo=$Imageurl;
        $product->publicationstatus=$request->publicationstatus;

        $product->save();

        return redirect('/add-product')->with('message','save success');



  }



  public function ManageProduct(){
        $products = DB::table('products')
            ->join('categories','products.CategoryId','=','categories.id')
            ->join('brands','products.BrandId','=','brands.id')
            ->select('products.*','categories.category','brands.brand')
            ->get();

        return view('admin.product.manage-product', ['products'=>$products,]);




  }





  public function UnpublishProduct($id){


        $products= Product::find($id);
        $products->publicationstatus=0;
        $products->save();
        return redirect('/manage-product')->with('message','success');
  }

  public function PublishProduct($id){
        $products= Product::find($id);
        $products->publicationstatus=1;
        $products->save();
      return redirect('/manage-product')->with('message','success');




  }


  public function EditProduct($id){


        $products=Product::find($id);
        $categories=Category::where('publicationstatus',1)->get();
        $brands=Brand::where('publicationstatus',1)->get();


        return view('admin.product.edit-product',[
            'products'=>$products,
            'categories'=>$categories,
            'brands'=>$brands



        ]);


  }

  public function UpdateProduct(Request $request){

        $ProductImage=$request->file('photo');
        if($ProductImage)   {
$products=Product::find($request->id);



if(file_exists(public_path($products->photo))){


    unlink($products->photo);
}



            $ImageOriginal=$ProductImage->getClientOriginalName();
            $directory='product-image/';
            $Imageurl=$directory.$ImageOriginal;
            $ProductImage->move($directory,$ImageOriginal);
            /*return $Imageurl;
            exit();*/

            $products->CategoryId=$request->CategoryId;
            $products->BrandId=$request->BrandId;
            $products->productname=$request->productname;
            $products->productdescription=$request->productdescription;
            $products->productprice=$request->productprice;
            $products->productquantity=$request->productquantity;
            $products->photo=$Imageurl;
            $products->publicationstatus=$request->publicationstatus;
            $products->save();
        /*    return $products;
            exit();*/
            return redirect('/manage-product')->with('message','Upadate Succes');



        }


        else{

            $products=Product::find($request->id);
            $products->CategoryId=$request->CategoryId;
            $products->BrandId=$request->BrandId;
            $products->productname=$request->productname;
            $products->productdescription =$request->productdescription;
            $products->publicationstatus=$request->publicationstatus;
            $products->save();

            return redirect('/manage-product')->with('message','Upadate Succes');
        }










  }





  public function DeleteProduct($id){

        $products= Product::find($id);
        $products->delete();
        return redirect('/manage-product')->with('message','success');


}










}
