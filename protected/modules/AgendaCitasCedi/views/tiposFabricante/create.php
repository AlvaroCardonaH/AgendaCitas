<?php
/* @var $this TiposFabricanteController */
/* @var $model TiposFabricante */



$this->breadcrumbs=array(
	'Tipos Fabricante'=>array('index'),
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