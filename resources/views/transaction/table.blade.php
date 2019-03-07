<!DOCTYPE html>
<html>
<body>
<table id='employee_grid' class="table table-bordered table-hover ">
 <?php $n=1; ?>
<thead>
<tr>
 <th>#</th>
<th>Transaction ID</th>
<th>Event Id</th>
<th>User Id</th>
<th>Amount</th>
<th>Transaction Type </th>
 <th>Transaction Reference No  </th>
<th>Bank Reference No</th>
<th>Status  </th>
<th>Date Created </th>
</tr>
 <tr class="filters skip-export">
 	<td></td>
 	<td> <input type="text" class="form-control" name="transaction_id"></td>
 	 	<td> <input type="text" class="form-control" name="event_id"></td>
 	 	<td> <input type="text" class="form-control" name="user_id"></td>
 	<td> <input type="text" class="form-control" name="amount"></td>
<td> <select class="form-control" name="transaction_type">
<option value=""></option>
<option value="1">Credit</option>
<option value="0">Debit</option>
</select>
</td>
 	<td> <input type="text" class="form-control" name="tran_reference_no"></td>
 	<td> <input type="text" class="form-control" name="bank_reference_no"></td>
 	 	<td> <select class="form-control" name="status">
<option value=""></option>
<option value="CANCELED">CANCELED</option>
<option value="COMPLETE">COMPLETE</option>
<option value="FAILED">FAILED</option>
<option value="PENDING">PENDING</option>
<option value="PROCESSING">PROCESSING</option>
</select></td>
 	<td> <input type="text" class="form-control" name="date_created"></td>

 	
 </tr>
			@if($transactions->count())
@foreach ($transactions as $transaction)
 <tr>
 	<td>{{$n }}</td>
 <td>{{ $transaction->transaction_id  }}</td>
  <td>{{ $transaction->event_id }}</td>
    <td>{{ $transaction->user_id }}</td>

 <td>{{$transaction->amount }}</td>
 <td>{{ $transaction->type }}</td>
 <td>{{ $transaction->transaction_ref_no }}</td>
 <td>{{ $transaction->bank_reference_no }}</td>
  <td>{{ $transaction->status }}</td>
 <td>{{ $transaction->created_at }}</td>
{{ $n++}}
</tr>
@endforeach
@else
<tr>
  <td></td>
<td colspan="9">Result not found.</td>
</tr>
@endif
</thead>
 
</tbody>
 
</table>
</body>
</html>