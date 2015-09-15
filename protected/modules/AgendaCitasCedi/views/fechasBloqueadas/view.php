<?php
/* @var $this FechasBloqueadasController */
/* @var $model FechasBloqueadas */


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
        <h3 class="panel-title">Ver Fecha Bloqueada</h3>
    </div>
<div class=" panel-body">


<div class="fechasbloqueadas-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('fechasBloqueadas/update', 'id'=>$model->IdFechaBloqueada),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('fechasBloqueadas/delete', 'id'=>$model->IdFechaBloqueada),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'htmlOptions'=>array('style'=>'word-wrap:break-word;"'),
        'attributes' => array(            
            'IdFechaBloqueada',
            array(
                'name' => 'IdCedi',
                'value' => $model->IdCedi . ' - ' . Cedi::getNombreCedi($model->IdCedi),
            ),     
            array(
                'name' => 'IdMuelle',
                'value' => $model->IdMuelle . ' - ' . Muelles::getNombreMuelle($model->IdMuelle),
            ),                           
            'Fecha',
            'HoraInicio',
            'HoraFinal',
            array(
                'name' => 'IdMotivoBloqueo',
                'value' => $model->IdMotivoBloqueo . ' - ' . $model->motivobloqueo->DescripcionMotivoBloqueo,
            ),   
            array(
                'name' => 'ObservacionesBloqueo',
                isset($model->ObservacionesBloqueo)?$model->ObservacionesBloqueo:'',            
            ),    
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>
</div>
</div>