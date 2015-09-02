<?php
/* @var $this RolesController */
/* @var $model Roles */


$this->breadcrumbs=array(
	'Motivos Bloqueo Fecha'=>array('index'),
	$model->IdMotivoBloqueo=>array('view','id'=>$model->IdMotivoBloqueo),
	
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
        <h3 class="panel-title">Ver Motivo Bloqueo Fecha</h3>
    </div>
<div class=" panel-body">


<div class="motivosbloqueofecha-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('motivosBloqueoFecha/update', 'id'=>$model->IdMotivoBloqueo),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('motivosBloqueoFecha/delete', 'id'=>$model->IdMotivoBloqueo),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'IdMotivoBloqueo',
            'DescripcionMotivoBloqueo',
            'ObservacionesMotivoBloqueo',
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>
</div>
</div>
