<?php
/* @var $this AgendaCitasCediController */
/* @var $model AgendaCitasCedi */

$this->breadcrumbs=array(
	'Agenda Citas Cedis'=>array('index'),
	$model->IdEventoAgenda,
);

$this->menu=array(
	array('label'=>'List AgendaCitasCedi', 'url'=>array('index')),
	array('label'=>'Create AgendaCitasCedi', 'url'=>array('create')),
	array('label'=>'Update AgendaCitasCedi', 'url'=>array('update', 'id'=>$model->IdEventoAgenda)),
	array('label'=>'Delete AgendaCitasCedi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdEventoAgenda),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AgendaCitasCedi', 'url'=>array('admin')),
);
?>

<h1>View AgendaCitasCedi #<?php echo $model->IdEventoAgenda; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdEventoAgenda',
		'IdMuelle',
		'TituloEvento',
		'FechaInicio',
		'FechaFinal',
		'ObservacionesEvento',
		'IdusuarioGraba',
		'FechaGraba',
		'IdUsuarioModifica',
		'FechaModifica',
	),
)); ?>
