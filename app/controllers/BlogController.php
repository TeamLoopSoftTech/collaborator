<?php
class BlogController extends BaseController
{
/**
* Posts
*
* @return void
*/
public function showPosts()
{
$posts = Post::paginate(3);
if (Request::ajax()) {
return Response::json(View::make('posts', array('posts' => $posts))->render());
}
return View::make('blog', array('posts' => $posts));
}
} 