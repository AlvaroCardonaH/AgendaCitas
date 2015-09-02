<?php
/* @var $this RolesController */
/* @var $model Roles */

$this->pageTitle = 'Actualizar Roles';
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->IdRol=>array('view','id'=>$model->IdRol),
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