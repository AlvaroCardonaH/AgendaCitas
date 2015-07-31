<?php
/* @var $this TiposMuelleController */
/* @var $model TiposMuelle */

$this->pageTitle = 'Actualizar Tipos Muelle';
$this->breadcrumbs=array(
	'Tipos Muelle'=>array('index'),
	$model->IdTipoMuelle=>array('view','id'=>$model->IdTipoMuelle),
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