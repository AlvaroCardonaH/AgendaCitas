<?php
/* @var $this TipoMuelleController */
/* @var $dataProvider CActiveDataProvider */


//$this->menu=$this->verPermisosMenuOperaciones();
?>



<div class="panel panel-primary">
    <div class="panel-heading">        
        <h3 class="panel-title">Tipos Muelle</h3>
    </div>
<div class=" panel-body">
     

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'tipos-muelles-grid',
	'dataProvider'=>$model->search(),        
	'filter'=>$model,
        'columns'=>array(
            array(
                'name' => 'IdTipoMuelle',
                'htmlOptions'=>array('width'=>'100'),
            ),                
            array(
                'name' => 'NombreTipoMuelle',
                'htmlOptions'=>array('width'=>'300'),
            ), 
            array(
                'name' => 'ObservacionesTipoMuelle',
                'htmlOptions'=>array('width'=>'300'),
            ),             
            /*array(  // muestra una columna con los botones "view", "update" y "delete"
            'class'=>'CButtonColumn',
            ),*/
        ),
)); ?>
</div>
    </div>
