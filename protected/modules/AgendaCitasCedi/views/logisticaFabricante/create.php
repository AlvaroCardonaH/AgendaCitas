<?php
/* @var $this ConfiguracionEntregasProveedorCediController */
/* @var $model ConfiguracionEntregasProveedorCedi */


$this->breadcrumbs=array(
	'Logística Entrega de Mercancía'=>array('index'),
	'Crear Registro',
);
//$this->menu=$this->verPermisosMenuOperaciones();
?>

<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'htmlOptions'=>array ('class'=>'breadcrumb'),
));
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>