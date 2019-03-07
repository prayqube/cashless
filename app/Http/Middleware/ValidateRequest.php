<?php

namespace App\Http\Middleware;

use Closure;
use Response;
use App\Traits\ApiFunctions;
use App\Models\User;

class ValidateRequest
{
    use ApiFunctions;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // there may not be authentication information on this request
        if (!$request->headers->has('Authorization')) {
            return $this->respondValidationError('Authorization header not found.','');
        }

        //echo $this->getBearerToken();exit;
        if(!User::validate_user_token('0',$this->getBearerToken())){
            return $this->respondNotFound('Api token miss match error.');exit;
        }
        return $next($request);
    }
    /**
     * get access token from header
     * */
    protected function getBearerToken() {
        $headers = $this->getAuthorizationHeader();
        // HEADER: Get the access token from the header
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }

    /**
     * Get header Authorization
     * */
    protected function getAuthorizationHeader(){
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }

}
