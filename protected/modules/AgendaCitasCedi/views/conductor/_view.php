<?php
/* @var $this ConductorController */
/* @var $data Conductor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdConductor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdConductor), array('view', 'id'=>$data->IdConductor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NumeroDocumento')); ?>:</b>
	<?php echo CHtml::encode($data->NumeroDocumento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PrimerNombre')); ?>:</b>
	<?php echo CHtml::encode($data->PrimerNombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SegundoNombre')); ?>:</b>
	<?php echo CHtml::encode($data->SegundoNombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PrimerApellido')); ?>:</b>
	<?php echo CHtml::encode($data->PrimerApellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SegundoApellido')); ?>:</b>
	<?php echo CHtml::encode($data->SegundoApellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EmailConductor')); ?>:</b>
	<?php echo CHtml::encode($data->EmailConductor); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Telefono1')); ?>:</b>
	<?php echo CHtml::encode($data->Telefono1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Telefono2')); ?>:</b>
	<?php echo CHtml::encode($data->Telefono2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEstadoRegistro')); ?>:</b>
	<?php echo CHtml::encode($data->IdEstadoRegistro); ?>
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