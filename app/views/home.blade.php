@extends('layout.main')
@section('content')
@if(Auth::check())

<h1>HELLO</h1>


<table class="table table-bordered">
<tr>
<th>Quantity</th>
<th>award_id</th>
<th>award_reason</th>
<th>proceed_date</th>
<th>line_item_id</th>
<th>item_description</th>
<th>unspsc_description</th>
</tr>
<?php
$ii = 0;
while($ii != $i)
{
	echo '<tr>
	<td>'.$a[$ii]['qty'].'</td>
	<td>'.$a[$ii]['award_id'].'</td>
	<td>'.$a[$ii]['award_reason'].'</td>
	<td>'.$a[$ii]['proceed_date'].'</td>
	<td>'.$a[$ii]['line_item_id'].'</td>
	<td>'.$a[$ii]['item_description'].'</td>
	<td>'.$a[$ii]['unspsc_description'].'</td>
	</tr>';
	$ii++;
}
?>
</table>
@else
<link href="{{ URL::asset('asset/css/style2.css') }}" rel="stylesheet">

<div id="bg">
		<center>
     	<div id="cont"  >
			<h2 id="txt"> Member Log In </h2><br/>

			<DIV id="bdy">
		
						
							<img class="img-responsive lg" src="/public/asset/images/philgeps_banner.jpg"  />
						
				<div id="login"  align="center" >
							<div id="frm">
									<form class="form-signin" role="form"  method="post">
										<h2 id="txt3" class="form-signin-heading" >Sign In</h2>
										<input type="text" placeholder="Username" class="textox " /><br/>
										<input type="text" placeholder="Password" class="textox txt1" /><br/><br/>
										<button class="btn btn-lg btn-primary btn-block " type="submit">Sign In</button>			 
										<input id="txt4" type="checkbox" value="remember-me" name="remember_me"> Remember me	 
									</form>
										<br/><br/>
							</div>
						</div>
			</DIV>
		</div>
		</center>
	
</div>



@endif
@stop