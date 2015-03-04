<?php
/* @var $this DropdownAController */
/* @var $model DropdownA */

$this->breadcrumbs=array(
	'Dropdown As'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DropdownA', 'url'=>array('index')),
	array('label'=>'Manage DropdownA', 'url'=>array('admin')),
);
?>

<h1>Create DropdownA</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>