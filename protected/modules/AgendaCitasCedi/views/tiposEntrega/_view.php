<?php
/* @var $this TiposEntregaController */
/* @var $data TiposEntrega */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdTipoEntrega')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdTipoEntrega), array('view', 'id'=>$data->IdTipoEntrega)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreTipoEntrega')); ?>:</b>
	<?php echo CHtml::encode($data->NombreTipoEntrega); ?>
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