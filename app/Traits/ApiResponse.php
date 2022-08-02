<?php

namespace App\Traits;

use App\Http\Resources\PaginationResource;
use Symfony\Component\HttpFoundation\Response;




trait ApiResponse
{
    public function respondWithData($data,$paginate=false,$status=200,$extra=[])
    {

        $responseArray = [
            'status' => $status,
            'data' =>$data,
        ];

        if ( $extra ){
            foreach ($extra as $key => $value){
                $responseArray[$key] = $value;
            }
        }

        if ( $paginate ) {
            $responseArray['meta'] = new PaginationResource($data);
        }



        return response()->json($responseArray,$status);
    }

    public function respondWithSuccess($msg="",$status=200)
    {
        $responseArray = [
            'status' =>$status,
            'messages' => $msg,
        ];

       return response()->json($responseArray,$status);
    }


    public function respondWithFail($msg="",$status=400)
    {
        $responseArray = [
            'status' =>$status,
            'messages' => $msg,
        ];

       return response()->json($responseArray,$status);
    }


}