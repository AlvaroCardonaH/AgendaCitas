<?php
/* @var $this OrdenesCompraCitasCediController */
/* @var $model OrdenesCompraCitasCedi */

$this->pageTitle = 'Visualizar ID Solicitud Cita';

$this->breadcrumbs=array(
	'Solicitud de Cita'=>array('index'),
	//$model->NumeroOrdenCompra=>array('view','id'=>$model->NumeroOrdenCompra),
	$this->pageTitle,
);

?>

<title><?php echo Yii::app()->controller->module->getName() ." >> " . $this->pageTitle ?></title>


<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'htmlOptions'=>array ('class'=>'breadcrumb'),
));

?>

<div class="page-header">
    <h1>Solicitud de Cita</h1>
</div>


<div class="ordenCompraCitasCedi-view">
       
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'htmlOptions'=>array('style'=>'word-wrap:break-word; width:600px; font-family:"Times New Roman"'),
        'attributes' => array(            
            'NumeroOrdenCompra',
            array(
                'name' => 'IdFabricante',
                'value' => $model->IdFabricante . ' - ' . $model->fabricante->Nombre,
            ),                        
            array(
                'name' => 'IdCedi',
                'value' => $model->IdCedi . ' - ' . $model->cedi->NombreCEDI,
            ),
            array(
                'name' => 'IdTransportador',
                'value' => $model->IdTransportador . ' - ' . $model->NombreTransportador,
            ),                  
        ),
    
    )); ?>
        
</div>

