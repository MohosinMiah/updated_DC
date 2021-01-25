<?php

namespace App\Http\Controllers;

use App\Seller;
use App\Customer;
use Illuminate\Http\Request;
use Validator;
use Session;
use Carbon\Carbon;
use \DB;


class SellerController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('seller.auth.login');
    }

    
    
    /**
     * seller Login.
     *
     */
    public function login()
    {

        return view('seller.auth.login');

    }

    
    /**
     * seller Login Authentication.
     *
     */
    public function login_post(Request $request){


        

        // Data Validation

        $validatedData =Validator::make($request->all(), [

            'phone' => ['required'],
            'password' => ['required'],

        ]);

        // Store Data In Valriables

        $phone = $request->phone;

        $password =md5($request->password);

        // Check Data Validation

        if ($validatedData->fails()) {
            dd($validatedData);

            return redirect()->back()->withErrors($validatedData)->withInput();;  // Redirect Back With Errors

        }else{


            $seller =  DB::table('sellers')->where(['phone'=> $phone,'password'=> $password ])->first();



            // Check seller Login Success Or Fail
            if($seller){

                 // Store Admin Info Adter Successfully Login

                Session::put('seller_id', $seller->id);

                Session::put('seller_name', $seller->name);

                Session::put('seller_phone', $seller->phone);
                
                Session::put('seller_is_login', true);


                return redirect()->route('seller.dashboardseller_dashboard');

                //   Test  ********************   
                // var_dump($seller);
                //  die;

            }else{

                Session::flash('message', 'Mobile Number Or Passwod is wrong!'); 
                return  redirect()->back();


            }
                
       
        }

       

      

        
    }


        

    /**
     * seller Dashboartd.
     *
     */

    public function dashboard(){

            // Seller Login Check 
            if(!Session::get('seller_is_login') && !Session::get('admin_is_login')){   
                return redirect()->route('home');
             }
             
             $customers = Customer::orderBy('created_at', 'desc')->get();
    


        return view('dashboard.main.main',compact('customers'));


    }







    /**
     * seller Forgotten Password.
     *
     */

    public function forgotten_password(){

        return view('seller.auth.forgotten_password');


    }


     /**
     *  OTP Fill UP
     *
     */

    public function otp_updata(){
            


        $seller_forgetpass_phone = Session::get('seller_forgetpass_phone');


        // Check Phone and OPT is Exist

        if($seller_forgetpass_phone == null){
          

            return redirect()->route('seller.forgottenseller_forgotten_password');

        }

        return view('seller.auth.otp');

    }


        
        /**
         * Check OTP
         *
         */ 
    public function otp_check(Request $request){

           // Data Validation

           $validatedData =Validator::make($request->all(), [
            'otp' => ['required'],
        ]);

        // Store Data In Valriables

        $otp = $request->otp;


        // Check Data Validation

        if ($validatedData->fails()) {
            // dd($validatedData);

            return redirect()->back()->withErrors($validatedData)->withInput();;  // Redirect Back With Errors

        }else{

            // Collect Data From User Table 
            $is_otp_correct = DB::table('sellers')->where('otp',$otp)->first();
         
            // Check Given OTP Code with Actual OTP Code 
            if($is_otp_correct){

                // If OTP is currect then otp number store in variable
                Session::put('seller_forgetpass_otp', $otp);


                return redirect()->route('seller.pass_resetseller_reset_pass');

            }else{
                
                Session::flash('message', 'Check Your OTP Code!'); 
                return  redirect()->back();

            }

        }

    }


    /**
     * Password Reset Form
     */

    public function password_reset(){

        
        $seller_forgetpass_phone = Session::get('seller_forgetpass_phone');

        $seller_forgetpass_otp = Session::get('seller_forgetpass_otp');


        // Check Phone and OPT is Exist

        if($seller_forgetpass_phone == null || $seller_forgetpass_otp == null ){
          

            return redirect()->route('seller.forgottenseller_forgotten_password');

        }
    
        return view('seller.auth.passwordreset');
    }

     /**
     * Send OTP
     */
    public function send_otp(Request $request)
    {





        $code = rand(1000,9999);

            
        // Data Validation

        $validatedData =Validator::make($request->all(), [
            'phone' => ['required'],
        ]);

        // Store Data In Valriables

        $phone = $request->phone;


        // Check Data Validation

        if ($validatedData->fails()) {
            // dd($validatedData);

            return redirect()->back()->withErrors($validatedData)->withInput();;  // Redirect Back With Errors

        }else{
                // Check This Associate Number user is seller or Not

            $is_seller = DB::table('sellers')->where('phone',$phone)->first();
            

            if($is_seller){

                // Update OTP  customers ntable 
                $status =  DB::table('sellers')
                ->where('phone',$is_seller->phone)
                ->update(['otp' => $code]);

                // If Mobile Number is  currect then Mobile number store in session
                Session::put('seller_forgetpass_phone', $phone);

                // var_dump(Session::get('phone'));
                //       die();
                

                $this->sendSms($request->phone,$code);


                return redirect()->route('seller.send_otpseller_otp');

            }else{


                Session::flash('message', 'Phone Number Is Not Found.'); 
                return  redirect()->back();


            }

   
    

        }



     

    }

    public function sendSms($number,$code){
  

        // Twilio::message('8801816073636', $code);
        // to  8801857126452
        //  ar  8801767086814


        $url = "http://66.45.237.70/api.php";

        // $number="8801857126452";
        // $text="Hello Dear, Customer . Your OPT  Code ".$code;

        
        $text="From DISCOUNT A2Z OPT code =  ".$code;
        $data= array(
        'username'=>"01857126452",
        'password'=>"2RVXW48F",
        // 
        'number'=>"$number",
        'message'=>"$text"
        );


        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];
        return $sendstatus;

    }


/**
 * New Password - Update Password
 */


    public function new_password(Request $request) {

     

        // Stored Session Phone and OTP

        $seller_forgetpass_phone = Session::get('seller_forgetpass_phone');

        $seller_forgetpass_otp = Session::get('seller_forgetpass_otp');
 
        

        // Data Validation

        $validatedData =Validator::make($request->all(), [
            'password' => ['required'],
        ]);

        // Store Data In Valriables

        $password = $request->password;

        // Password Hashing Technique
        $password = md5($password);


        // Check Data Validation

        if ($validatedData->fails()) {
            // dd($validatedData);

            return redirect()->back()->withErrors($validatedData)->withInput();;  // Redirect Back With Errors

        }else{


        // Update Password in customers table based on phone and otp code 

         // Update OTP  customers ntable 
             $status =  DB::table('sellers')
             ->where(
                 [
                    ['phone' , '=', $seller_forgetpass_phone],  
                    ['otp' , '=', $seller_forgetpass_otp],  
                 ]
                 )
             ->update(
                ['password' => $password]
            );
           

          // Check Password Update successfully or not
          
          if($status){
                        
            // Forget multiple keys...
            $request->session()->forget(['seller_forgetpass_phone', 'seller_forgetpass_otp']);

            return redirect()->route('seller.dashboardseller_dashboard');

            // var_dump($status);
            //  echo "Update Successfully";
            // die;

          }else{
         
            
            Session::flash('message', 'Password Is Not Changed.'); 

            return  redirect()->back();



          


        }

             }

    }







/**
 *  ******************************************************************************************
 * ******************************** Dashboard Functionality Implementation  START ************
 * *******************************************************************************************
 */

/**
     * Show the form for creating a new Seller.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        // Seller Login Check 
        if(!Session::get('seller_is_login') && !Session::get('admin_is_login')){   
        return redirect()->route('home');
        }
        


        return view('seller.customers.create');
    }




    /**
     * Store a newly created seller in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // Data Validation

            $validatedData = Validator::make($request->all(), [
                'card_number' => 'required|unique:customers',
                'name' => 'required',
                'phone' => 'required|unique:customers',
                'gender' => 'required',
                'address' => 'required',
            ]);

                    // Store Data In Valriables

                    $card_number = $request->card_number;

                    $name = $request->name;

                    $phone = $request->phone;

                    $gender = $request->gender;

                    $address = $request->address;

                    $id = Session::get('seller_id');
                  
                    if(!$id){ 

                  
                        
                        $id = Session::get('admin_id').'_admin';

                      

                    }



    // Check Data Validation

    if ($validatedData->fails()) {

        // dd($validatedData);

        return redirect()->back()->withErrors($validatedData)->withInput();;  // Redirect Back With Errors

    }else{

        // Check Card Number is exist or not in Cart Table

        $is_cart_exist = DB::table('carts')->where('cart_number',$card_number)->first();

        if(!$is_cart_exist){

            Session::flash('message', 'Entered Cart Number is not Valid!'); 
            return  redirect()->back();

        }

      

        $customers =  DB::table('customers')->insert(
            [
                'card_number'=> $card_number,
                'name'=> $name,
                'phone'=> $phone,
                'gender'=> $gender,
                'address'=> $address,
                'seller_id' => $id,
                'created_at' => Carbon::now(),
            ]
        );


        // Check Seller Created Successfully or not
        if($customers){

            Session::flash('class_success', 'success '); 
            Session::flash('message', 'Seller Created Successfuly!'); 
            return  redirect()->back();

        }

    }

    }



    public function all(){

        // Seller Login Check 
        if(!Session::get('seller_is_login') && !Session::get('admin_is_login')){   
            return redirect()->route('home');
         }
    
         $id = Session::get('seller_id');
                  
                if(!$id){ 
                    
                    $customers = Customer::orderBy('created_at', 'desc')->get();

                }else{

                    $customers = Customer::where('seller_id',$id)->orderBy('created_at', 'desc')->get();

                }


   

        return view('seller.customers.all',compact('customers'));

   }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit($customer_id)
    {

        // Seller Login Check 
        if(!Session::get('seller_is_login') && !Session::get('admin_is_login')){   
            return redirect()->route('home');
         }
    
        //  Check Seller has Permission To Update, View or Delete 
        $id = Session::get('seller_id');
        $is_all_modify     =  true; 
        if($id){ 
            
            $is_all_modify = Customer::where('id',$customer_id)->where('seller_id',$id)->first();
           
        }
   

        if(!$is_all_modify){
            Session::flash('message', 'Access Denied. You Have No Right!'); 
            return redirect()->back();

        }


        $customer = Customer::where('id',$customer_id)->first();
        return view('seller.customers.update',compact('customer'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customer__id)
    {

        // Seller Login Check 
        if(!Session::get('seller_is_login') && !Session::get('admin_is_login')){   
            return redirect()->route('home');
         }
    

        //  Check Seller has Permission To Update, View or Delete 
        $id = Session::get('seller_id');
              
        $is_all_modify     =  true; 

        if($id){ 
            
            $is_all_modify = Customer::where('id',$customer__id)->where('seller_id',$id)->first();
           
        }
   

        if(!$is_all_modify){
            Session::flash('message', 'Access Denied. You Have No Right!'); 
            return redirect()->back();

        }

        // Data Validation

        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ]);

                // Store Data In Valriables


                $name = $request->name;

                $phone = $request->phone;

                $gender = $request->gender;

                $address = $request->address;

                $id = Session::get('seller_id');
                  
                if(!$id){ 
                    
                    $id = Session::get('admin_id').'_admin';

                }

    // Check Data Validation

    if ($validatedData->fails()) {

        // dd($validatedData);

        return redirect()->back()->withErrors($validatedData)->withInput();;  // Redirect Back With Errors

    }else{

        $customers =  DB::table('customers')
        ->where('id',$customer__id)
        ->update(
            [
                'name'=> $name,
                'phone'=> $phone,
                'gender'=> $gender,
                'address'=> $address,
                'seller_id' => $id,
                'updated_at' => Carbon::now(),
            ]
            );
        // Check Seller Created Successfully or not
        if($customers){

            Session::flash('class_success', 'success '); 

            Session::flash('message', 'Customer Updated Successfuly!'); 
            // dd("back");

            return  redirect()->back();


        }
// dd("Hello");
    }



    }

  /**
     * Display the specified resource.
     *
     * @param  \App\seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show($customer_id)
    {
            
        // Seller Login Check 
        if(!Session::get('seller_is_login') && !Session::get('admin_is_login')){   
            return redirect()->route('home');
         }
    
    //  Check Seller has Permission To Update, View or Delete 
    $id = Session::get('seller_id');
    $is_all_modify     =  true; 
             
    if($id){ 
        
        $is_all_modify = Customer::where('id',$customer_id)->where('seller_id',$id)->first();
       
    }


    if(!$is_all_modify){
        Session::flash('message', 'Access Denied. You Have No Right!'); 
        return redirect()->back();

    }



        $customer = Customer::where('id',$customer_id)->first();

        return view('seller.customers.show',compact('customer'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\seller  $seller
     * @return \Illuminate\Http\Response
     */


    public function destroy($customer_id)
    {

        // Seller Login Check 
        if(!Session::get('seller_is_login') && !Session::get('admin_is_login')){   
            return redirect()->route('home');
            }
            
        


        $customer = Customer::where('id',$customer_id)->delete();

        if( $customer){

            Session::flash('message', 'Customer Delete Successfuly!'); 
            return  redirect()->back();

        }else{

            Session::flash('message', 'Error Not Deleted'); 
            return  redirect()->back();

        }

    }


/**
 *  ******************************************************************************************
 * ******************************** Dashboard Functionality Implementation  END ************
 * *******************************************************************************************
 */





 /**
 *  ******************************************************************************************
 * ******************************** seller Settings Implementation  END ************
 * *******************************************************************************************
 */


 public function seller_settings(){

        // Seller Login Check 
        if(!Session::get('seller_is_login') && !Session::get('admin_is_login')){   
            return redirect()->route('home');
         }
    

    $seller_id = Session::get('seller_id');

    $seller = Seller::where('id',$seller_id)->first();

    $data = [
        'seller'  => $seller,
    ];
     
    return view('seller.setting.setting')->with('data',$data);
 }
    

/**
 * 
 * seller Info Update ******************************************************************
 * 
 */


public function info(Request $request){


        // Seller Login Check 
        if(!Session::get('seller_is_login') && !Session::get('admin_is_login')){   
            return redirect()->route('home');
         }
    
         
        // Data Validation

        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
        ]);

        // Store Data In Valriables

        $name = $request->name;


        $address = $request->address;

        $seller_id = Session::get('seller_id');

        // Check Data Validation

        if ($validatedData->fails()) {

            // dd($validatedData);

            return redirect()->back()->withErrors($validatedData)->withInput();;  // Redirect Back With Errors

        }else{

            $seller =  DB::table('sellers')
            ->where('id',$seller_id)
            ->update(
                [
                    'name'=> $name,
                    'address'=> $address,
                    'updated_at' => Carbon::now(),
                ]
                );
            // Check seller Info Updated Successfully or not
            if($seller){

                Session::flash('message', 'seller Updated Successfuly!'); 
                return  redirect()->back();

            }

        }
    
}




/**
 * 
 * seller Password Change ******************************************************************
 * 
 */


public function change_pass(Request $request){


        // Seller Login Check 
        if(!Session::get('seller_is_login') && !Session::get('admin_is_login')){   
            return redirect()->route('home');
         }
    


         

    // Data Validation

    $validatedData = Validator::make($request->all(), [
        'old_password' => 'required',
        'password' => 'required',
    ]);


    


    // Store Data In Valriables

    $old_password = $request->old_password;

    $password = $request->password;

    $seller_id = Session::get('seller_id');
    // Hashing Password
    $password = md5($password);
    $old_password = md5($old_password);

    // Check Data Validation

    if ($validatedData->fails()) {

        // dd($validatedData);

        return redirect()->back()->withErrors($validatedData)->withInput();;  // Redirect Back With Errors

    }else{

       


      // Check Old Password

      $seller_password = DB::table('sellers')->where('password',$old_password)->first();

      if($seller_password == null){
              // If Old Password Does not Match
              Session::flash('message', 'Old Password Wrong'); 
              return  redirect()->back();
      }

       if($seller_password->password == $old_password ){
     
        $seller =  DB::table('sellers')
        ->where('id',$seller_id)
        ->update(
            [
                'password'=> $password,
                'updated_at' => Carbon::now(),
            ]
            );
        // Check seller Info Updated Successfully or not
            Session::flash('message', 'seller Password Successfuly!'); 
            return  redirect()->back();

        }else{

            // If Old Password Does not Match
            Session::flash('message', 'Old Password Wrong'); 
            return  redirect()->back();
            
        }

    }

}




/**
 * 
 * seller Phone Update ******************************************************************
 * 
 */


public function change_phone(Request $request){


    // Seller Login Check 
    if(!Session::get('seller_is_login') && !Session::get('admin_is_login')){   
        return redirect()->route('home');
        }
    


    // Data Validation

    $validatedData = Validator::make($request->all(), [
        'phone' => 'required',
    ]);

    // Store Data In Valriables

    $phone = $request->phone;

    $seller_id = Session::get('seller_id');

    // Check Data Validation

    if ($validatedData->fails()) {

        // dd($validatedData);

        return redirect()->back()->withErrors($validatedData)->withInput();;  // Redirect Back With Errors

    }else{

        $is_phone =  DB::table('sellers')
        ->where('id',$seller_id)
        ->update(
            [
                'phone'=> $phone,
                'updated_at' => Carbon::now(),
            ]
            );
        // Check seller Info Updated Successfully or not
        if($is_phone){

            Session::flash('message', 'Phone Number Updated Successfuly!'); 
            return  redirect()->back();

        }

    }

}





public function logout(){


    // // Seller Login Check 
    // if(!Session::get('seller_is_login')){   
    //    return redirect()->route('seller.loginseller_login');
    // }

   // Store Admin Info Adter Successfully Login

   Session::forget('seller_id');

   Session::forget('seller_name');

   Session::forget('seller_phone');
   
   Session::forget('seller_is_login');

   Session::flush();

   return redirect()->route('home');


}



 /**
 *  ******************************************************************************************
 * ******************************** seller Settings Implementation  END ************
 * *******************************************************************************************
 */

  
}
