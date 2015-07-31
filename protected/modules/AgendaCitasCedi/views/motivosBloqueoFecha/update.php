<?php
/* @var $this MotivosBloqueoFechaController */
/* @var $model MotivosBloqueoFecha */

$this->pageTitle = 'Actualizar Motivos Bloqueo Fecha';
$this->breadcrumbs=array(
	'Motivos Bloqueo Fecha'=>array('index'),
	$model->IdMotivoBloqueo=>array('view','id'=>$model->IdMotivoBloqueo),
	'Actualizar Registro',
);

?>

<title><?php echo Yii::app()->controller->module->getName() ." >> " . $this->pageTitle ?></title>


<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'htmlOptions'=>array ('class'=>'breadcrumb'),
));

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>