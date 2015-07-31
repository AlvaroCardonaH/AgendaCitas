<?php
/* @var $this OrdenesCompraCitasCediController */
/* @var $model OrdenesCompraCitasCedi */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'NumeroOrdenCompra'); ?>
		<?php echo $form->textField($model,'NumeroOrdenCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdFabricante'); ?>
		<?php echo $form->textField($model,'IdFabricante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NombreFabricante'); ?>
		<?php echo $form->textField($model,'NombreFabricante',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdCedi'); ?>
		<?php echo $form->textField($model,'IdCedi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NombreCedi'); ?>
		<?php echo $form->textField($model,'NombreCedi',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TotalOrdenCompra'); ?>
		<?php echo $form->textField($model,'TotalOrdenCompra',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdEstadoOrdenCompra'); ?>
		<?php echo $form->textField($model,'IdEstadoOrdenCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaTentativaEntrega'); ?>
		<?php echo $form->textField($model,'FechaTentativaEntrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaRegistroOrdenCompra'); ?>
		<?php echo $form->textField($model,'FechaRegistroOrdenCompra'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->