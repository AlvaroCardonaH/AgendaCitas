<?php
/* @var $this AcuerdosEntregaFabricanteController */
/* @var $model AcuerdosEntregaFabricante */

$this->pageTitle = 'Acuerdos de Entrega de Mercancía';
$this->breadcrumbs=array(
	'Acuerdos de Entrega de Mercancía'=>array('index'),
	$model->IdAcuerdoEntrega=>array('view','id'=>$model->IdAcuerdoEntrega),
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