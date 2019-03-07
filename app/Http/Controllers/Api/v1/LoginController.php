<?php 
namespace App\Http\Controllers\Api\v1;
use Illuminate\Http\Request;
use League\Flysystem\Exception;
use Response;
use \Illuminate\Http\Response as Res;
use Validator;
use App\models\User;
///use App\Models\Users;
//use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\Hash;
use App\Traits\ApiFunctions;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    
    use ApiFunctions;
    protected $login_id, $api_token;
    public function __construct()
    {

    }

    /**
     * @description: Api user authenticate method
     * @author: Mohan Sharma
     * @param: user_infoname, password
     * @return: Json String response
     */
    public function authenticate(Request $request)
    {
        //DB::connection()->enableQueryLog();
        $rules = array (
            'user_name' => 'required',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return $this->respondValidationError('Fields Validation Failed.', $validator->errors());
        }else{
            $post      = $request->all();
            //print_r($post);exit;
            $password  = trim($post['password']);
            $user_name = trim($post['user_name']);
            return $this->_login($user_name, $password);
        }
    }

    private function _login($user_name, $password)
    {
        try {

            $user_info = User::validate_user($user_name);
            if(!empty($user_info)) {
           // if($user_info->status == user::STATUS_ACTIVE)
           // {
                if(Hash::check($password, $user_info->password)) {
                    $user_arr = $user_info;
                     
                    return $this->respond([
                        'status' => 'success',
                        'status_code' => $this->getStatusCode(),
                        'message' => 'Login successful!',
                        'data' =>$user_arr,
                        'token'=>$user_info->remember_token
                    ]);
                } else {
                    return $this->respondWithError("Wrong Password.");
                }
            }/* else {
                return $this->respondWithError("Your account is not active.");
            }*/
         else {
            return $this->respondWithError("Wrong username or password.");
        }
        
         
        }catch(Exception $e){
            return $this->respondInternalError("Oops! An error occurred while performing an action!");
        }
    }

         
    /**
     * @description: Api user Change password method
     * @author: Mohan Sharma
     * @param: Token, old password, New password
     * @return: Json String response
     */
    public function update_password(Request $request)
    {
        $rules = array (
            'id' => 'required',
            'new_password' => 'required',
            'old_password' => 'required',
            'roo_id' => 'required',
            'remember_token' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator-> fails()){
            return $this->respondValidationError('Fields Validation Failed.', $validator->errors());
        }
        else {
            try{
                $post = $request->all();
                $this->login_id  = trim($post['login_id']);
                $this->user_type_id = trim($post['user_type_id']);
                //$this->new_password = trim($post['new_password']);
                $api_token = trim($post['api_token']);
                $token_info = Users::is_api_token_exists($api_token);
                if(!empty($token_info))
                {
                    if($token_info->login_id == $this->login_id && $token_info->user_type_id == $this->user_type_id)
                    {
                        $user_info = Common::get_user_info_by_login_id($this->login_id);
                        if(Hash::check($request->old_password, $user_info->password))
                        {
                            $where_array  = [["login_id", '=', $this->login_id]];
                            $update_array = array(
                                "password"        => bcrypt($request->new_password),
                                "last_updated_on" => date("Y-m-d H:i:s")
                            );
                            if(Common::update_table("enu_users_login", $where_array, $update_array)) {
                                $this->setStatusCode(Res::HTTP_OK);
                                return $this->respond([
                                    'status' => 'success',
                                    'status_code' => $this->getStatusCode(),
                                    'message' => 'Password updated successfully!',
                                    'data'=>array('login_id'=>$this->login_id,
                                                  'user_type_id'=>$this->user_type_id,
                                                  'status'=>1
                                                  )
                                ]);
                            }
                            else {
                                return $this->respondNotFound('Oops! Something went wrong.');
                            }
                        }
                        else {
                            return $this->respondNotFound('Old password does not match.');
                        }
                    }else{
                        return $this->respondNotFound('Api token And login_id/user_type_id miss match error.');
                    }
                }else{
                    return $this->respondNotFound('Api token miss match error.');
                }
            }catch(Exception $e){
                return $this->respondInternalError("Oops! An error occurred while performing an action!");
            }
        }
    }

    /**
     * @description: Api user logout method
     * @author: Mohan Sharma
     * @param: Token
     * @return: Json String response
     */
    public function logout($api_token)
    {
        try{
            Common::update_table('enu_users_login', [['api_token','=',$api_token]], array('api_token'=>''));
            $this->setStatusCode(Res::HTTP_OK);
            return $this->respond([
                'status' => 'success',
                'status_code' => $this->getStatusCode(),
                'message' => 'Logout successful!',
            ]);
        }catch(Exception $e){
            return $this->respondInternalError("An error occurred while performing an action!");
        }
    }
}
