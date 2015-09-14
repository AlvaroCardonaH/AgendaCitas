<?php
/* @var $this ConfiguracionEntregasProveedorCediController */
/* @var $dataProvider CActiveDataProvider */


$this->breadcrumbs=array(
	'Acuerdos de Entrega de Mercancía',
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
        <h3 class="panel-title">Acuerdos de Entrega Fabricante</h3>
    </div>
<div class=" panel-body">   


<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'configuracion-grid',
	'dataProvider'=>$model->search(),        
	'filter'=>$model,
        'htmlOptions'=>array('style'=>'word-wrap:break-word;'),
        'columns'=>array(
            array(
                'name' => 'IdAcuerdoEntrega',
                'htmlOptions'=>array('width'=>'50'),
            ),                
            'IdFabricante'=>array(
                'name' => 'IdFabricante',
                'htmlOptions'=>array('width'=>'250'),
                'value' => '$data->fabricante->Nombre',
                'filter'=> CHtml::listData(Fabricante::model()->findAll(array('order'=>'Nombre')), 
                                                                        'IdFabricante', 'Nombre')
            ),
            'IdCedi'=>array(
                'name' => 'IdCedi',
                'htmlOptions'=>array('width'=>'250'),
                'value' => '$data->cedi->NombreCEDI',
                'filter'=> CHtml::listData(Cedi::model()->findAll(array('order'=>'NombreCEDI')), 
                                                                        'IDCEDI', 'NombreCEDI')
            ),     
            'DiaSemana'=>array(
                'name' => 'DiaSemana',
                'htmlOptions'=>array('width'=>'250'),
                'value'=> '$data->diasemana->NombreDia',
                'filter'=> CHtml::listData(DiasSemanaAgenda::model()->findAll(array('order'=>'NumeroDia')), 
                                                                        'NumeroDia', 'NombreDia')                
            ),                                    
            array(
                'name' => 'HoraDia',
                'htmlOptions'=>array('width'=>'150'),
            ),                                     
            array(
                'name' => 'ObservacionesAcuerdoEntrega',
                'htmlOptions'=>array('width'=>'300'),
            ),             
            array(  // muestra una columna con los botones "view", "update" y "delete"
            'class'=>'CButtonColumn',
            'htmlOptions'=>array('width'=>'150'),    
            ),
        ),
)); ?>
</div>
</div>