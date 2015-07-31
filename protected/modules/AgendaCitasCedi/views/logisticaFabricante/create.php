<?php
/* @var $this ConfiguracionEntregasProveedorCediController */
/* @var $model ConfiguracionEntregasProveedorCedi */

$this->pageTitle = 'Logística Entrega de Mercancía';

$this->breadcrumbs=array(
	'Logística Entrega de Mercancía'=>array('index'),
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