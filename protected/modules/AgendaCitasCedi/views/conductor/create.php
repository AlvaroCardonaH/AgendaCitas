<?php
/* @var $this EstadosRegistroController */
/* @var $model EstadosRegistro */

$this->pageTitle = 'Crear Conductor';

$this->breadcrumbs=array(
	'Conductor'=>array('index'),
	'Crear Registro',
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