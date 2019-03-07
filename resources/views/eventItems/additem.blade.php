@include('header')
@include('left')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><label class="control-label">Item Name:</label><input type="text" name="item_name[]" value=""/>      <label class="control-label">Item Price:</label><input type="text" name="item_price[]" value=""/><a href="javascript:void(0);" class="remove_button">Remove Item</a></div>'; 
  //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
<div id="content">
  <div id="content-header">
    <h1>Event Items </h1>
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
  <form class = "form1" method='post' action="{{url('/eventitems/add')}}"  enctype ='multipart/form-data')>  
    @csrf
  <div class = "area">
    <div><label class="control-label">Select Event :</label></div>
    <div><select class="eventitems" name="event" >
                  <option></option>
                        @foreach($eventlist as $event)
                          <option value="{{$event->id}}">{{$event->name}}</option>
                        @endforeach
                </select>
  </div>
</div>

    
   <div class = "area" >
<div class="field_wrapper">
    <div>
      <label class="control-label">Item Name:</label>
        <input type="text" name="item_name[]" value=""/>
        <label class="control-label">Item Price:</label>

        <input type="text" name="item_price[]" value=""/>

        <a href="javascript:void(0);" class="add_button" title="Add field">Add Item</a>
    </div>
</div>
</div>
   <div class = "area" >

    <button type="submit" class="btn btn-success save" id='savebtn'  >Save</button>                  
</div>

  </form>    
  </div>

  </form>


  
  
</div>
