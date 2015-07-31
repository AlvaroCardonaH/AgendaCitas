<?php
/* @var $this FechasBloqueadasController */
/* @var $model FechasBloqueadas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdFechaBloqueada'); ?>
		<?php echo $form->textField($model,'IdFechaBloqueada'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha'); ?>
		<?php echo $form->textField($model,'Fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HoraInicio'); ?>
		<?php echo $form->textField($model,'HoraInicio',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HoraFinal'); ?>
		<?php echo $form->textField($model,'HoraFinal',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdMotivoBloqueo'); ?>
		<?php echo $form->textField($model,'IdMotivoBloqueo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ObservacionesBloqueo'); ?>
		<?php echo $form->textField($model,'ObservacionesBloqueo',array('size'=>60,'maxlength'=>255)); ?>
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