<h1>This is a template for showMe action</h1>
<table>
<th>Id</th>
<th>Name</th>
<th>Password</th>
<th>Description</th>

<?php foreach ($name as $word) {
	echo '<tr>';
	echo '<td>' . $word['id']. '</td>';
	echo '<td>' . $word['name']. '</td>';
	echo '<td>' . $word['password']. '</td>';
	echo '<td>' . $word['description']. '</td>';
	echo '<tr>';
	
}?>

</table>
