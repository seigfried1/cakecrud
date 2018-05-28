<h1>Registration Form</h1>
<?php echo $this->Html->css('bootstrap.min.css');?>

<?php
echo $this->Flash->render();
echo $this->Form->create();
echo $this->Form->input('name',['label'=>'Enter your name', 'class'=>'form-control']);
echo $this->Form->input('password');
echo $this->Form->input('description');
echo $this->Form->Button('Save');
echo $this->Form->end();

?>