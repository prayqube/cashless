@include('header')
@include('left')
<script>
 function  enableAll()
  {
   var inputs = document.getElementsByTagName("input"); 
document.getElementById("savebtn").disabled = false;
document.getElementById("address").disabled = false;
document.getElementById("vendorparent").disabled = false;
  for(var i = 0; i<= inputs.length; i++)
    {inputs[i].disabled=false;}
        
        };
        
    
</script>


<div id="content">
  <div id="content-header">
   
    <h1>Supplier Profile</h1>
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

  <form class = "form1" method='post' action="{{url('/suppliers/update/'.$supplier->id)}}"  enctype ='multipart/form-data')>  
    @csrf
  <div class = "area">
    <div><label class="control-label">First Name :</label></div>
    <div><input type="text" class="fields" name='first_name' value='{{ $supplier->first_name}}' disabled placeholder="Enter First Name" /></div>
  </div>

 <div class = "area">
    <div><label class="control-label">Middle Name :</label></div>
    <div><input type="text" class="fields" name='middle_name' value='{{ $supplier->middle_name}}' disabled placeholder="Enter Middle Name" /></div>
  </div>
   <div class = "area">
    <div><label class="control-label">Last Name :</label></div>
    <div><input type="text" class="fields" name='last_name' value='{{ $supplier->last_name}}' disabled placeholder="Enter Last Name" /></div>
  </div>

   <div class = "area">
    <div><label class="control-label">Email :</label></div>
    <div><input type="text" class="fields" name='email' value='{{ $supplier->email}}' disabled placeholder="Enter email" /></div>
  </div>
   <div class = "area">
    <div><label class="control-label">Contact No :</label></div>
    <div><input type="text" class="fields" name='contact_no' value='{{ $supplier->contact_no}}'  placeholder="Enter No" /></div>
  </div>

      <div class = "area">
    <div><label class="control-label">Organisation Name :</label></div>
    <div><input type="text" class="fields" name='org_name' value='{{ $supplier->org_name}}' disabled placeholder="Enter Organisation Name" /></div>
  </div>

   <div class = "area">
    <div><label class="control-label">Assigned Vendor</label></div>
    <div><select class="eventitems" name="parent_vendor" id="vendorparent" disabled>
                  <option value='{{$supplier->parent_id}}'>{{ $supplier->parentname}}</option>
                        @foreach($users as $user)
                          <option value='{{$user->id}}'>{{$user->first_name ,$user->middle_name,$user->last_name}}</option>
                        @endforeach
                </select>
  </div>
</div>

     <div class = "area">
    <div><label class="control-label">Password :</label></div>
    <div><input type="password" class="fields" name='password' value='{{ $supplier->password}}' disabled placeholder="Enter Password" /></div>
  </div>

    <div class = "area">
    <div><label class="control-label">Address:</label></div>
    <div><textarea  id='address' rows="4" cols="50" name='address' class="fields" disabled>{{ $supplier->address}}</textarea></div>
  </div>
  
        <div class="area" >
        <img  id="preview"  src="">
        </div>
          <button type="submit" class="btn btn-success save" id='savebtn' disabled >Save</button>                  

  </form>    

    <button  class="btn btn-info save" onclick="enableAll()">Edit</button>  
</div>

  
  
</div>
@include('footer')