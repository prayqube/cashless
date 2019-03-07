<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>CashLess India Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('/css/bootstrap-responsive.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('/css/matrix-login.css') }}" />
        <link href="{{ asset('/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="POST" action="{{"validate"}}">
				 <div class="control-group normal_text"> <h3>CashLess India</h3></div>
				 
				<input type="hidden" name="_token" value="{{ @csrf_token() }}">
					<?php 
					 $something = $errors->all(); 
					 if(!empty($something)): 
					?>

					<div class = "alert alert-error">                      
					  @foreach ($errors->all(':message') as $input_error)
						{{ $input_error }}
					  @endforeach 
					</div> 

					<?php endif;



                    ?>	
                   @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
 <div>
					
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Email" name="email" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password"/>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Forgot Password ?</a></span>
                    <span class="pull-right">
					<input type = "submit" class="btn btn-success" name="submit" value="Login"/>
					</span>
                </div>
            </form>
            <form id="recoverform" method="post" action="recoverpwd" class="form-vertical">
                    @csrf 
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span>
                            <input type="text" placeholder="E-mail address" name="email" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right">
                    <input type = "submit" class="btn btn-info" name="Recover" value="Send Reset Link"/>
                    </span>
                </div>
            </form>
        </div>
        
        <script src="{{ asset('/js/jquery.min.js') }} "></script>  
        <script src="{{ asset('/js/matrix.login.js') }}"></script> 
    </body>

</html>
