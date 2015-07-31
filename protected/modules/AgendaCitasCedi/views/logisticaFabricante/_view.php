<?php
/* @var $this LogisticaFabricanteController */
/* @var $data LogisticaFabricante */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdLogisticaFabricante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdLogisticaFabricante), array('view', 'id'=>$data->IdLogisticaFabricante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdFabricante')); ?>:</b>
	<?php echo CHtml::encode($data->IdFabricante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCedi')); ?>:</b>
	<?php echo CHtml::encode($data->IdCedi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdTransportador')); ?>:</b>
	<?php echo CHtml::encode($data->IdTransportador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ObservacionesLogistica')); ?>:</b>
	<?php echo CHtml::encode($data->ObservacionesLogistica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdUsuarioGraba')); ?>:</b>
	<?php echo CHtml::encode($data->IdUsuarioGraba); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaGraba')); ?>:</b>
	<?php echo CHtml::encode($data->FechaGraba); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('IdUsuarioModifica')); ?>:</b>
	<?php echo CHtml::encode($data->IdUsuarioModifica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaModifica')); ?>:</b>
	<?php echo CHtml::encode($data->FechaModifica); ?>
	<br />

	*/ ?>

</div>