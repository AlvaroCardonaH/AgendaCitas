<?php
/* @var $this MuellesController */
/* @var $model Muelles */

$this->pageTitle = 'Catálogo Muelles';
$this->breadcrumbs=array(
	'Catálogo Muelles'=>array('index'),
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

<?php $this->renderPartial('_form', 
        array('model' => $model, 
        )
    ); 
?>