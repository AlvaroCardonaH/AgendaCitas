<?php
/* @var $this FechasBloqueadasController */
/* @var $model FechasBloqueadas */

$this->pageTitle = 'Logística Entrega de Mercancía';
$this->breadcrumbs=array(
	'Logística Entrega de Mercancía'=>array('index'),
	$model->IdLogisticaFabricante=>array('view','id'=>$model->IdLogisticaFabricante),
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