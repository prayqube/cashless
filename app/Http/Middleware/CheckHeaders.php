<?php

namespace App\Http\Middleware;

use Closure;
use Response;
use App\Traits\ApiFunctions;


class CheckHeaders
{
    use ApiFunctions;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $closure)
    {

        $headers = $this->apache_request_headers();
        if(!isset($_SERVER['HTTP_RAYQUBE_CASHLESS'])){
            return $this->respondValidationError('Please set custom header.', $headers);
        }
        
        if($_SERVER['HTTP_RAYQUBE_CASHLESS'] != '123456'){
            return $this->respondValidationError('wrong custom header value', ['RAYQUBE_CASHLESS'=>$headers['RAYQUBE-CASHLESS']]);
        }
        return $closure($request);
    }

        public  function apache_request_headers() {
          $arh = array();
  $rx_http = '/\AHTTP_/';
  foreach($_SERVER as $key => $val) {
    if( preg_match($rx_http, $key) ) {
      $arh_key = preg_replace($rx_http, '', $key);
      $rx_matches = array();
      // do some nasty string manipulations to restore the original letter case
      // this should work in most cases
      $rx_matches = explode('_', $arh_key);
      if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
        foreach($rx_matches as $ak_key => $ak_val) $rx_matches[$ak_key] = ucfirst($ak_val);
        $arh_key = implode('-', $rx_matches);
      }
      $arh[$arh_key] = $val;
    }
  }
  return( $arh );
        }


}