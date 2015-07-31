<?php
/* @var $this MuellesController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Catálogo Muelles';

$this->breadcrumbs=array(
	'Muelles',
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
    <h1>Catálogo Muelles</h1>
</div>

<?php echo TbHtml::linkButton('Crear Registro', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('muelles/create'),
)); ?>     

<br />

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'muelles-grid',
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
        'htmlOptions'=>array('style'=>'word-wrap:break-word; width:1000px; font-family:"Times New Roman"'),
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
