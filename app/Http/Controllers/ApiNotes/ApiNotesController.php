<?php

namespace App\Http\Controllers\ApiNotes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiNotesController extends Controller
{
   public function sendResponse($result,$message){
         $response = [
             'success'=> true,
             'data' => $result,
             'message'=>$message
         ];
         return response()->json($response,200);
   }
       public function sendError($error,$errorMessages, $code =404){
           $response = [
               'success'=> false,
               'data' => $error,
               'message'=>$errorMessages
           ];
           if (!empty($errorMessages)) {
           $response['data']= $errorMessages;
           }


           return response()->json($response,$code);
   }
}
