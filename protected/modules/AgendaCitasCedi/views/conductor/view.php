<?php
/* @var $this ConductorController */
/* @var $model Conductor*/

$this->pageTitle = 'Visualizar ID Conductor';

$this->breadcrumbs=array(
	'Conductor'=>array('index'),
	$model->IdConductor=>array('view','id'=>$model->IdConductor),
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
    <h1>Registrar Conductor</h1>
</div>


<div class="conductor-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('conductor/update', 'id'=>$model->IdConductor),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('conductor/delete', 'id'=>$model->IdConductor),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'htmlOptions'=>array('style'=>'word-wrap:break-word; width:600px; font-family:"Times New Roman"'),
        'attributes' => array(            
            'IdConductor',
            array(
                'name' => 'NumeroDocumento',
                'value' => Yii::app()->format->formatNumber($model->NumeroDocumento),
            ),            
            array(
                'name' => 'Nombre Completo',
                'value' => $model->PrimerNombre . ' ' . $model->SegundoNombre . ' ' . $model->PrimerApellido . ' ' . $model->SegundoApellido,
            ),
            'EmailConductor',
            'Telefono1',
            'Telefono2',
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>

