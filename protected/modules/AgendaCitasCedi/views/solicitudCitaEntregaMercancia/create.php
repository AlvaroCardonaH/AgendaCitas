<?php
/* @var $this SolicitudCitaEntregaMercanciaController */
/* @var $model SolicitudCitaEntregaMercancia */

$this->breadcrumbs=array(
	'Solicitud Cita Entrega Mercancias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SolicitudCitaEntregaMercancia', 'url'=>array('index')),
	array('label'=>'Manage SolicitudCitaEntregaMercancia', 'url'=>array('admin')),
);
?>

<h1>Create SolicitudCitaEntregaMercancia</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>