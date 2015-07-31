<?php
/* @var $this EstadosRegistroController */
/* @var $model EstadosRegistro */

$this->pageTitle = 'Actualizar Estados de Registro';
$this->breadcrumbs=array(
	'Estados Registros'=>array('index'),
	$model->IdEstadoRegistro=>array('view','id'=>$model->IdEstadoRegistro),
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