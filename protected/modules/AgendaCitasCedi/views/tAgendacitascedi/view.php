<?php
/* @var $this TAgendacitascediController */
/* @var $model TAgendacitascedi */

$this->breadcrumbs=array(
	'Tagendacitascedi'=>array('index'),
	$model->IdEventoAgenda,
);

/*$this->menu=array(
	array('label'=>'List TAgendacitascedi', 'url'=>array('index')),
	array('label'=>'Create TAgendacitascedi', 'url'=>array('create')),
	array('label'=>'Update TAgendacitascedi', 'url'=>array('update', 'id'=>$model->IdEventoAgenda)),
	array('label'=>'Delete TAgendacitascedi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdEventoAgenda),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TAgendacitascedi', 'url'=>array('admin')),
);*/
?>

<h1>Ver TAgendacitascedi #<?php echo $model->IdEventoAgenda; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdEventoAgenda',
		'IdNumeroSolicitud',
		'IdCedi',
		'IdMuelle',
		'TituloEvento',
		'FechaInicio',
		'FechaFinal',
		'ObservacionesEvento',
		'IdUsuarioGraba',
		'FechaGraba',
		'IdUsuarioModifica',
		'FechaModifica',
	),
)); ?>
