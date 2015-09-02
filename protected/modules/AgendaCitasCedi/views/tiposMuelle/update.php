<?php
/* @var $this TiposMuelleController */
/* @var $model TiposMuelle */


$this->breadcrumbs=array(
	'Tipos Muelle'=>array('index'),
	$model->IdTipoMuelle=>array('view','id'=>$model->IdTipoMuelle),
	'Actualizar Registro',
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