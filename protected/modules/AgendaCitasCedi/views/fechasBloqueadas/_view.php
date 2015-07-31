<?php
/* @var $this FechasBloqueadasController */
/* @var $data FechasBloqueadas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdFechaBloqueada')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdFechaBloqueada), array('view', 'id'=>$data->IdFechaBloqueada)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HoraInicio')); ?>:</b>
	<?php echo CHtml::encode($data->HoraInicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HoraFinal')); ?>:</b>
	<?php echo CHtml::encode($data->HoraFinal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdMotivoBloqueo')); ?>:</b>
	<?php echo CHtml::encode($data->IdMotivoBloqueo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ObservacionesBloqueo')); ?>:</b>
	<?php echo CHtml::encode($data->ObservacionesBloqueo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdUsuarioGraba')); ?>:</b>
	<?php echo CHtml::encode($data->IdUsuarioGraba); ?>
	<br />

	<?php /*
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