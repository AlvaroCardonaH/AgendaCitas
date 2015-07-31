<?php
/* @var $this AgendaCitasCediController */
/* @var $model AgendaCitasCedi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'agenda-citas-cedi-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'IdMuelle'); ?>
		<?php echo $form->textField($model,'IdMuelle'); ?>
		<?php echo $form->error($model,'IdMuelle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TituloEvento'); ?>
		<?php echo $form->textField($model,'TituloEvento',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'TituloEvento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FechaInicio'); ?>
		<?php echo $form->textField($model,'FechaInicio'); ?>
		<?php echo $form->error($model,'FechaInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FechaFinal'); ?>
		<?php echo $form->textField($model,'FechaFinal'); ?>
		<?php echo $form->error($model,'FechaFinal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ObservacionesEvento'); ?>
		<?php echo $form->textField($model,'ObservacionesEvento',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ObservacionesEvento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdusuarioGraba'); ?>
		<?php echo $form->textField($model,'IdusuarioGraba'); ?>
		<?php echo $form->error($model,'IdusuarioGraba'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FechaGraba'); ?>
		<?php echo $form->textField($model,'FechaGraba'); ?>
		<?php echo $form->error($model,'FechaGraba'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdUsuarioModifica'); ?>
		<?php echo $form->textField($model,'IdUsuarioModifica'); ?>
		<?php echo $form->error($model,'IdUsuarioModifica'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FechaModifica'); ?>
		<?php echo $form->textField($model,'FechaModifica'); ?>
		<?php echo $form->error($model,'FechaModifica'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->