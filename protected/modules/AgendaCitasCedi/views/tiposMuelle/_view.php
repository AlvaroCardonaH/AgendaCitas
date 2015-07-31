<?php
/* @var $this TiposMuelleController */
/* @var $data TiposMuelle */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdTipoMuelle')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdTipoMuelle), array('view', 'id'=>$data->IdTipoMuelle)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreTipoMuelle')); ?>:</b>
	<?php echo CHtml::encode($data->NombreTipoMuelle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ObservacionesTipoMuelle')); ?>:</b>
	<?php echo CHtml::encode($data->ObservacionesTipoMuelle); ?>
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