<?php
/* @var $this OrdenesCompraCitasCediController */
/* @var $model OrdenesCompraCitasCedi */

$this->pageTitle = 'Solicitud de Cita';
$this->breadcrumbs=array(
	'Solicitud de Cita'=>array('index'),
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
                'modelsolicitudcita' => $modelsolicitudcita,
        )
    ); 
?>