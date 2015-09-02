<?php
/* @var $this MuellesController */
/* @var $model Muelles */


$this->breadcrumbs=array(
	'Catálogo Muelles'=>array('index'),
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

<?php $this->renderPartial('_form', 
        array('model' => $model, 
        )
    ); 
?>