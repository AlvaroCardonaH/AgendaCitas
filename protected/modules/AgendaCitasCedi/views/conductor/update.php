<?php
/* @var $this ConductorController */
/* @var $model Conductor */

$this->pageTitle = 'Catálogo Conductor';
$this->breadcrumbs=array(
	'Catálogo Conductor'=>array('index'),
	$model->IdConductor=>array('view','id'=>$model->IdConductor),
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