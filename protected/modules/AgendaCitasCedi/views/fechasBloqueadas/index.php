<?php
/* @var $this MuellesController */
/* @var $dataProvider CActiveDataProvider */



//$this->menu=$this->verPermisosMenuOperaciones();
?>


<div class="panel panel-primary">
    <div class="panel-heading">        
        <h3 class="panel-title">Fechas Bloqueadas</h3>
    </div>
<div class=" panel-body">


<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'fechasbloqueadas-grid',
	'dataProvider'=>$model->search(),        
	'filter'=>$model,    
        'htmlOptions'=>array('style'=>'word-wrap:break-word;'),
        'columns'=>array(
            array(
                'name' => 'IdFechaBloqueada',
                'htmlOptions'=>array('width'=>'50'),
            ),
            array(
                'name' => 'Fecha',
                'htmlOptions'=>array('width'=>'100'),
            ),                         
            'IdCedi'=>array(
                'name' => 'IdCedi',
                'htmlOptions'=>array('width'=>'200'),
                'value' => '$data->cedi->NombreCEDI',
                'filter'=> CHtml::listData(Cedi::model()->findAll(array('order'=>'NombreCEDI')), 
                                                                        'IDCEDI', 'NombreCEDI')
            ),            
            /*'IdMuelle'=>array(
                'name' => 'IdMuelle',
                'htmlOptions'=>array('width'=>'200'),
                'value'=> '$data->muelle->NombreMuelle',        
                'filter'=> CHtml::listData(Muelles::model()->findAll(array('order'=>'NombreMuelle')), 
                                                                        'IdMuelle', 'NombreMuelle')
            ),         */                        
            array(
                'name' => 'HoraInicio',
                'htmlOptions'=>array('width'=>'150'),
            ),                                     
            array(
                'name' => 'HoraFinal',
                'htmlOptions'=>array('width'=>'150'),
            ),                                     
            
            'IdMotivoBloqueo'=>array(
                'name' => 'IdMotivoBloqueo',
                'htmlOptions'=>array('width'=>'200'),
                'value' => '$data->motivobloqueo->DescripcionMotivoBloqueo',
                'filter'=> CHtml::listData(MotivosBloqueoFecha::model()->findAll(array('order'=>'DescripcionMotivoBloqueo')), 
                                                                        'IdMotivoBloqueo', 'DescripcionMotivoBloqueo')
            ),
            array(
                'name' => 'ObservacionesBloqueo',
                'htmlOptions'=>array('width'=>'400'),
            ),                          
            /*array(  // muestra una columna con los botones "view", "update" y "delete"
                'class'=>'CButtonColumn',
                'htmlOptions'=>array('width'=>'250'),   
            ),*/
        ),
)); ?>
</div>
</div>