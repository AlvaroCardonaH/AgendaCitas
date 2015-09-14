<?php
/* @var $this AcuerdosEntregaFabricanteController */
/* @var $model AcuerdosEntregaFabricante */

$this->breadcrumbs=array(
	'Acuerdos de Entrega de Mercancía'=>array('index'),
	$model->IdAcuerdoEntrega=>array('view','id'=>$model->IdAcuerdoEntrega),
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