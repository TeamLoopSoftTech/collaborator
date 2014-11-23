@extends('layout.main')

@section('content')

 <form role="form" action="{{URL::route('post-bid-item')}}" method="post" id="form1">
      {{Form::token()}}
      <label class="control-label lato" for="search">Enter Item Name</label>
      <div class="input-group">
      <input type="text" class="form-control input-sm" id="search" placeholder="Enter Item Name" name="search">
      <span class="input-group-btn">
      <button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-search"></span></button>
      </span>
      </div>                      
                                               
 </form>
<div id="div"></div>
<hr/>
<table class="table table-bordered tablesorter" id="table">

@include('ajax.bid_item')

</table>
<?php //echo $total_pages;?>
<nav>
  <ul class="pager">
  	<?php if(($page - 1) <= $total_pages && $page !=1): ?>

		<li class="previous"><a href="{{URL::route('bid-item',$page -1)}}"><span aria-hidden="true">&larr;</span> previous</a></li>

	<?php endif; ?>
 
	<?php if(($page + 1) <= $total_pages): ?>

	  
	     <li class="next"><a href="{{URL::route('bid-item',$page +1)}}">next <span aria-hidden="true">&rarr;</span></a></li>
	<?php endif; ?>

 
  </ul>
</nav>

<?=HTML::script('asset/js/json2.js')?>
<?=HTML::script('asset/js/s9.js')?>
<?=HTML::script('asset/js/bid_item_search.js')?>

@stop