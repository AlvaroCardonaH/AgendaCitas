<?php
/* @var $this ConfiguracionEntregasProveedorCediController */
/* @var $model ConfiguracionEntregasProveedorCedi */



$this->breadcrumbs=array(
	'Fechas Bloqueadas'=>array('index'),
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