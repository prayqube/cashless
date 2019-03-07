@include('header')
@include('left')
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Event</a></div>
  </div>
<!--End-breadcrumbs-->
<div>
	<table width="100%" cellspacing="0" cellpadding="0" style="content: ">
		<thead>
			<tr>
				<th>S. No</th>
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
			<tr>
				<td>{{ $event->id }}</td>
				<td>{{ $event->name }}</td>
				<td>{{ $event->event_start_date }}</td>
				<td>{{ $event->event_end_date }}</td>
				<td>{{ $event->venue }}</td>
				<td>{{ $event->address }}</td>
				<td>{{ $event->city }}</td>
				<td><a href="{{url('event/view/'.$event->id)}}">View</a> <a href="{{url('event/edit/'.$event->id)}}">Edit</a><a onclick="return confirm('Are you sure?')" href="{{url('event/delete/'.$event->id)}}">Delete</a></td>
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
