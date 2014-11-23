<tr>
<th>_id </th>
<th>item_no </th>
<th>item_name </th>
<th>item_description </th>
<th>Item Info. </th>
</tr>
<?php
$ii = 0;
while($ii != $i)
{
	echo '<tr>
	<td>'.$result[$ii]['_id'].'</td>
	<td>'.$result[$ii]['line_item_id'].'</td>
	<td>'.$result[$ii]['item_name'].'</td>
	<td>'.$result[$ii]['item_description'].'</td>
	<td><a href="'.URL::route('bid-item-info',$result[$ii]['ref_id']).'">view info</a></td>
	</tr>';
	$ii++;
}
?>


