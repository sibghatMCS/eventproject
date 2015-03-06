<?php
/* @var $this DropdownBController */
/* @var $model DropdownB */

$this->breadcrumbs=array(
	'Dropdown Bs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DropdownB', 'url'=>array('index')),
	array('label'=>'Create DropdownB', 'url'=>array('create')),
	array('label'=>'View DropdownB', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DropdownB', 'url'=>array('admin')),
);
?>

<h1>Update DropdownB <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>