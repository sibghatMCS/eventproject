<?php
/* @var $this DropdownAController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dropdown As',
);

$this->menu=array(
	array('label'=>'Create DropdownA', 'url'=>array('create')),
	array('label'=>'Manage DropdownA', 'url'=>array('admin')),
);
?>

<h1>Dropdown As</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
