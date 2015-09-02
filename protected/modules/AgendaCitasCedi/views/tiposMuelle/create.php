<?php
/* @var $this TiposMuelleController */
/* @var $model TiposMuelle */

$this->pageTitle = 'Crear Tipos Muelle';

$this->breadcrumbs=array(
	'Tipos Muelle'=>array('index'),
	'Crear Registro',
);
//$this->menu=$this->verPermisosMenuOperaciones();
?>

<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'htmlOptions'=>array ('class'=>'breadcrumb'),
));
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>