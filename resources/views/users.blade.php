@include('header')
	<div id="content">
		<table class="table table-striped table-hover" id="siswa-table">
				<thead>
					<th>id</th>
					<th>first_name</th>
					<th>last_name</th>
					<th>email</th>
				</thead>
				<tbody>
				 <tr>
				 	<th>{{ $user['id'] }}</th>
				 	<th>{{ $user['first_name'] }}</th>
				 	<th>{{ $user['last_name'] }}</th>
				 </tr>
				</tbody>
			
		</table>
	</div>