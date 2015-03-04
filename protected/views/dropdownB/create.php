<?php
/* @var $this DropdownBController */
/* @var $model DropdownB */

$this->breadcrumbs=array(
	'Dropdown Bs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DropdownB', 'url'=>array('index')),
	array('label'=>'Manage DropdownB', 'url'=>array('admin')),
);
?>

<h1>Create DropdownB</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>