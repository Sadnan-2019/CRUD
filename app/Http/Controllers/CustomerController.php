<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use  Session;
use Mail;

class CustomerController extends Controller
{
    public function NewCustomerLogin()
    {
        $categorieshome = Category::where('publicationstatus', 1)
            ->take(3)
            ->get();
        return view('front-end.customer.customer-login', [

            'categorieshome' => $categorieshome
        ]);


    }


    public function Register()
    {

        $categorieshome = Category::where('publicationstatus', 1)
            ->take(3)
            ->get();
        return view('front-end.customer.register', [


            'categorieshome' => $categorieshome
        ]);


    }


    public function NewRegisterCustomer(Request $request)
    {
        $registercustomer = new Customer();
        $registercustomer->first_name = $request->first_name;
        $registercustomer->last_name = $request->last_name;
        $registercustomer->email = $request->email;
        $registercustomer->phone = $request->phone;
        $registercustomer->password = Hash::make($request->password);
        $registercustomer->address = $request->address;
        $registercustomer->save();
        $registercustomerId = $registercustomer->id;
        Session::put('customerId', $registercustomerId);
        Session::put('customerName', $registercustomer->first_name . '' . $registercustomer->last_name);

        $email = $registercustomer['email'];
        $data = ['email' => $registercustomer['email'],
            'first_name' => $registercustomer,
            'last_name' => $registercustomer['last_name'],
            'code' => base64_encode($registercustomer['email'])];
        Mail::send('front-end.mails.confirmation-mail', $data, function ($meassage) use ($email) {

            $meassage->to($email);
            $meassage->subject('FROM EISER BY MD SADNAN HOSSIAN');


        });


        return redirect('/');


    }


    public function onlyCustomerLogin(Request $request)
    {

        $registercustomer = Customer::where('email', $request->email)->first();
        /*return $registercustomer;*/

        if (password_verify($request->password, $registercustomer->password)) {
            /*return $registercustomer;
            exit();*/
            Session::put('customerId', $registercustomer->id);
            Session::put('customerName', $registercustomer->first_name . '' . $registercustomer->last_name);
            return redirect('/');


        } else {


            return redirect('/newcustomer/login')->with('meassage', 'Password Invalid');


        }


    }


    public function PasswordForm()
    {
        $categorieshome = Category::where('publicationstatus', 1)
            ->take(4)
            ->get();
        return view('front-end.customer.changepassword', [

            'categorieshome' => $categorieshome

        ]);
    }



   /* public function UpdatePassword(Request $request)

    {
        $registercustomer = Customer::where('password')->first();
        dd($registercustomer);

        $this->validate($request,[
            'oldpassword' => 'required',
          'password' => 'required|string|min:6|confirmed',
         'password_confirmation' => 'required|string|confirmed',
            ]);



        $registercustomer = Customer::first('id');
        $dbpass = Customer::first('password');

        $oldpassword = $request->password;
        $newpass = $request->newpassword;
        $confirmpass = $request->confirmpassword;

        if (Hash::check($oldpassword, $dbpass->password)) {
            if ($newpass == $confirmpass) {
              $userpass=Customer::find($registercustomer);
                $userpass->password = Hash::make($request->newpassword);

                $userpass->save();


            } else {

                return redirect('/change-password')->with('meassage', ' password dont match');
            }

        }

        else {
            return redirect('/change-password')->with('meassage', 'incorrect password');

        }
    }*/





    public function UpdatePassword(Request $request)  {
        $customerId = Session::get('customerId');
         $customer = Customer::find($customerId);


        $this->validate($request,[
           'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

       if (!Hash::check($request->current_password, $customer->password)) {

           return back()->with('meassage', 'Current password does not match!');
       }

        $customer->password =Hash::make($request->password);
        $customer->save();

       return redirect('/')->with('meassage', 'Password successfully changed!');
   }





}
