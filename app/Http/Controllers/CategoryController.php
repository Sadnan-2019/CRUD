<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

     return view('admin.category.add-category');
    }


    public function SaveCategory(Request $request){
        $this->validate($request,[

            'category'=>'required',
            'categorydescription'=>'required',
            'publicationstatus'=>'required'




        ]);


        $category =new Category();
        $category->category =$request->category;
        $category->categorydescription = $request->categorydescription;
        $category->publicationstatus=$request->publicationstatus;
        $category->save();

        return redirect('/add-category')->with('message','Save Succes');





    }



    public function ManageCategory(){

        $categories = Category::all();
        return view('admin.category.manage-category',['categories'=>$categories]);



    }


    public function UnpublishedCategory($id){

        $categories = Category::find($id);
        $categories->publicationstatus=0;
        $categories->save();
        return redirect('/manage-category')->with('message','Successfully');



    }

    public function PublishedCategory($id){

        $cateories= Category::find($id);
        $cateories->publicationstatus=1;
        $cateories->save();
        return redirect('/manage-category')->with('message','Successfully');





    }


    public function EditCategory($id){
        $categories=Category::find($id);
        return view('admin.category.edit-category',['categories'=>$categories]);




    }


    public function UpdateCategory(Request $request){

        $categories = Category::find($request->id);
        $categories->category =$request->category;
        $categories->categorydescription =$request->categorydescription;
        $categories->publicationstatus =$request->publicationstatus;
        $categories->save();
         return redirect('/manage-category')->with('message','Category Upadate Successfully');





    }


    public function DeleteCategory($id){

        $categories=Category::find($id);
        $categories->delete();
        return redirect('/manage-category')->with('message','Category deleted successfully');


    }








}
