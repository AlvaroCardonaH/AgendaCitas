<?php
/* @var $this AgendaCitasCediController */
/* @var $model AgendaCitasCedi */

$this->breadcrumbs=array(
	'Agenda Citas Cedis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AgendaCitasCedi', 'url'=>array('index')),
	array('label'=>'Manage AgendaCitasCedi', 'url'=>array('admin')),
);
?>

<h1>Create AgendaCitasCedi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>