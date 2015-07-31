<?php
/* @var $this TiposFabricanteController */
/* @var $model TiposFabricante */

$this->pageTitle = 'Crear Tipos Fabricante';

$this->breadcrumbs=array(
	'Tipos Fabricante'=>array('index'),
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