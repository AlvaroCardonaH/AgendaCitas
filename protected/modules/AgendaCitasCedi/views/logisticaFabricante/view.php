<?php
/* @var $this AcuerdosEntregaFabricanteController */
/* @var $model AcuerdosEntregaFabricante */


$this->breadcrumbs=array(
	'Logística Entrega de Mercancía'=>array('index'),
	$model->IdLogisticaFabricante=>array('view','id'=>$model->IdLogisticaFabricante),
	
);
//$this->menu=$this->verPermisosMenuOperaciones();
?>



<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'htmlOptions'=>array ('class'=>'breadcrumb'),
));

?>

<div class="panel panel-primary">
    <div class="panel-heading">        
        <h3 class="panel-title">Ver Logistica de Entrega</h3>
    </div>
<div class=" panel-body">

<div class="logisticafabricante-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('logisticaFabricante/update', 'id'=>$model->IdLogisticaFabricante),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('logisticaFabricante/delete', 'id'=>$model->IdLogisticaFabricante),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'htmlOptions'=>array('style'=>'word-wrap:break-word;"'),
        'attributes' => array(            
            'IdLogisticaFabricante',
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
                'value' => $model->IdTransportador . ' - ' . Transportador::getNombreTransportador($model->IdTransportador)
            ),                  
            array(
                'name' => 'IdUsuarioResponsable',
                'value' => $model->IdUsuarioResponsable . ' - ' . Usuarios::getNombreUsuario($model->IdUsuarioResponsable)
            ),                              
            'ObservacionesLogistica',            
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>
</div>
</div>

