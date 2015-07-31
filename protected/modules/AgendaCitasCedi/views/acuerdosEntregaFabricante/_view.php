<?php
/* @var $this ConfiguracionEntregasProveedorCediController */
/* @var $data ConfiguracionEntregasProveedorCedi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdConfiguracion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdConfiguracion), array('view', 'id'=>$data->IdConfiguracion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdFabricante')); ?>:</b>
	<?php echo CHtml::encode($data->IdFabricante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCedi')); ?>:</b>
	<?php echo CHtml::encode($data->IdCedi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdTipoEntrega')); ?>:</b>
	<?php echo CHtml::encode($data->IdTipoEntrega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ObservacionesConfiguracion')); ?>:</b>
	<?php echo CHtml::encode($data->ObservacionesConfiguracion); ?>
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