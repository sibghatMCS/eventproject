<?php
/* @var $this DropdownAController */
/* @var $model DropdownA */

$this->breadcrumbs=array(
	'Dropdown As'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DropdownA', 'url'=>array('index')),
	array('label'=>'Create DropdownA', 'url'=>array('create')),
	array('label'=>'View DropdownA', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DropdownA', 'url'=>array('admin')),
);
?>

<h1>Update DropdownA <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>