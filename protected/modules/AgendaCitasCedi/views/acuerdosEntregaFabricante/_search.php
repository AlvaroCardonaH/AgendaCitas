<?php
/* @var $this ConfiguracionEntregasProveedorCediController */
/* @var $model ConfiguracionEntregasProveedorCedi */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdConfiguracion'); ?>
		<?php echo $form->textField($model,'IdConfiguracion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdFabricante'); ?>
		<?php echo $form->textField($model,'IdFabricante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdCedi'); ?>
		<?php echo $form->textField($model,'IdCedi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdTipoEntrega'); ?>
		<?php echo $form->textField($model,'IdTipoEntrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ObservacionesConfiguracion'); ?>
		<?php echo $form->textField($model,'ObservacionesConfiguracion',array('size'=>60,'maxlength'=>255)); ?>
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