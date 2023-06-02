<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\SmsForm;
use App\Models\Sms;
use App\Http\Service\ValidateNumber;
use App\Http\Service\PriceList;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SmsController extends Controller
{   
    
    
    
    public function index()
    {
        return 'endpoint is working';
    }
    public function store(SmsForm $request,ValidateNumber $processInputNumber, PriceList $priceList)
    {
        //return array of price list of number prefix e.g [0702345=2.2]
        $priceList=$priceList->extractNumberAndCharges(); 
        if($priceList == -1){
            return response()->json(['errors' =>'reading file'], 422);
        }
        //pass receipent  number and array of pricelist
        $cost=$processInputNumber->input($request->recipients, $priceList);
        //Sms::create($request->all());
        return response()->json(['success' =>$cost], 201);
       
      
       
    }
    

   /*
    public function store(Request $request,ValidateNumber $inputNumber)
    {
        
        $validator = Validator::make($request->all(), [
            'sender' => ['required', 'string', 'min:3', 'max:11'],
            'recipients' => ['required', 'string', 'min:1'],
            'msg' => ['required'],
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
      
       
    }
    */
	
	
	


   
}
