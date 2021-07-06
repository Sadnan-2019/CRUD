<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;


class BrandController extends Controller
{
    public function index(){

        return view('admin.brand.add-brand');

    }


    public function SaveBrand(Request $request){
           $this->validate($request,[
               'brand'=>'required',
               'description'=>'required',
               'publicationstatus'=>'required'


           ]);
//        dd($request->all());
        $brands=new Brand();
        $brands->brand = $request->brand;
        $brands->description = $request->description;
        $brands->publicationstatus = $request->publicationstatus;
        $brands->created_at = Carbon::now();
        $brands->updated_at = Carbon::now();

   $brands->save();

   return redirect('add-brand')->with('message','Barnd details save success');
    }


    public function ManageBrand(){
        $brands =Brand::all();
      return view('admin.brand.manage-brand',['brands'=>$brands]);



    }


public function EditBrand ($id){
        $brands= Brand::find($id);
        return view('admin.brand.edit-brand',['brands'=>$brands]);


}


public function UpdateBrand(Request $request){

        $brands= Brand::find($request->id);
        $brands->brand =$request->brand;
        $brands->description =$request->description;
        $brands->publicationstatus =$request->publicationstatus;
        $brands->save();
        return redirect('/manage-brand/')->with('message','Brand Updated Success');




}


    public function DeleteBrand($id){
        $brand =Brand::find($id);
        $brand->delete();
        return redirect('/manage-brand/')->with('message','Brand Deleted Success');

    }

    public function UnpublishedBrand($id){
        $brand=Brand::find($id);
        $brand->publicationstatus = 0;
        $brand->save();
        return redirect('/manage-brand/')->with('message','Success');


    }


    public function PublishedBrand($id){

        $brands= Brand::find($id);
        $brands->publicationstatus =1;
        $brands->save();
        return redirect('/manage-brand/')->with('message','Success');

    }


}
