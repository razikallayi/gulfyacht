<!DOCTYPE html>
<html>
<head></head>
<body style='background: #ff7200; color: #FFF'>
<table width='600px' border='0'>
		<thead>
		<tr style='background: #FFF; color: #ff7200'><th colspan='2'><img style='height:50px;' src='{{url(config('whyte.project.logo'))}}'><h4>Contact Enquiry from {{config('whyte.project.name')}} Website</h4></th></tr>
		</thead>
		<tbody>
			<tr><td>Name</td><td>{{$request->name}}</td></tr>
			<tr><td>Email</td><td>{{$request->email}}</td></tr>
			<tr><td>Phone</td><td>{{$request->phone}}</td></tr>
			<tr><td>Message</td><td>{{$request->message}}</td></tr>
		</tbody>
	</table>
</body>
</html>