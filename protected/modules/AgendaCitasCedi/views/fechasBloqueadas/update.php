<?php
/* @var $this FechasBloqueadasController */
/* @var $model FechasBloqueadas */

$this->breadcrumbs=array(
	'Fechas Bloqueadas'=>array('index'),
	$model->IdFechaBloqueada=>array('view','id'=>$model->IdFechaBloqueada),
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