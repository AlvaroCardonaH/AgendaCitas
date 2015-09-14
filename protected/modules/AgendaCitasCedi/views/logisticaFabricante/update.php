<?php
/* @var $this FechasBloqueadasController */
/* @var $model FechasBloqueadas */

$this->breadcrumbs=array(
	'Logística Entrega de Mercancía'=>array('index'),
	$model->IdLogisticaFabricante=>array('view','id'=>$model->IdLogisticaFabricante),
	'Actualizar Registro',
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