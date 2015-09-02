<?php
/* @var $this OrdenesCompraCitasCediController */
/* @var $model OrdenesCompraCitasCedi */

$this->breadcrumbs=array(
	'Gestionar Solicitudes de Citas'=>array('index'),
	//$model->NumeroOrdenCompra=>array('view','id'=>$model->NumeroOrdenCompra),
	'Confirmar Solicitud',
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
            'modelagenda'=>$modelagenda,
            'modelmuelles'=>$modelmuelles,
        )
    ); 
?>