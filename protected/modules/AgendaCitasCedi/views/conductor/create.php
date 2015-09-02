<?php
/* @var $this EstadosRegistroController */
/* @var $model EstadosRegistro */

$this->breadcrumbs=array(
	'Conductor'=>array('index'),
	'Crear Registro',
);

?>

<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'htmlOptions'=>array ('class'=>'breadcrumb'),
));
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>