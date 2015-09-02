<?php
/* @var $this MuellesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Muelles',
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
        <h3 class="panel-title">Muelles</h3>
    </div>
<div class=" panel-body">


<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'muelles-grid',
	'dataProvider'=>$model->search(),        
	'filter'=>$model,
        'columns'=>array(
            array(
                'name' => 'IdMuelle',
                'htmlOptions'=>array('width'=>'50'),
            ),                
            array(
                'name' => 'IdCedi',
                'htmlOptions'=>array('width'=>'150'),
                'value'=> function($model){
                    return Cedi::getNombreCedi($model->IdCedi);
                },                                
            ),             
            array(
                'name' => 'NombreMuelle',
                'htmlOptions'=>array('width'=>'200'),
            ), 
            array(
                'name' => 'IdTipoMuelle',
                'htmlOptions'=>array('width'=>'100'),
                'value'=> function($model){
                    return TiposMuelle::getNombreTipoMuelle($model->IdTipoMuelle);
                },                
            ),             
            array(
                'name' => 'IdTipoFabricante',
                'htmlOptions'=>array('width'=>'150'),
                'value'=> function($model){
                    return TiposFabricante::getNombreTipoFabricante($model->IdTipoFabricante);
                },                                
            ), 
            array(
                'name' => 'IdEstadoRegistro',
                'htmlOptions'=>array('width'=>'100'),
                'value'=> function($model){
                    return EstadosRegistro::getNombreEstado($model->IdEstadoRegistro);
                },                                
            ), 
            array(
                'name' => 'MinimoPiezas',
                'htmlOptions'=>array('width'=>'50'),
            ), 
            array(
                'name' => 'MaximoPiezas',
                'htmlOptions'=>array('width'=>'50'),
            ),                          
            array(  // muestra una columna con los botones "view", "update" y "delete"
                'class'=>'CButtonColumn',
                'htmlOptions'=>array('width'=>'80'),   
            ),
        ),
)); ?>
</div>
    </div>