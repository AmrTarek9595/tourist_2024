<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\destination;
use Carbon\Carbon;
use App\Models\Index_page;
use App\Models\reservation;
class test extends Controller
{

    /**Function to collect all data  */
    /**public function collect data{
     *  $input = [
           'dfg','www'
        ];
       $input2=json_encode($input);
       $item = new User;
       $item->name=$input2;
       $item->save();} */

   /* public function test_get(){
        $user= User::pluck('name');

        foreach ($user as $firstName) {
            echo $firstName;
        }
      
        
    }*/
    /**Function to get 1- cover image 
     *                 2- text 1 in cover
     *                 3- text 2 in cover
     *                 4- number of happiest tours and tourists
     *                 5- feedback  
     */
    public function return_index_page(){
        
        $index_cover= Index_page::whereNotNull('cover')->latest('id')->first('cover');

        $index_cover_text_1_2= Index_page::whereNotNull(['cover_text_1','cover_text_2'])->latest('id')->first(['cover_text_1','cover_text_2']);

        $index_cover_no_of_3= Index_page::whereNotNull(['no_success_tours','no_happy_tourist','no_place_explored'])->latest('id')->first(['no_success_tours','no_happy_tourist','no_place_explored']);

        $index_cover_feedback= Index_page::whereNotNull(['tourist_feedback','tourist_name','tourist_title'])->get(['tourist_feedback','tourist_name','tourist_title']);

        return response()->json(["message"=> [$index_cover,$index_cover_text_1_2,$index_cover_no_of_3,$index_cover_feedback]]) ;
        
        

    }

     public function return_dest_page(Request $request){
 


       $data=destination::where("show_trip",1)->get();

        
        $data_best_place=destination::where("show_trip",1)->limit(3)->get();

        $list_of_country=destination::where("show_trip",1)->select('Country')->distinct()->get();
       
        //dd($item->name);
                            
       
     return response()->json(["message2"=>$data_best_place,"message"=>$data,"message3"=>$list_of_country]);


    }
    public function search_destination(Request $request){

        
       if($request->input("search_dest")=="select_all"){
           $data=destination::where("show_trip",1)->get();
        return response()->json(["message"=>$data]);
       }
       else{
        /**IF CONDITION WHERE DESTINATION AND CHECK_IN DATE AND CHECK_OUT DATE NOT EMPTY  */
        if($request->input("search_dest") != NULL &&$request->input("check_in") != NULL && $request->input("check_out") != NULL)
        {
                $data=destination::where("show_trip",1)->where('Country',$request->input("search_dest"))
                ->whereBetween('date_start',[$request->input("check_in"),$request->input("check_out")])
                ->get();
                return response()->json(["message"=>$data]);
        }
        
        
        /**IF CONDITION WHERE DESTINATION NOT NULL AND CHECK IN AND CHECK OUT ARE NULL */
       else if($request->input("search_dest") != NULL &&$request->input("check_in") == NULL && $request->input("check_out") == NULL)
       {
            $data= destination::where("show_trip",1)->where([['Country',$request->input("search_dest")]])
            ->get();
                return response()->json(["message"=>$data]);
        }
        else if(Request("check_out") || Request(NULL))
        {
            $data="please choice Check-In & check-out dates and Destination First";
            return response()->json(["message"=>$data]);
            
            
        }
    }

 
}
public function return_specific_destination()
{

       $data=destination::where("show_trip",1)->where('id',Request("id"))->get();
        
        return response()->json(["message"=>$data]);

                                }
public function send_reservation_via_mail(Request $request){
    $message="";
    $message2="";
    $v = Validator::make($request->all(),[
        'reservation_name'=>'required|min:3|regex:/^[a-z A-Z]+$/u',
        'reservation_email' => 'required|email',
        'reservation_phone_number' => 'required|regex:/^[a-bA-B0-9._]+$/',
        'reservation_textarea'=>'nullable|regex:/^[a-zA-Z0-9]+$/u'
        //'password' => 'required|min:7|confirmed'
    ]);
    if ($v->fails())
    {
      return response()->json(["message"=>$v->errors()]);
    }
    else{
        $reservation = new reservation;

        $reservation->name=$request->input('reservation_name');
        $reservation->email=$request->input('reservation_email');
        $reservation-> phone_number= $request->input('reservation_phone_number');
        $reservation->message      = $request->input('reservation_textarea');
        $reservation->trip_id	   = $request->input('reservation_trip_id');
        
        $reservation->save();
        
        return response()->json(["message"=>"done"]);
        
        //MUST HERE CONFIGURE MY SENDER MAIL AFTER UPLOAD TO HOST PROVIDER
        //return mail('amr.rateyan@gmail.com',"reservation mail", "message" );
        
    }
    


   
}
}
