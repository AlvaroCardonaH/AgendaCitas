<?php
/* @var $this AgendaCitasCediController */
/* @var $model AgendaCitasCedi */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdEventoAgenda'); ?>
		<?php echo $form->textField($model,'IdEventoAgenda'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdMuelle'); ?>
		<?php echo $form->textField($model,'IdMuelle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TituloEvento'); ?>
		<?php echo $form->textField($model,'TituloEvento',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaInicio'); ?>
		<?php echo $form->textField($model,'FechaInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaFinal'); ?>
		<?php echo $form->textField($model,'FechaFinal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ObservacionesEvento'); ?>
		<?php echo $form->textField($model,'ObservacionesEvento',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdusuarioGraba'); ?>
		<?php echo $form->textField($model,'IdusuarioGraba'); ?>
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