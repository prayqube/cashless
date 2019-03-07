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
		<tbody>
			<tr>
				<th>Name :</th>
				<td>{{ $event_list->name }}</td>
				
			</tr>
			<tr>
				<th>Description :</th>
				<td>{{ $event_list->description }}</td>
			</tr>
			<tr>
				<th>Start date</th>
				<td>{{ $event_list->event_start_date }}</td>
				
			</tr>
			<tr>
				<th>End date</th>
				<td>{{ $event_list->event_end_date }}</td>
				
			</tr>
			<tr>
				<th>Duration</th>
				<td>{{ $event_list->event_duration }}</td>
				
			</tr>
			<tr>
				<th>Venue</th>
				<td>{{ $event_list->venue }}</td>
			</tr>
			<tr>
				<th>Address</th>
				<td>{{ $event_list->event_duration }}</td>
				
			</tr>
			<tr>
				<th>City</th>
				<td>{{ $event_list->city }}</td>
			</tr>
			<tr>	
				<th>State</th>
				<td>{{ $event_list->state }}</td>
				
			</tr>
			<tr>	
				<th>Pin code</th>
				<td>{{ $event_list->pincode }}</td>
			</tr>
			<tr>	
				<th>Fee</th>
				<td>{{ $event_list->fee }}</td>
				
			</tr>
			<tr>	
				<th>Head count</th>
				<td>{{ $event_list->head_count }}</td>
			</tr>
			<tr>	
				<th>Event Type</th>
				<td>{{ $event_list->event_type }}</td>
				
			</tr>
			<tr>	
				<th>Date</th>
				<td>{{ $event_list->created_at->format('d M Y') }}</td>
			</tr>
			<tr>	
				<th>QR code</th>
				<td>{{ $event_list->qr_code }}</td>
			</tr>
		</tbody>
	</table>

</div>
<!--Action boxes-->

  </div>
<!--end-main-container-part-->

<!--Footer-part-->

@include('footer')
