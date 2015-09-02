<?php
/* @var $this TAgendacitascediController */
/* @var $model TAgendacitascedi */

$this->breadcrumbs=array(
	'Tagendacitascedis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TAgendacitascedi', 'url'=>array('index')),
	array('label'=>'Manage TAgendacitascedi', 'url'=>array('admin')),
);
?>

<h1>Create TAgendacitascedi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>