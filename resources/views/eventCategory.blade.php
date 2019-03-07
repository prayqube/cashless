   @include('header')
   @include('left')
       <div id='content'>
         <div class="container-fluid">

    <div class="row-fluid">
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
      <div class="span12">
      <form class="form-horizontal" method="post" action="{{url('eventcategories/del')}}">
     
    </form>
			<button type="submit" class="add btn btn-success" style='float:right;'><a href="{{url('/eventcategories/add')}}">ADD</a></button>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sr.No </th>
                  <th>Event Category Name</th>
                  <th>Event Category Description(s)</th>
                    <th>Action</th>

                </tr>
              </thead>
              <tbody>
                <?php $n=1; ?>
                @foreach($event_categories as $cat)
                <tr class="gradeX">
                  <td id = "c_id">{{$n}}</td>
                  <td>{{ $cat['event_category'] }}</td>
                  <td>{{ $cat['category_description'] }}</td>
                  <td><button type="submit" class="add btn btn-success" ><a href="{{url('/eventcategories/edit/'.$cat['id'])}}">Edit</a></button></td>
                   <td><button type="submit" class="add btn btn-success" ><a href="{{url('/eventcategories/del/'.$cat['id'])}}">Delete</a></button></td>
                 

                </tr>
                <?php $n++; ?>
                  @endforeach


            </tbody>
            </table>
               
        </div>
      </div>
    </div>
  </div>
      </div>
      <script type="text/javascript">
        function check(){
   var boxes = document.getElementsByName("sr_no");
          var box1 = boxes.length;
          var categoryID= document.getElementById("c_id");
      var category = categoryID.length;
          for(var i = 0;i<box1||category; i++){
         if(boxes[i].checked){
              return(categoryID[i].innerHTML);
            }
            
          }


        

      </script>