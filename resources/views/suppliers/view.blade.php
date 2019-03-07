@include('header')
@include('left')
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">

    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Suppliers List</a></div>
    
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
              <button type="submit" class="add btn btn-success" style='float:right'><a href="{{url('/suppliers/add')}}">Add</a></button>

	            <table class="table table-bordered data-table">
		<thead >
			<tr >
				<th >S. No</th>
				<th>Name</th>
				<th>Organisation Name</th>
				<th>Status</th>
				<th>Address</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $n=0; ?>
			@foreach ($suppliers as $supplier) 
			<tr>
				<td>{{ ++$n }}</td>
				<td>{{ $supplier->first_name , $supplier->middle_name , $supplier->last_name}}</td>
				<td>{{ $supplier->org_name }}</td>
				<td>{{ $supplier->status }}</td>
				<td>{{ $supplier->address }}</td>
				<td><button type="submit" class="add btn btn-success" '><a href="{{url('/suppliers/view/'.$supplier->id)}}">View</a></button>

				<button type="submit" class="add btn btn-success" '><a href="{{url('/suppliers/delete/'.$supplier->id)}}">Deactivate</a></button>
				<button type="submit" class="add btn btn-success" '><a href="{{url('/suppliers/approve/'.$supplier->id)}}">Activate</a></button>

    </td>
					
			</tr>
			@endforeach
		</tbody>
	</table>

</div>
<!--Action boxes-->

  </div>
<!--end-main-container-part-->

<!--Footer-part-->

@include('footer')
