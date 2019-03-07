@include('header')
@include('left')
<!--main-container-part-->

<div id="content">
<!--breadcrumbs-->

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
		          <h5>Category </h5>
		        </div>
	        	<div class="widget-content nopadding">
					<form class="form-horizontal" method="post" action="{{url('eventcategories/add')}}">
						@csrf
				        <div class="control-group col-sm-6">
				            <label class="control-label">Category Name</label>
				            <div class="controls">
				                <input type="text" name="event_category" class="span5"	 />
				            </div>
				        </div>
				        <div class="control-group col-sm-6">
				            <label class="control-label">Category Description</label>
				            <div class="controls">
				                <input type="text" name="category_description" class="span5"	 />
				            </div>
				        </div>

						<div class="form-actions">
			              <button type="submit" class="btn btn-success">Save</button>
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