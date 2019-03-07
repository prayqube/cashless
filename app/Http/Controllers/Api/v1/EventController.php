<?php

namespace App\Http\Controllers\Api\v1;
use Illuminate\Http\Request;
use League\Flysystem\Exception;
use Response;
use \Illuminate\Http\Response as Res;
use Validator;
use App\models\Event;
use Illuminate\Support\Facades\Hash;
use App\Traits\ApiFunctions;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    use ApiFunctions;
    
    public function eventList()
    {
    	try{

    	$eventList = Event::all ();
    	if($eventList)
    	{

    		$this->setStatusCode(Res::HTTP_OK);
                        return $this->respond([
                            'status' => 'success',
                            'status_code' => $this->getStatusCode(),
                            'message' => 'success',
                            'data'=>$eventList
                        ]);
    	}
    	else
    	{
    		$this->setStatusCode(Res::HTTP_NOT_FOUND);
                        return $this->respond([
                            'status' => 'failed',
                            'status_code' => $this->getStatusCode(),
                            'message' => 'No Events has been registered',
                            'data'=>$eventList
                        ]);

    	}
    }catch(Execption $e)
    {
    return $this->respondInternalError("Oops! An error occurred while performing an action!");

    }

    }
}