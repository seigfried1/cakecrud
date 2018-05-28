<h1>Profile</h1>

<?php foreach ($oneData as $word) {
	echo 'Id:';
	echo $word['id']. "<br/>";
	echo 'Name:';
	echo $word['name']. "<br/>";
	echo 'Password:';
	echo $word['password']. "<br/>";
	echo 'Description:';
	echo $word['description'];





	//echo 'Id:';
	//echo '<input type="text" value=' . $word['id']. '>';
	//echo 'User Name:';
	//echo '<input type="text" value=' . $word['name']. '>';
	//echo 'Password:';
	//echo '<input type="text" value=' . $word['password']. '>';
	//echo 'Description:';
	//echo '<input type="text" value=' . $word['description']. '>';
	
}?>