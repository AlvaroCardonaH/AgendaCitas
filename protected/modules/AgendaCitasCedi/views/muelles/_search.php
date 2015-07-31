<?php
/* @var $this MuellesController */
/* @var $model Muelles */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdMuelle'); ?>
		<?php echo $form->textField($model,'IdMuelle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NombreMuelle'); ?>
		<?php echo $form->textField($model,'NombreMuelle',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ObservacionesMuelle'); ?>
		<?php echo $form->textField($model,'ObservacionesMuelle',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdCedi'); ?>
		<?php echo $form->textField($model,'IdCedi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdTipoFabricante'); ?>
		<?php echo $form->textField($model,'IdTipoFabricante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdTipoMuelle'); ?>
		<?php echo $form->textField($model,'IdTipoMuelle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdEstadoRegistro'); ?>
		<?php echo $form->textField($model,'IdEstadoRegistro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MinimoPiezas'); ?>
		<?php echo $form->textField($model,'MinimoPiezas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MaximoPiezas'); ?>
		<?php echo $form->textField($model,'MaximoPiezas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HoraAlmuerzo'); ?>
		<?php echo $form->textField($model,'HoraAlmuerzo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HoraRefrigerio'); ?>
		<?php echo $form->textField($model,'HoraRefrigerio',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProgamacionHorarioNormalSemana'); ?>
		<?php echo $form->textField($model,'ProgamacionHorarioNormalSemana'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProgramacionHorarioExtendidoSemana'); ?>
		<?php echo $form->textField($model,'ProgramacionHorarioExtendidoSemana'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProgramacionHorarioNormalSabado'); ?>
		<?php echo $form->textField($model,'ProgramacionHorarioNormalSabado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProgramacionHorarioExtendidoSabado'); ?>
		<?php echo $form->textField($model,'ProgramacionHorarioExtendidoSabado'); ?>
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