<?php
/* @var $this TiposFabricanteController */
/* @var $dataProvider CActiveDataProvider */



//$this->menu=$this->verPermisosMenuOperaciones();
?>


<div class="panel panel-primary">
    <div class="panel-heading">        
        <h3 class="panel-title">Tipos Fabricantes</h3>
    </div>
<div class=" panel-body">


<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'tipos-fabricantes-grid',
	'dataProvider'=>$model->search(),        
	'filter'=>$model,   
        'columns'=>array(
            /*array(
                'name' => 'IdTipoFabricante',
                'htmlOptions'=>array('width'=>'100'),
            ),*/          
            array(
                'name' => 'NombreTipoFabricante',
                'htmlOptions'=>array('width'=>'300'),
            ), 
            array(
                'name' => 'ObservacionesTipoFabricante',
                'htmlOptions'=>array('width'=>'300'),
            ),             
            array(  // muestra una columna con los botones "view", "update" y "delete"
            'class'=>'CButtonColumn',
            ),
        ),
)); ?>
</div>
    </div>