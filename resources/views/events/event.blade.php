@include('header')
@include('left')
<style>
	.add{
		float: right;
		height: 100%!important;
		width: 80px!important
	}
</style>
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Event</a></div>
  </div>
<!--End-breadcrumbs-->
<div>
	 <div class="container-fluid">

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
			<a href="{{url('/event-create')}}"><button  class="add btn btn-success">ADD</button></a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
            	 <thead>
                <tr class="">
                	<th>ID</th>
					<th>Name</th>
					<th>Start date</th>
					<th>End date</th>
					<th>Venue</th>
					<th>Address</th>
					<th>City</th>
					<th>Action</th>
                </tr>
              </thead>
              <tbody>
			@foreach ($event_list as $event) 
			<tr  class="gradeX">
				<td>{{ $event->id }}</td>
				<td>{{ $event->name }}</td>
				<td>{{ $event->event_start_date }}</td>
				<td>{{ $event->event_end_date }}</td>
				<td>{{ $event->venue }}</td>
				<td>{{ $event->address }}</td>
				<td>{{ $event->city }}</td>
				<td><a href="{{url('event/view/'.$event->id)}}" class="btn btn-small">View</a> <a href="{{url('event/edit/'.$event->id)}}" class="btn btn-small">Edit</a><a onclick="return confirm('Are you sure?')" href="{{url('event/delete/'.$event->id)}}" class="btn btn-small">Delete</a></td>
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
