<?php
/* @var $this MotivosBloqueoFechaController */
/* @var $model MotivosBloqueoFecha */

$this->breadcrumbs=array(
	'Motivos Bloqueo Fecha'=>array('index'),
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