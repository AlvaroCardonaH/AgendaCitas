<?php
/* @var $this MotivosBloqueoFechaController */
/* @var $data MotivosBloqueoFecha */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdMotivoBloqueo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdMotivoBloqueo), array('view', 'id'=>$data->IdMotivoBloqueo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DescripcionMotivoBloqueo')); ?>:</b>
	<?php echo CHtml::encode($data->DescripcionMotivoBloqueo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ObservacionesMotivoBloqueo')); ?>:</b>
	<?php echo CHtml::encode($data->ObservacionesMotivoBloqueo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdUsuarioGraba')); ?>:</b>
	<?php echo CHtml::encode($data->IdUsuarioGraba); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaGraba')); ?>:</b>
	<?php echo CHtml::encode($data->FechaGraba); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdUsuarioModifica')); ?>:</b>
	<?php echo CHtml::encode($data->IdUsuarioModifica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaModifica')); ?>:</b>
	<?php echo CHtml::encode($data->FechaModifica); ?>
	<br />


</div>