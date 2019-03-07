@include('header')
@include('left')
<!--main-container-part-->
<style>
@media screen and (max-width:2000px){
	.form1{
		padding-top: 20px;
		width: 80%;
		display: grid;
		grid-template-columns: repeat(2, 50%);
		grid-auto-flow: row;
		grid-gap: 30px;
		margin-left: 30px;
	}
	.area{
		display: grid;
		grid-template-columns: 30% 70%;
	}
	.fields{
		width: 90%;
		align: center;
	
	}

	.button{
		width: 200px;
		
		align: center;
		display: inline-block;
		border: 0px;
	}
	.a{
		color: white;
	}
	.edit{
		float: right;
		height: 100%;
		width: 80px;
	}
	
	.save{
		margin-left: 76.3%;
		width: 7%;
		line-height: 25px;
		
		margin-top:30px;
	}

	}


</style>
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
	      	<div class="widget-box" style="">
		        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
		          <h5>Edit-Event</h5>
		          <a href="{{url('/event')}}"><button type="submit" class="btn btn-success edit">Back</button></a>
		        </div>
		    </div>
	        	
					<form class="form1" method="post" action="{{url('event-update')}}" enctype="multipart/form-data">
						@csrf
				        <div class="area">
				            <label class="control-label">Name</label>
				            <div class="">
				            	<input type="hidden" name="id" class="span5" value="{{ $event_list->id }}" 	 />
				                <input type="text" name="name" class="form-control" value="{{ $event_list->name }}" />
				            </div>
				        </div>

				        <div class="area">
				            <label class="control-label">Event Type</label>
				            <div class="">
				            	<select name="event_type" class="form-control">
				            		<option>Event Type</option>
				            		@foreach($event_category as $category)
				            			@if($category->id == $event_list->event_type)
				            			<option selected="selected" value="{{$category->id}}">{{$category->event_category}}</option>
				            			@else
				            			<option value="{{$category->id}}">{{$category->event_category}}</option>
				            			@endif
				            		@endforeach
				            	</select>
				            </div>
				        </div>
				        <div class = "area">
							<div><label class="control-label">Address:</label></div>
							<div><textarea rows="4" cols="50" class="form-control" name="address">{{ $event_list->address }}</textarea></div>
						</div>
						<div class = "area">
							<div><label class="control-label">Description :</label></div>
							<div><textarea rows="4" cols="50" class="form-control" name="description">{{ $event_list->description }}</textarea></div>
						</div>

						<div class = "area ">
							<div><label class="control-label">Start Date (D-M-Y)</label></div>
							<div><!-- <input type="text" value="12-02-2012"  data-date-format="dd-mm-yyyy H:i:s" name="event_start_date" class="form-control datepicker" > -->
								<div class='input-group date' id='datetimepicker6'>
					                <input type='text'  name="event_start_date" class="form-control" value="{{ date('m/d/Y h:i a', $event_list->event_start_date) }}" />
					                <span class="input-group-addon">
					                    <span class="glyphicon glyphicon-calendar"></span>
					                </span>
					            </div>
					        </div>
						</div>
						<div class = "area">
							<div><label class="control-label">End Date (D-M-Y)</label></div>
							<div><!-- <input type="text" value="12-02-2012"  data-date-format="dd-mm-yyyy H:i:s" name="event_end_date" class="form-control datepicker" > -->
								<div class='input-group date' id='datetimepicker7'>
					                <input type='text' class="form-control" name="event_end_date"  value="{{ date('m/d/Y h:i a', $event_list->event_end_date) }}" />
					                <span class="input-group-addon">
					                    <span class="glyphicon glyphicon-calendar"></span>
					                </span>
					            </div>
					        </div>
						</div>


				        <div class="area">
				            <label class="control-label">Event Duration</label>
				            <div class="">
				                <input type="time" name="event_duration" class="form-control" value="{{ $event_list->event_duration }}"	step="2" />
				            </div>
				        </div>
				        <div class="area">
				            <label class="control-label">Venue</label>
				            <div class="">
				                <input type="text" name="venue" class="form-control" value="{{ $event_list->venue }}" />
				            </div>
				        </div>
				        <div class="area">
				            <label class="control-label">City</label>
				            <div class="">
				                <input type="text" name="city" class="form-control" value="{{ $event_list->city }}"	 />
				            </div>
				        </div>
				        <div class="area">
				            <label class="control-label">State</label>
				            <div class="">
				                <input type="text" name="state" class="form-control" value="{{ $event_list->state }}"	 />
				            </div>
				        </div>
				        <div class="area">
				            <label class="control-label">Pincode</label>
				            <div class="">
				                <input type="number" name="pincode" class="form-control" value="{{ $event_list->pincode }}"	 />
				            </div>
				        </div>
				        <div class="area">
				            <label class="control-label">Fee</label>
				            <div class="">
				                <input type="number" name="fee" class="form-control" value="{{ $event_list->fee }}"	 />
				            </div>
				        </div>
				        <div class="area">
				            <label class="control-label">Head Count</label>
				            <div class="">
				                <input type="number" name="head_count" class="form-control" value="{{ $event_list->head_count }}"	 />
				            </div>
				        </div>
				       
				        <div class="area">
				            <label class="control-label">Attachment</label>
				            <div class="">
							    <input name="image[]" class="image" onchange="upload_attachment('{{count($event_attachment)}}')" type="file"  multiple="multiple" accept="image/jpg/png, image/jpeg/png" >
							</div>
				        </div>
				        <div class="area">
				            <label class="control-label"></label>
				            <div class="">
				            	@foreach($event_attachment as $file)
				            	
				            	<img class="edit_file" width="50px" height="50px" src="{{asset('events')}}/{{$file->file_name}}">
							    
							    <a onclick="return confirm('Are you sure?')" href="{{url('event/deleteImage/'.$file->id)}}" class="btn btn-small">Remove</a>
							    @endforeach
							</div>
				        </div>
			            </div>

					    <button type="submit" class="btn btn-success save">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<!--end-main-container-part-->

<!--Footer-part-->

@include('footer')
