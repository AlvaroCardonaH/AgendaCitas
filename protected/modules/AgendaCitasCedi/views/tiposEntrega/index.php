<?php
/* @var $this TiposEntregaController */
/* @var $dataProvider CActiveDataProvider */


$this->breadcrumbs=array(
	'Tipos Entrega',
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
        <h3 class="panel-title">Tipos Entrega</h3>
    </div>
<div class=" panel-body">


<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'tipos-muelles-grid',
	'dataProvider'=>$model->search(),        
	'filter'=>$model,   
        'columns'=>array(
            array(
                'name' => 'IdTipoEntrega',
                'htmlOptions'=>array('width'=>'100'),
            ),                
            array(
                'name' => 'NombreTipoEntrega',
                'htmlOptions'=>array('width'=>'300'),
            ), 
            array(
                'name' => 'ObservacionesTipoEntrega',
                'htmlOptions'=>array('width'=>'300'),
            ),             
            array(  // muestra una columna con los botones "view", "update" y "delete"
            'class'=>'CButtonColumn',
            ),
        ),
)); ?>
</div>
    </div>
