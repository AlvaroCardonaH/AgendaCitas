<?php
/* @var $this TAgendacitascediController */
/* @var $data TAgendacitascedi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEventoAgenda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdEventoAgenda), array('view', 'id'=>$data->IdEventoAgenda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdNumeroSolicitud')); ?>:</b>
	<?php echo CHtml::encode($data->IdNumeroSolicitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCedi')); ?>:</b>
	<?php echo CHtml::encode($data->IdCedi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdMuelle')); ?>:</b>
	<?php echo CHtml::encode($data->IdMuelle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TituloEvento')); ?>:</b>
	<?php echo CHtml::encode($data->TituloEvento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaInicio')); ?>:</b>
	<?php echo CHtml::encode($data->FechaInicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaFinal')); ?>:</b>
	<?php echo CHtml::encode($data->FechaFinal); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ObservacionesEvento')); ?>:</b>
	<?php echo CHtml::encode($data->ObservacionesEvento); ?>
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

	*/ ?>

</div>