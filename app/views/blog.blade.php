<!doctype html>
<html lang="en">
<head>
 
<meta charset="utf-8">
 
<title>Laravel AJAX Pagination with JQuery</title>
   <link href="{{ URL::asset('asset/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
   <?=HTML::style('asset/public/bootstrap/css/bootstrap.min.css')?>
</head>
<body>
 <div class="jumbotron">
<h1>Posts</h1>
 
<div class="posts">
@include('posts')
</div>
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script>
$(window).on('hashchange', function() {
if (window.location.hash) {
var page = window.location.hash.replace('#', '');
if (page == Number.NaN || page <= 0) {
return false;
} else {
getPosts(page);
}
}
});
$(document).ready(function() {
$(document).on('click', '.pagination a', function (e) {
getPosts($(this).attr('href').split('page=')[1]);
e.preventDefault();
});
});
function getPosts(page) {
$.ajax({
url : '?page=' + page,
dataType: 'json',
}).done(function (data) {
$('.posts').html(data);
location.hash = page;
}).fail(function () {
alert('Posts could not be loaded.');
});
}
</script>
 <?=HTML::script('asset/bootstrap/js/bootstrap.min.js')?>
 </div>
</body>
</html> 