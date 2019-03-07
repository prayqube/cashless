@include('header')
@include('left')
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Event</a></div>
  </div>
<div class="container-fluid">
	<div class="row">
		<!-- Crypt::decrypt($event_list->qr_code) -->
		
		<div class="col-sm-7 col-lg-7" style="background: #fff; margin-left: 79px;">
			<div class="col-sm-6">Name ::</div>
			<div class="col-sm-6">{{ $event_list->name }}</div>
			<div class="col-sm-6">Description ::</div>
			<div class="col-sm-6">{{ $event_list->description }}</div>
			<div class="col-sm-6">Start date::</div>
			<div class="col-sm-6">{{ $event_list->event_start_date }}</div>
			<div class="col-sm-6">End date::</div>
			<div class="col-sm-6">{{ $event_list->event_end_date }}</div>
			<div class="col-sm-6">Duration::</div>
			<div class="col-sm-6">{{ $event_list->event_duration }}</div>
			<div class="col-sm-6">Venue::</div>
			<div class="col-sm-6">{{ $event_list->venue }}</div>
			<div class="col-sm-6">Address::</div>
			<div class="col-sm-6">{{ $event_list->event_duration }}</div>
			<div class="col-sm-6">City::</div>
			<div class="col-sm-6">{{ $event_list->city }}</div>
			<div class="col-sm-6">State::</div>
			<div class="col-sm-6">{{ $event_list->state }}</div>
			<div class="col-sm-6">Pin code::</div>
			<div class="col-sm-6">{{ $event_list->pincode }}</div>
			<div class="col-sm-6">Fee::</div>
			<div class="col-sm-6">{{ $event_list->fee }}</div>
			<div class="col-sm-6">Head count::</div>
			<div class="col-sm-6">{{ $event_list->head_count }}</div>
			<div class="col-sm-6">Event Type::</div>
			<div class="col-sm-6">{{ $event_list->event_type }}</div>
			<div class="col-sm-6">Date::</div>
			<div class="col-sm-6">{{ $event_list->created_at->format('d M Y') }}</div>
			<div class="col-sm-6">Attachment::</div>
			<div class="col-sm-6">
				@foreach($event_list->event_attechment as $file)
				<img width="100px" height="100px" src="{{asset('events') }}/{{$file->file_name}}">
				<a onclick="return confirm('Are you sure?')" href="{{url('event/deleteImage/'.$file->id)}}" class="btn btn-small">Remove</a>
				@endforeach
			</div>
		</div>
	</div>
</div>
</div>
@include('footer')
