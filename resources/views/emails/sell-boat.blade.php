<!DOCTYPE html>
<html>
<head></head>
<body style='background: #ff7200; color: #FFF'>
<table width='600px' border='0'>
		<thead>
		<tr><th colspan='2'><img style='height:50px;' src='{{url(config('whyte.project.logo'))}}'><h4>{{config('whyte.project.name')}} Boat to Sell </h4></th></tr>
		</thead>
		<tbody>
			<tr><td>Name</td><td>{{$request->name or ''}}</td></tr>
			<tr><td>Email</td><td>{{$request->email or ''}}</td></tr>
			<tr><td>Phone</td><td>{{$request->phone or ''}}</td></tr>
			<tr><td>Yatch Makes & Model </td><td>{{$request->makes_n_model or ''}}</td></tr>
			<tr><td>Length</td><td>{{$request->length or ''}}</td></tr>
			<tr><td>Year</td><td>{{$request->year or ''}}</td></tr>
			<tr><td>Location</td><td>{{$request->location or ''}}</td></tr>
			<tr><td>Condition</td><td>{{$request->condition or ''}}</td></tr>
			<tr><td>Remarks</td><td>{{$request->remarks or ''}}</td></tr>
		</tbody>
	</table>
</body>
</html>
