<?php
/* @var $this MuellesController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Catálogo Fechas Bloqueadas';

$this->breadcrumbs=array(
	'Fechas Bloqueadas',
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
    <h1>Catálogo Fechas Bloqueadas</h1>
</div>

<?php echo TbHtml::linkButton('Crear Registro', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('fechasBloqueadas/create'),
)); ?>     

<br />

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'fechasbloqueadas-grid',
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
        'htmlOptions'=>array('style'=>'word-wrap:break-word; width:1200px; font-family:"Times New Roman"'),
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
                'value' => function ($model){
                        return Cedi::getNombreCedi($model->IdCedi);
                },
                'filter'=> CHtml::listData(Cedi::model()->findAll(array('order'=>'NombreCEDI')), 
                                                                        'IDCEDI', 'NombreCEDI')
            ),            
            'IdMuelle'=>array(
                'name' => 'IdMuelle',
                'htmlOptions'=>array('width'=>'200'),
                'value'=> function($model){
                    return Muelles::getNombreMuelle($model->IdMuelle);
                },                
                'filter'=> CHtml::listData(Muelles::model()->findAll(array('order'=>'NombreMuelle')), 
                                                                        'IdMuelle', 'NombreMuelle')
            ),                        
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
            array(  // muestra una columna con los botones "view", "update" y "delete"
                'class'=>'CButtonColumn',
                'htmlOptions'=>array('width'=>'250'),   
            ),
        ),
)); ?>
