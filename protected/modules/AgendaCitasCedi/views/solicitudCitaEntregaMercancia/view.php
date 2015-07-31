<?php
/* @var $this SolicitudCitaEntregaMercanciaController */
/* @var $model SolicitudCitaEntregaMercancia */

$this->breadcrumbs=array(
	'Solicitud Cita Entrega Mercancias'=>array('index'),
	$model->IdNumeroSolicitud,
);

$this->menu=array(
	array('label'=>'List SolicitudCitaEntregaMercancia', 'url'=>array('index')),
	array('label'=>'Create SolicitudCitaEntregaMercancia', 'url'=>array('create')),
	array('label'=>'Update SolicitudCitaEntregaMercancia', 'url'=>array('update', 'id'=>$model->IdNumeroSolicitud)),
	array('label'=>'Delete SolicitudCitaEntregaMercancia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdNumeroSolicitud),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SolicitudCitaEntregaMercancia', 'url'=>array('admin')),
);
?>

<h1>View SolicitudCitaEntregaMercancia #<?php echo $model->IdNumeroSolicitud; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdNumeroSolicitud',
		'IdTransportador',
		'IdFabricante',
		'IdCedi',
		'IdOrdenCompra',
		'FechaRegistroOrdenCompra',
		'FechaTentativaEntrega',
		'TotalOrdenCompra',
		'FechaSolicitudCita',
		'HoraSolicitudCita',
		'NumeroPiezas',
		'IdConductor',
		'ObservacionesSolicitudCita',
		'IdEstadoSolicitudCita',
		'IdUsuarioGraba',
		'FechaGraba',
		'IdUsuarioModifica',
		'FechaModifica',
	),
)); ?>
