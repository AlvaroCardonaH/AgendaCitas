<?php
/* @var $this TiposEntregaController */
/* @var $model TiposEntrega */


$this->breadcrumbs=array(
	'Tipos Entrega'=>array('index'),
	$model->IdTipoEntrega=>array('view','id'=>$model->IdTipoEntrega),
	
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
        <h3 class="panel-title">Ver Tipos Entrega</h3>
    </div>
<div class=" panel-body">


<div class="tipos-muelle-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('TiposEntrega/update', 'id'=>$model->IdTipoEntrega),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('TiposEntrega/delete', 'id'=>$model->IdTipoEntrega),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'IdTipoEntrega',
            'NombreTipoEntrega',
            'ObservacionesTipoEntrega',
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>
</div>
    </div>