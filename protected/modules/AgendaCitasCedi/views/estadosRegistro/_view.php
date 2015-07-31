<?php
/* @var $this EstadosRegistroController */
/* @var $data EstadosRegistro */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEstadoRegistro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdEstadoRegistro), array('view', 'id'=>$data->IdEstadoRegistro)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreEstadoRegistro')); ?>:</b>
	<?php echo CHtml::encode($data->NombreEstadoRegistro); ?>
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