<h1>List of users</h1>
<?php 
echo $this->Flash->render();
echo $this->Html->link('Add new user',['action'=>'registration']);
 ?>
<table class="table">
<th>Id</th>
<th>Name</th>
<th>Password</th>
<th>Description</th>
<?php
	foreach($allData as $one){
		echo '<tr>';
		echo '<td>'.$one['id'].'</td>';
		echo '<td>'.$one['name'].'</td>';
		echo '<td>'.$one['password'].'</td>';
		echo '<td>'.$one['description'].'</td>';
		echo '<td>'.$this->Html->link('View', ['controller'=>'Users','action'=>'profile', $one['id']]) . '</td>';
		echo '<td>'.$this->Html->link('Delete', ['controller'=>'Users','action'=>'del', $one['id']]) . '</td>';
		echo '<td>'.$this->Html->link('Update', ['controller'=>'Users','action'=>'updateData', $one['id']]) . '</td>';
		echo '</tr>';

	}


?>
</table>