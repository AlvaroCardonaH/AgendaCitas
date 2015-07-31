<?php
/* @var $this TiposFabricanteController */
/* @var $data TiposFabricante */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdTipoFabricante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdTipoFabricante), array('view', 'id'=>$data->IdTipoFabricante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreTipoFabricante')); ?>:</b>
	<?php echo CHtml::encode($data->NombreTipoFabricante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ObservacionesTipoFabricante')); ?>:</b>
	<?php echo CHtml::encode($data->ObservacionesTipoFabricante); ?>
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