@include('header')
@include('left')
<script>
 function  enableAll()
  {
   var inputs = document.getElementsByTagName("input"); 
document.getElementById("savebtn").disabled = false;
document.getElementById("address").disabled = false;

  for(var i = 0; i<= inputs.length; i++)
    {inputs[i].disabled=false;}
        
        };
        
    
</script>


<div id="content">
  <div id="content-header">
   
    <h1>Vendor Profile</h1>
     @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
              @endif
            <?php 

           $something = $errors->all(); 
           if(!empty($something)): 
          ?>

          <div class = "alert alert-error">                      
            @foreach ($errors->all(':message') as $input_error)
            {{ $input_error }}
            @endforeach 
          </div> 

          <?php endif; ?>
    
    
  </div>
  <div class="widget-title"> 

          </div>
  <form class = "form1" method='post' action="{{url('/vendors/update/'.$vendor->id)}}"  enctype ='multipart/form-data')>  
    @csrf
  <div class = "area">
    <div><label class="control-label">First Name :</label></div>
    <div><input type="text" class="fields" name='first_name' value='{{ $vendor->first_name}}' disabled placeholder="Enter First Name" /></div>
  </div>

 <div class = "area">
    <div><label class="control-label">Middle Name :</label></div>
    <div><input type="text" class="fields" name='middle_name' value='{{ $vendor->middle_name}}' disabled placeholder="Enter Middle Name" /></div>
  </div>
   <div class = "area">
    <div><label class="control-label">Last Name :</label></div>
    <div><input type="text" class="fields" name='last_name' value='{{ $vendor->last_name}}' disabled placeholder="Enter Last Name" /></div>
  </div>

   <div class = "area">
    <div><label class="control-label">Email :</label></div>
    <div><input type="text" class="fields" name='email' value='{{ $vendor->email}}' disabled placeholder="Enter email" /></div>
  </div>

      <div class = "area">
    <div><label class="control-label">Organisation Name :</label></div>
    <div><input type="text" class="fields" name='org_name' value='{{ $vendor->org_name}}' disabled placeholder="Enter Organisation Name" /></div>
  </div>

     <div class = "area">
    <div><label class="control-label">Password :</label></div>
    <div><input type="password" class="fields" name='password' value='{{ $vendor->password}}' disabled placeholder="Enter Password" /></div>
  </div>

    <div class = "area">
    <div><label class="control-label">Address:</label></div>
    <div><textarea  id='address' rows="4" cols="50" name='address' class="fields" disabled>{{ $vendor->address}}</textarea></div>
  </div>
  
  <div class = "area">
    <div style = "position: relative;"><label class="control-label">Profile Image :
    <img  name="input_img" src="{{ URL('uploads/ProfileImage/'.$vendor->image_name)}}" style='height :200px;width:200px; position: absolute; height: 10vh; right:-100%' alt=''>
    </label>
    
      <div class="area" >
        <img  id="preview"  src="">
        <input  name="input_img" style = "position: absolute;" type="file" id="imageInput">
        </div>
  </div>
        </div>
<div></div>
<div style = "display: grid; grid-template-columns: 50% 50%;">  <div></div>  <div>   <button type="submit" class="btn btn-success save" id='savebtn' disabled >Save</button>                  </div> 
          <button  class="btn btn-info save" onclick="enableAll()">Edit</button>
          </div>
  </form>
    
  </div>
          
  
      


  
  
</div>


<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part--> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.toggle.buttons.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 
<script>
  $('.textarea_editor').wysihtml5();


</script>
</body>
</html>