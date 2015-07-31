<?php
/* @var $this ConductorController */
/* @var $model Conductor */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdConductor'); ?>
		<?php echo $form->textField($model,'IdConductor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NumeroDocumento'); ?>
		<?php echo $form->textField($model,'NumeroDocumento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PrimerNombre'); ?>
		<?php echo $form->textField($model,'PrimerNombre',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SegundoNombre'); ?>
		<?php echo $form->textField($model,'SegundoNombre',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PrimerApellido'); ?>
		<?php echo $form->textField($model,'PrimerApellido',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SegundoApellido'); ?>
		<?php echo $form->textField($model,'SegundoApellido',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EmailConductor'); ?>
		<?php echo $form->textField($model,'EmailConductor',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Telefono1'); ?>
		<?php echo $form->textField($model,'Telefono1',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Telefono2'); ?>
		<?php echo $form->textField($model,'Telefono2',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdEstadoRegistro'); ?>
		<?php echo $form->textField($model,'IdEstadoRegistro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdUsuarioGraba'); ?>
		<?php echo $form->textField($model,'IdUsuarioGraba'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaGraba'); ?>
		<?php echo $form->textField($model,'FechaGraba'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdUsuarioModifica'); ?>
		<?php echo $form->textField($model,'IdUsuarioModifica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaModifica'); ?>
		<?php echo $form->textField($model,'FechaModifica'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->