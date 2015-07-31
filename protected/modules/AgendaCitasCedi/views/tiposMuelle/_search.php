<?php
/* @var $this TiposMuelleController */
/* @var $model TiposMuelle */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdTipoMuelle'); ?>
		<?php echo $form->textField($model,'IdTipoMuelle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NombreTipoMuelle'); ?>
		<?php echo $form->textField($model,'NombreTipoMuelle',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ObservacionesTipoMuelle'); ?>
		<?php echo $form->textField($model,'ObservacionesTipoMuelle',array('size'=>60,'maxlength'=>255)); ?>
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
		<?php echo $form->textField($model,'FechaModifica',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->