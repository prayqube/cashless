<link href="css/addons/datatables-select.min.css" rel="stylesheet">
<!-- DataTables Select CSS -->
<script href="css/addons/datatables-select.min.js" rel="stylesheet"></script>
@include('header')
@include('left')
<style type="text/css">
	.table-striped th{
		font-size: 20px;
		font-weight: bold;
		padding: 5px;
	}
	td{
		font-size: 18px;
	}
</style>
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">

    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Vendors List</a></div>
    
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
              <button type="submit" class="add btn btn-success" style='float:right'><a href="{{url('/vendors/add')}}">Add</a></button>

	            <table class="table table-striped table-bordered">
		<thead >
			<tr> </tr>
			<tr >
				<th >S. No</th>
				<th>Name</th>
				<th>Organisation Name</th>
				<th>Image</th>
				<th>Status</th>
				<th>Address</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $n=1;?>
			@foreach ($vendors as $vendor) 
			<tr>
				<td>{{$n++}}</td>
				<td>{{ $vendor->first_name , $vendor->middle_name , $vendor->last_name}}</td>
				<td>{{ $vendor->org_name }}</td>
				<td><img src='{{url('/uploads/ProfileImage/'.$vendor->image_name)}}' style='height:5vh ;width:100px'></td>
				<td>{{ $vendor->status }}</td>
				<td>{{ $vendor->address }}</td>
				<td><button type="submit" class="add btn btn-success" '><a href="{{url('/vendors/view/'.$vendor->id)}}">View</a></button>
				<button type="submit" class="add btn btn-success" '><a href="{{url('/vendors/update/'.$vendor->id)}}">Edit</a></button>

				<button type="submit" class="add btn btn-success" '><a href="{{url('/vendors/delete/'.$vendor->id)}}">Delete</a></button>
				<button type="submit" class="add btn btn-success" '><a href="{{url('/vendors/approve/'.$vendor->id)}}">Approve</a></button>

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
