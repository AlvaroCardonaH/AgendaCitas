<?php
/* @var $this TiposEntregaController */
/* @var $model TiposEntrega */

$this->breadcrumbs=array(
	'Tipos Entrega'=>array('index'),
	$model->IdTipoEntrega=>array('view','id'=>$model->IdTipoEntrega),
	'Actualizar Registro',
);

?>


<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'htmlOptions'=>array ('class'=>'breadcrumb'),
));

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>