<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

@include('header')
@include('left')
 <div id='content'>

 
 
<div class="panel-body">

 	<select id="w00" class="form-control" name="per-page" style="width: 104px;border-radius: 4px;float: left;margin-right: 10px;"><option value="">Item Per Page</option><option value="10">10</option><option value="20" selected="">20</option><option value="50">50</option><option value="100">100</option><option value="200">200</option><option value="500">500</option><option value="all">all</option></select>
<form action ="{{url('transaction/export')}}" method='post'>
  @csrf
  <input type='hidden' name ='transactions'value="{{$transactions}}">
<button type='submit' class="btn btn-success">Export</button>
</form>
	 	<form action="{{url('transaction/search')}}" method='post' enctype="multipart/form-data">
    @csrf

    <input type='submit' class="btn btn-success" value ='Search' style='float:right'></input>
</br> 
@include('transaction.table',$transactions)
</form>
</div>
 
</div>
 


@include('footer')