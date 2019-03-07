@include('header')
@include('left')
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
            {{ $input_error  }}<br>
            @endforeach 
          </div> 

          <?php endif; ?>
    
    
  </div>
  <div class="widget-title"> 

          </div>
  <form class = "form1" method='post' action="{{url('/vendors/add')}}"  enctype ='multipart/form-data')>  
    @csrf
  <div class = "area">
    <div><label class="control-label">First Name :</label></div>
    <div><input type="text" class="fields" name='first_name'   placeholder="Enter First Name" /></div>
  </div>

 <div class = "area">
    <div><label class="control-label">Middle Name :</label></div>
    <div><input type="text" class="fields" name='middle_name'  placeholder="Enter Middle Name" /></div>
  </div>
   <div class = "area">
    <div><label class="control-label">Last Name :</label></div>
    <div><input type="text" class="fields" name='last_name'   placeholder="Enter Last Name" /></div>
  </div>

   <div class = "area">
    <div><label class="control-label">Email :</label></div>
    <div><input type="text" class="fields" name='email'  placeholder="Enter email" /></div>
  </div>

    <div class = "area">
    <div><label class="control-label">Contact No :</label></div>
    <div><input type="text" class="fields" name='contact_no'  placeholder="Enter Mobile Number" /></div>
  </div>


      <div class = "area">
    <div><label class="control-label">Organisation Name :</label></div>
    <div><input type="text" class="fields" name='org_name'  placeholder="Enter Organisation Name" /></div>
  </div>

     <div class = "area">
    <div><label class="control-label">Password :</label></div>
    <div><input type="password" class="fields" name='password'  placeholder="Enter Password" /></div>
  </div>

    <div class = "area">
    <div><label class="control-label">Address:</label></div>
    <div><textarea  id='address' rows="4" cols="50" name='address' class="fields" ></textarea></div>
  </div>
  
  <div class = "area">
    <div><label class="control-label">Profile Image :
    <img  name="input_img" src="" style='height :200px;width:200px' alt=''>

    </label>
    <input  name="input_img" type="file" id="imageInput">

  </div>
        

        <div class="area" >
        <img  id="preview"  src="">
        </div>
          <button type="submit" class="btn btn-success save" id='savebtn'  >Save</button>                  

  </form>    
  </div>

  </form>


  
  
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