
@include('header')
@include('left')
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">

    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Event Item List</a></div>
    
  </div>
<!--End-breadcrumbs-->
<div>
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
              <button type="submit" class="add btn btn-success" style='float:right'><a href="{{url('/eventitems/add')}}">Add</a></button>

	            <table class="table table-bordered data-table">
		<thead >
			<tr >
				<th >S. No</th>
				<th>Event Id</th>
				<th>Event Name</th>
				<th>Item Count</th>
				
			</tr>
		</thead>
		<tbody>
			<?php $n=1; ?>
			@foreach ($items as $item) 
			<tr>
				<td>{{ $n }} </td>
				<td>{{ $item->event_id }}</td>
				<td>{{ $item->name}}</td>
				<td>{{ $item->total }}</td>
				<td>
				<button type="submit" class="add btn btn-success" '><a href="{{url('/eventitems/edit/'.$item->event_id)}}">Edit</a></button>


    </td>
					
			</tr>
			<?php $n++; ?>
			@endforeach
		</tbody>
	</table>

</div>
<!--Action boxes-->

  </div>
<!--end-main-container-part-->

<!--Footer-part-->

@include('footer')
