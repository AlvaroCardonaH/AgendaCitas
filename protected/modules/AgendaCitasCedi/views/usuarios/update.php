<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->pageTitle = 'Catálogo Usuarios';
$this->breadcrumbs=array(
	'Catálogo Usuarios'=>array('index'),
	$model->IdUsuario=>array('view','id'=>$model->IdUsuario),
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