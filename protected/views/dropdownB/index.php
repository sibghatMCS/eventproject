<?php
/* @var $this DropdownBController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dropdown Bs',
);

$this->menu=array(
	array('label'=>'Create DropdownB', 'url'=>array('create')),
	array('label'=>'Manage DropdownB', 'url'=>array('admin')),
);
?>

<h1>Dropdown Bs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
