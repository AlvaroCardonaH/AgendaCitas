<?php
/* @var $this SolicitudCitaEntregaMercanciaController */
/* @var $data SolicitudCitaEntregaMercancia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdNumeroSolicitud')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdNumeroSolicitud), array('view', 'id'=>$data->IdNumeroSolicitud)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdTransportador')); ?>:</b>
	<?php echo CHtml::encode($data->IdTransportador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdFabricante')); ?>:</b>
	<?php echo CHtml::encode($data->IdFabricante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCedi')); ?>:</b>
	<?php echo CHtml::encode($data->IdCedi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdOrdenCompra')); ?>:</b>
	<?php echo CHtml::encode($data->IdOrdenCompra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaRegistroOrdenCompra')); ?>:</b>
	<?php echo CHtml::encode($data->FechaRegistroOrdenCompra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaTentativaEntrega')); ?>:</b>
	<?php echo CHtml::encode($data->FechaTentativaEntrega); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('TotalOrdenCompra')); ?>:</b>
	<?php echo CHtml::encode($data->TotalOrdenCompra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaSolicitudCita')); ?>:</b>
	<?php echo CHtml::encode($data->FechaSolicitudCita); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HoraSolicitudCita')); ?>:</b>
	<?php echo CHtml::encode($data->HoraSolicitudCita); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NumeroPiezas')); ?>:</b>
	<?php echo CHtml::encode($data->NumeroPiezas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdConductor')); ?>:</b>
	<?php echo CHtml::encode($data->IdConductor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ObservacionesSolicitudCita')); ?>:</b>
	<?php echo CHtml::encode($data->ObservacionesSolicitudCita); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEstadoSolicitudCita')); ?>:</b>
	<?php echo CHtml::encode($data->IdEstadoSolicitudCita); ?>
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