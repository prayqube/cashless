@include('header')
@include('left')
<!--main-container-part-->

<div id="content">
<!--breadcrumbs-->
	<div id="content-header">
		<div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Event</a></div>
	</div>
	<!--End-breadcrumbs-->
	<div class="row-fluid">
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
					
	    <div class="">
	      	<div class="widget-box" style="margin-top: 0px">
		        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
		          <h5>Personal-info</h5>
		        </div>
	        	<div class="widget-content nopadding">
					<form class="form-horizontal" method="post" action="{{url('event-update')}}">
						@csrf
				        <div class="control-group col-sm-6">
				            <label class="control-label">Name</label>
				            <div class="controls">
				            	<input type="hidden" name="id" class="span5" value="{{ $event_list->id }}" 	 />
				                <input type="text" name="name" class="span5" value="
				                {{ $event_list->name }}" 	 />
				            </div>
				        </div>

				        <div class="control-group col-sm-6">
				            <label class="control-label">Event Type</label>
				            <div class="controls">
				            	<select name="event_type" class="span5">
				            		<option>Event Type</option>
				            		@foreach($event_category as $category)
				            			@if($category->event_category == $event_list->event_type)
				            			<option selected="selected">{{$category->event_category}}</option>
				            			@else
				            			<option>{{$category->event_category}}</option>
				            			@endif
				            		@endforeach
				            	</select>
				            </div>
				        </div>
				        <div class="control-group col-sm-6">
				            <label class="control-label">Description</label>
				            <div class="controls">
				                <input type="text" name="description" class="span5" value="{{ $event_list->description }}" 	 />
				            </div>
				        </div>
				        <div class="control-group col-sm-6">
				            <label class="control-label">Event Start Date</label>
				            <div class="controls">
				                <input type="text" name="event_start_date" class="span5" value="{{ $event_list->event_start_date }}"	 />
				            </div>
				        </div>

				        <div class="control-group col-sm-6">
				            <label class="control-label">Event End Time</label>
				            <div class="controls">
				                <input type="text" name="event_end_date" class="span5" value="{{ $event_list->event_end_date }}" 	 />
				            </div>
				        </div>
				        <div class="control-group col-sm-6">
				            <label class="control-label">Event Duration</label>
				            <div class="controls">
				                <input type="text" name="event_duration" class="span5" value="{{ $event_list->event_duration }}"	 />
				            </div>
				        </div>
				        <div class="control-group col-sm-6">
				            <label class="control-label">Venue</label>
				            <div class="controls">
				                <input type="text" name="venue" class="span5"	value="{{ $event_list->venue }}" />
				            </div>
				        </div>
				        <div class="control-group col-sm-6">
				            <label class="control-label">Address</label>
				            <div class="controls">
				                <input type="text" name="address" class="span5"	value="{{ $event_list->address }}" />
				            </div>
				        </div>
				        <div class="control-group col-sm-6">
				            <label class="control-label">City</label>
				            <div class="controls">
				                <input type="text" name="city" class="span5" value="{{ $event_list->city }}"	 />
				            </div>
				        </div>
				        <div class="control-group col-sm-6">
				            <label class="control-label">State</label>
				            <div class="controls">
				                <input type="text" name="state" class="span5" value="{{ $event_list->state }}"	 />
				            </div>
				        </div>
				        <div class="control-group col-sm-6">
				            <label class="control-label">Pincode</label>
				            <div class="controls">
				                <input type="number" name="pincode" class="span5" value="{{ $event_list->pincode }}"	 />
				            </div>
				        </div>
				        <div class="control-group col-sm-6">
				            <label class="control-label">Fee</label>
				            <div class="controls">
				                <input type="number" name="fee" class="span5" value="{{ $event_list->fee }}"	 />
				            </div>
				        </div>
				        <div class="control-group col-sm-6">
				            <label class="control-label">Head Count</label>
				            <div class="controls">
				                <input type="number" name="head_count" class="span5" value="{{ $event_list->head_count }}"	 />
				            </div>
				        </div>
				        <div class="control-group col-sm-6">
				            <label class="control-label">QR Code</label>
				            <div class="controls">
				                <input type="text" readonly name="qr_code" class="span5"	value="{{substr(md5(mt_rand()), 0, 32)}}" />
				            </div>
				        </div>
					    <div class="form-actions">
			              <button type="submit" class="btn btn-success">Update</button>
			            </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<!--end-main-container-part-->

<!--Footer-part-->

@include('footer')
