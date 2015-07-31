<?php
/* @var $this FechasBloqueadasController */
/* @var $model FechasBloqueadas */

$this->pageTitle = 'Fechas Bloqueadas';
$this->breadcrumbs=array(
	'Fechas Bloqueadas'=>array('index'),
	$model->IdFechaBloqueada=>array('view','id'=>$model->IdFechaBloqueada),
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