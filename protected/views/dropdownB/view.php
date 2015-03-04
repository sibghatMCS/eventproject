<?php
/* @var $this DropdownBController */
/* @var $model DropdownB */

$this->breadcrumbs=array(
	'Dropdown Bs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List DropdownB', 'url'=>array('index')),
	array('label'=>'Create DropdownB', 'url'=>array('create')),
	array('label'=>'Update DropdownB', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DropdownB', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DropdownB', 'url'=>array('admin')),
);
?>

<h1>View DropdownB #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
