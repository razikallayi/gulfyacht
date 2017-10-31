<!DOCTYPE html>
<html>
<head></head>
<body style='background: white; color: #222'>
	<table width='600px' border='0'>
		<thead>
		<tr><th colspan='2' style='background:#3c2b2b;color:#FFF'><img style='height:50px;' src='{{url(config('whyte.project.logo'))}}'><h4>Career Enquiry from Gulf Avenue</h4></th></tr>
		</thead>
		<tbody>
			<tr><td>First Name</td><td>{{$request->fname}}</td></tr>
			<tr><td>Last Name</td><td>{{$request->lname}}</td></tr>
			<tr><td>Email</td><td>{{$request->email}}</td></tr>
			<tr><td>Phone</td><td>{{$request->phone}}</td></tr>
			
			<tr><td>Project Description</td><td>{{$request->description}}</td></tr>
			<tr><td>Resume </td><td>[Attached with Details]</td></tr>
		</tbody>
	</table>
</body>
</html>