<?php
/* @var $this TiposFabricanteController */
/* @var $model TiposFabricante */

$this->pageTitle = 'Actualizar Tipos Fabricante';
$this->breadcrumbs=array(
	'Tipos Fabricante'=>array('index'),
	$model->IdTipoFabricante=>array('view','id'=>$model->IdTipoFabricante),
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