<?php
/* @var $this OrdenesCompraCitasCediController */
/* @var $data OrdenesCompraCitasCedi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NumeroOrdenCompra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NumeroOrdenCompra), array('view', 'id'=>$data->NumeroOrdenCompra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdFabricante')); ?>:</b>
	<?php echo CHtml::encode($data->IdFabricante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreFabricante')); ?>:</b>
	<?php echo CHtml::encode($data->NombreFabricante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCedi')); ?>:</b>
	<?php echo CHtml::encode($data->IdCedi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreCedi')); ?>:</b>
	<?php echo CHtml::encode($data->NombreCedi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotalOrdenCompra')); ?>:</b>
	<?php echo CHtml::encode($data->TotalOrdenCompra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEstadoOrdenCompra')); ?>:</b>
	<?php echo CHtml::encode($data->IdEstadoOrdenCompra); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaTentativaEntrega')); ?>:</b>
	<?php echo CHtml::encode($data->FechaTentativaEntrega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaRegistroOrdenCompra')); ?>:</b>
	<?php echo CHtml::encode($data->FechaRegistroOrdenCompra); ?>
	<br />

	*/ ?>

</div>