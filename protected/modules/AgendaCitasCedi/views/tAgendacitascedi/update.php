<?php
/* @var $this TAgendacitascediController */
/* @var $model TAgendacitascedi */

$this->breadcrumbs=array(
	'Tagendacitascedi'=>array('index'),
	$model->IdEventoAgenda=>array('view','id'=>$model->IdEventoAgenda),
	'Actualizar',
);

/*$this->menu=array(
	array('label'=>'List TAgendacitascedi', 'url'=>array('index')),
	array('label'=>'Create TAgendacitascedi', 'url'=>array('create')),
	array('label'=>'View TAgendacitascedi', 'url'=>array('view', 'id'=>$model->IdEventoAgenda)),
	array('label'=>'Manage TAgendacitascedi', 'url'=>array('admin')),
);*/
?>

<h1>Actualizar TAgendacitascedi <?php echo $model->IdEventoAgenda; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>