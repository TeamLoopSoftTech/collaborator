
 <table>
@foreach ($posts as $post)

<tr>
<td>{{ $post->MerchName }}</td>
<td>{{ $post->MerchantCode }}</td>
<td>{{ $post->EnrollDate }}</td>
<td>{{ $post->TIN }}</td>
<td>{{ $post->MotherAcc }}</td>
<td>{{ $post->ClearingAcc }}</td>
<td>{{ $post->Address }}</td>
<td>{{ $post->lbpsb }}</td>

</tr> 
@endforeach
 </table>
{{ $posts->links() }} 
<pre>
<?php 

//print_r($posts);

?>