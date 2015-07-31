<?php
/* @var $this SolicitudCitaEntregaMercanciaController */
/* @var $model SolicitudCitaEntregaMercancia */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdNumeroSolicitud'); ?>
		<?php echo $form->textField($model,'IdNumeroSolicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdTransportador'); ?>
		<?php echo $form->textField($model,'IdTransportador'); ?>
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
		<?php echo $form->label($model,'IdOrdenCompra'); ?>
		<?php echo $form->textField($model,'IdOrdenCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaRegistroOrdenCompra'); ?>
		<?php echo $form->textField($model,'FechaRegistroOrdenCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaTentativaEntrega'); ?>
		<?php echo $form->textField($model,'FechaTentativaEntrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TotalOrdenCompra'); ?>
		<?php echo $form->textField($model,'TotalOrdenCompra',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaSolicitudCita'); ?>
		<?php echo $form->textField($model,'FechaSolicitudCita'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HoraSolicitudCita'); ?>
		<?php echo $form->textField($model,'HoraSolicitudCita',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NumeroPiezas'); ?>
		<?php echo $form->textField($model,'NumeroPiezas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdConductor'); ?>
		<?php echo $form->textField($model,'IdConductor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ObservacionesSolicitudCita'); ?>
		<?php echo $form->textField($model,'ObservacionesSolicitudCita',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdEstadoSolicitudCita'); ?>
		<?php echo $form->textField($model,'IdEstadoSolicitudCita'); ?>
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