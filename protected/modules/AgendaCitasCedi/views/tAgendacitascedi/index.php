<?php
/* @var $this TAgendacitascediController */
/* @var $model TAgendacitascedi */

$this->breadcrumbs=array(
	'Tagendacitascedis'=>array('index'),
	'Manage',
);

/*$this->menu=array(
	array('label'=>'List TAgendacitascedi', 'url'=>array('index')),
	array('label'=>'Create TAgendacitascedi', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tagendacitascedi-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Citas Agendadas</h1>




<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tagendacitascedi-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'IdEventoAgenda',
		'IdNumeroSolicitud',
		'IdCedi',
		'IdMuelle',
		'TituloEvento',
		'FechaInicio',
		/*
		'FechaFinal',
		'ObservacionesEvento',
		'IdUsuarioGraba',
		'FechaGraba',
		'IdUsuarioModifica',
		'FechaModifica',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
