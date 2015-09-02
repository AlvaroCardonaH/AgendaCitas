<?php
/* @var $this UsuariosController */
/* @var $dataProvider CActiveDataProvider */


$this->breadcrumbs=array(
	'Conductores'=>array('index'),
         $model->IdConductor,

);
//$this->menu=$this->verPermisosMenuOperaciones();
?>


<?php
/* echo TbHtml::linkButton('Crear Registro', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('conductor/create'),
));*/ 
?>     


<div class="panel panel-primary">
    <div class="panel-heading">        
        <h3 class="panel-title">Conductores</h3>
    </div>
<div class=" panel-body">

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'usuarios-grid',
	'dataProvider'=>$model->search(),        
	'filter'=>$model,
        'columns'=>array(
            array(
                'name' => 'IdConductor',
                'htmlOptions'=>array('width'=>'50'),
            ), 
            array(
                'name' => 'NumeroDocumento',
                'htmlOptions'=>array('width'=>'50','align'=>'right'),
                'value' => function ($model){
                        return Yii::app()->format->formatNumber($model->NumeroDocumento);
                }                
            ),             
            array(
                'name' => 'PrimerNombre',
                'htmlOptions'=>array('width'=>'50'),
            ),          
            array(
                'name' => 'SegundoNombre',
                'htmlOptions'=>array('width'=>'50'),
            ),             
            array(
                'name' => 'PrimerApellido',
                'htmlOptions'=>array('width'=>'50'),
            ),             
            array(
                'name' => 'SegundoApellido',
                'htmlOptions'=>array('width'=>'100'),
            ),     
            array(
                'name' => 'EmailConductor',
                'htmlOptions'=>array('width'=>'100'),
            ),                 
            array(
                'name' => 'Telefono1',
                'htmlOptions'=>array('width'=>'100'),
            ),                 
            array(
                'name' => 'Telefono2',
                'htmlOptions'=>array('width'=>'100'),
            ),     
            'IdEstadoRegistro'=>array(
                'name' => 'IdEstadoRegistro',
                'htmlOptions'=>array('width'=>'80'),
                'value'=> function($model){
                    return EstadosRegistro::getNombreEstado($model->IdEstadoRegistro);
                },                 
                'filter'=> CHtml::listData(EstadosRegistro::model()->findAll(array('order'=>'NombreEstadoRegistro')), 
                                                                        'IdEstadoRegistro', 'NombreEstadoRegistro')
            ),                     
            /*array(  // muestra una columna con los botones "view", "update" y "delete"
                'class'=>'CButtonColumn',
                'htmlOptions'=>array('width'=>'120'),
            ),*/
        ),
)); ?>
</div>
</div>
