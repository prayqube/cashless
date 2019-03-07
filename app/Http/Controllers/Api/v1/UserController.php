<?php

namespace App\Http\Controllers\Api\v1;
use Illuminate\Http\Request;
use League\Flysystem\Exception;
use Response;
use \Illuminate\Http\Response as Res;
use Validator;
use App\models\User;
use App\models\UserInfo;
use Illuminate\Support\Facades\Hash;
use App\Traits\ApiFunctions;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    use ApiFunctions;
    public function update_password(Request $request)
    {
        $rules = array (
            'id' => 'required',
            'new_password' => 'required',
            'old_password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator-> fails()){
            return $this->respondValidationError('Fields Validation Failed.', $validator->errors());
        }else {
            try{
                $post = $request->all();
                $user_info = User::validate_user($post['id']);
                if(Hash::check($request->old_password, $user_info->password)){
                    $update_array = array(
                        "password"   => bcrypt($request->new_password),
                        "updated_at" => date("Y-m-d H:i:s")
                    );
                    if(User::where([["id", '=', $post['id']]])->update($update_array)) {
                        $this->setStatusCode(Res::HTTP_OK);
                        return $this->respond([
                            'status' => 'success',
                            'status_code' => $this->getStatusCode(),
                            'message' => 'Password updated successfully!',
                            'data'=>$user_info
                        ]);
                    }
                    return $this->respondNotFound('Oops! Something went wrong.');
                }
                return $this->respondNotFound('Old password does not match.');
            }catch(Exception $e){
                return $this->respondInternalError("Oops! An error occurred while performing an action!");
            }
        }
    }



    public function create(Request $request)
    {

            try{
             $rules = array (
            'password' => 'required',
            'first_name' => 'required',
            //'middle_name'=>'required',
            'last_name'=>'required',
            'email' =>'required',
            'contact_no'=>'required',
            'token'=>'required'
            ,'event_id'=>'required',
                );
        $validator = Validator::make($request->all(), $rules);
        if ($validator-> fails()){
            return $this->respondValidationError('Fields Validation Failed.', $validator->errors());
        }else {
            try{
                $post = $request->all();
                $user_info = User::validate_user_reg($post['email'],$post['contact_no']);
               if(empty($user_info))
               {
                    $input_array=array(
                     'password' =>md5($request->password),  
                     'first_name' =>$request->first_name,
                    'middle_name'=>$request->middle_name,
                    'last_name'=>$request->last_name,
                    'email' =>$request->email,
                    'contact_no'=>$request->contact_no,
                    'role_id'=>1,
                    'remember_token'=>$request->token,
                   // 'event_id'=>$request->event_id

                    );
                    $user=User::create($input_array);
                    $info=array('event_id'=>$request->event_id,
                        'user_id'=>$user->id,
                        'rfid'=>$request->rfid,
                    );
                   
                   // print_r($user);die();
                    if($user) {
                         $rfid=UserInfo::create($info);

              $user_info = User::validate_user($user->id);
                        $this->setStatusCode(Res::HTTP_OK);
                        return $this->respond([
                            'status' => 'success',
                            'status_code' => $this->getStatusCode(),
                            'message' => 'User Registered successfully!',
                            'data'=>$user_info,$rfid,
                            
                        ]);
                    }
                }
                else
                {
                     $this->setStatusCode(Res::HTTP_UNPROCESSABLE_ENTITY);
                        return $this->respond([
                            'status' => 'success',
                            'status_code' => $this->getStatusCode(),
                            'message' => 'User already registered!',
                            'data'=>$user_info
                        ]);


                }
                    return $this->responseNotFound('Oops! Something went wrong.');
                
            }catch(Exception $e){
                return $this->respondInternalError("Oops! An error occurred while performing an action!");
            }
        }

                }catch(Exception $e){
            return $this->respondInternalError("An error occurred while performing an action!");
        }





    } 



}