<?php

namespace App\Http\Controllers\Api\v1;
use Illuminate\Http\Request;
use League\Flysystem\Exception;
use Response;
use \Illuminate\Http\Response as Res;
use Validator;
use App\models\Transaction;
use Illuminate\Support\Facades\Hash;
use App\Traits\ApiFunctions;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class TransactionController extends Controller
{
	use ApiFunctions;

	public function getTransaction($id)
	{
	
		try{

    	$transactions = Transaction::where('user_id','=',$id)->get();
    	if($transactions)
    	{

    		$this->setStatusCode(Res::HTTP_OK);
                        return $this->respond([
                            'status' => 'success',
                            'status_code' => $this->getStatusCode(),
                            'message' => 'success',
                            'data'=>$transactions
                        ]);
    	}
    	else
    	{
    		$this->setStatusCode(Res::HTTP_NOT_FOUND);
                        return $this->respond([
                            'status' => 'failed',
                            'status_code' => $this->getStatusCode(),
                            'message' => 'No Trnasactions',
                            'data'=>$transactions
                        ]);

    	}
    }catch(Execption $e)
    {
    return $this->respondInternalError("Oops! An error occurred while performing an action!");

    }



	}

}