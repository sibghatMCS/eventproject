<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>FALSE,
)); ?>
    

    
    
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'dropdown_a'); ?>
		<?php //echo $form->textField($model,'dropdown_a'); ?>
		<?php //echo $form->error($model,'dropdown_a'); ?>
            
            <?php 
                $list = CHtml::listData(DropdownA::model()->findAll(), 'id', 'name');
                echo $form->dropdownlist($model, 'dropdown_a', $list,array('class'=>'span5'));
                 ?>

	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'dropdown_b'); ?>
		<?php //echo $form->textField($model,'dropdown_b'); ?>
		<?php //echo $form->error($model,'dropdown_b'); ?>
            <?php 
                   $list = CHtml::listData(DropdownB::model()->findAll(), 'id', 'name');
                    echo $form->dropdownlist($model, 'dropdown_b', $list,array('class'=>'span5'));
                ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_no'); ?>
		<?php echo $form->textField($model,'mobile_no',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'mobile_no'); ?>
	</div>

	<div class="row">
		<?php
                
            //echo $form->labelEx($model,'qr_code'); ?>
            
		<?php echo $form->hiddenField($model,'qr_code',array('size'=>60,'maxlength'=>400)); ?>
		<?php //echo $form->error($model,'qr_code'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'key'); ?>
            
            
		<?php  
                echo $form->hiddenField($model,'key',array('size'=>60,'maxlength'=>400)); ?>
		<?php //echo $form->error($model,'key'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropdownlist($model,'status',array(1=>'Active',0=>'De-Active')); ?>
		<?php //echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->