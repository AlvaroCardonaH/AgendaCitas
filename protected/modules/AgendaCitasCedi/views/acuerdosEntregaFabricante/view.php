<?php
/* @var $this AcuerdosEntregaFabricanteController */
/* @var $model AcuerdosEntregaFabricante */


$this->breadcrumbs=array(
	'Acuerdos de Entrega de Mercancía'=>array('index'),
	$model->IdAcuerdoEntrega=>array('view','id'=>$model->IdAcuerdoEntrega),

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
        <h3 class="panel-title">Ver Acuerdo de Entrega</h3>
    </div>
<div class=" panel-body">


<div class="acuerdosentrega-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('acuerdosEntregaFabricante/update', 'id'=>$model->IdAcuerdoEntrega),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('acuerdosEntregaFabricante/delete', 'id'=>$model->IdAcuerdoEntrega),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'htmlOptions'=>array('style'=>'word-wrap:break-word; width:600px; font-family:"Times New Roman"'),
        'attributes' => array(            
            'IdAcuerdoEntrega',
            array(
                'name' => 'IdFabricante',
                'value' => $model->IdFabricante . ' - ' . $model->fabricante->Nombre,
            ),                        
            array(
                'name' => 'IdCedi',
                'value' => $model->IdCedi . ' - ' . $model->cedi->NombreCEDI,
            ),      
            array(
                'name' => 'DiaSemana',
                'value' => $model->diasemana->NombreDia,
            ),            
            'HoraDia',
            'ObservacionesAcuerdoEntrega',            
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>
</div>

</div>
