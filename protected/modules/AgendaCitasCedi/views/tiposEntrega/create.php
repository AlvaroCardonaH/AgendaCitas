<?php
/* @var $this TiposEntregaController */
/* @var $model TiposEntrega */

$this->pageTitle = 'Crear Tipos Entrega';

$this->breadcrumbs=array(
	'Tipos Entrega'=>array('index'),
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