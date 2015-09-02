<?php
/* @var $this TiposFabricanteController */
/* @var $model TiposFabricante */


$this->breadcrumbs=array(
	'Tipos Fabricante'=>array('index'),
	$model->IdTipoFabricante=>array('view','id'=>$model->IdTipoFabricante),
	
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
        <h3 class="panel-title">Ver Tipo Fabricante</h3>
    </div>
<div class=" panel-body">


<div class="tipos-muelle-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('TiposFabricante/update', 'id'=>$model->IdTipoFabricante),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('TiposFabricante/delete', 'id'=>$model->IdTipoFabricante),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'IdTipoFabricante',
            'NombreTipoFabricante',
            'ObservacionesTipoFabricante',
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>
</div>
    </div>