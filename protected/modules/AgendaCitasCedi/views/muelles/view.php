<?php
/* @var $this MuellesController */
/* @var $model Muelles */


$this->breadcrumbs=array(
	'Muelles'=>array('index'),
	$model->IdMuelle=>array('view','id'=>$model->IdMuelle),

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
        <h3 class="panel-title">Ver Muelle</h3>
    </div>
<div class=" panel-body">


<div class="muelles-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('Muelles/update', 'id'=>$model->IdMuelle),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('Muelles/delete', 'id'=>$model->IdMuelle),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'htmlOptions'=>array('style'=>'word-wrap:break-word;"'),
        'attributes' => array(
            'IdMuelle',
            'NombreMuelle',
            array(
                'name' => 'IdCedi',
                'value' => $model->IdCedi . ' - ' . Cedi::getNombreCedi($model->IdCedi),
            ),            
            array(
                'name' => 'IdTipoMuelle',
                'value' => $model->IdTipoMuelle . ' - ' . TiposMuelle::getNombreTipoMuelle($model->IdTipoMuelle),
            ),
            array(
                'name' => 'IdTipoFabricante',
                'value' => $model->IdTipoFabricante . ' - ' . TiposFabricante::getNombreTipoFabricante($model->IdTipoFabricante),
            ),           
            array(
                'name' => 'IdEstadoRegistro',
                'value' => $model->IdEstadoRegistro . ' - ' . EstadosRegistro::getNombreEstado($model->IdEstadoRegistro),
            ),    
            'HoraAlmuerzo',
            'HoraRefrigerioAM',
            'HoraRefrigerioPM', 
            array(
                'label' => 'Horario Semana',
                'value' => $model->HorarioNormalAperturaSemana . ' - ' . $model->HorarioNormalCierreSemana, 
            ),  
            array(
                'label' => 'Horario Extendido Semana',
                'value' => $model->HorarioExtendidoAperturaSemana . ' - ' . $model->HorarioExtendidoCierreSemana, 
            ),           
            array(
                'label' => 'Horario Semana',
                'value' => $model->HorarioNormalAperturaSabado . ' - ' . $model->HorarioNormalCierreSabado, 
            ),  
            array(
                'label' => 'Horario Extendido Semana',
                'value' => $model->HorarioExtendidoAperturaSabado . ' - ' . $model->HorarioExtendidoCierreSabado, 
            ),                       
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>

