<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdUsuario'); ?>
		<?php echo $form->textField($model,'IdUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Login'); ?>
		<?php echo $form->textField($model,'Login',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Contrasena'); ?>
		<?php echo $form->textField($model,'Contrasena',array('size'=>60,'maxlength'=>255)); ?>
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
		<?php echo $form->label($model,'EmailUsuario'); ?>
		<?php echo $form->textField($model,'EmailUsuario',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdRol'); ?>
		<?php echo $form->textField($model,'IdRol'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdFabricante'); ?>
		<?php echo $form->textField($model,'IdFabricante'); ?>
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