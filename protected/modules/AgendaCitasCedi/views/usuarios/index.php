<?php
/* @var $this UsuariosController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Catálogo Usuarios';

$this->breadcrumbs=array(
	'Usuarios',
);

?>

<title><?php echo Yii::app()->controller->module->getName() ." >> " . $this->pageTitle ?></title>

<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'htmlOptions'=>array ('class'=>'breadcrumb'),
));
?>

<div class="page-header">
    <h1>Catálogo Usuarios </h1>
</div>

<?php echo TbHtml::linkButton('Crear Registro', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('usuarios/create'),
)); ?>     

<br /><br />

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'usuarios-grid',
	'dataProvider'=>$model->search(),        
	'filter'=>$model,
        'summaryText' => "Mostrando {start} – {end} de {count} resultados",
        'pager'=>array(
            'header' => 'Ir a la pagina:',
            'firstPageLabel' => '< <',
            'prevPageLabel' => 'Anterior',
            'nextPageLabel' => 'Siguiente',
            'lastPageLabel' => '>>',
        ),    
        'htmlOptions'=>array('style'=>'word-wrap:break-word; width:1250px; font-family:"Times New Roman"'),
        'columns'=>array(
            array(
                'name' => 'IdUsuario',
                'htmlOptions'=>array('width'=>'50'),
            ),                
            array(
                'name' => 'username',
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
                'name' => 'EmailUsuario',
                'htmlOptions'=>array('width'=>'100'),
            ),                 
            'IdRol'=>array(
                'name' => 'IdRol',
                'htmlOptions'=>array('width'=>'100'),
                'value'=> function($model){
                    return Roles::getNombreRol($model->IdRol);
                },                 
                'filter'=> CHtml::listData(Roles::model()->findAll(array('order'=>'NombreRol')), 
                                                                        'IdRol', 'NombreRol')
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
            array(  // muestra una columna con los botones "view", "update" y "delete"
                'class'=>'CButtonColumn',
                'htmlOptions'=>array('width'=>'120'),
            ),
        ),
)); ?>
