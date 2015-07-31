<?php
/* @var $this OrdenesCompraCitasCediController */
/* @var $model OrdenesCompraCitasCedi */

$this->pageTitle = 'Gestionar Solicitudes de Citas';
$this->breadcrumbs=array(
	'Gestionar Solicitudes de Citas'=>array('index'),
	//$model->NumeroOrdenCompra=>array('view','id'=>$model->NumeroOrdenCompra),
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
            'modelagenda'=>$modelagenda,
            'modelmuelles'=>$modelmuelles,
        )
    ); 
?>