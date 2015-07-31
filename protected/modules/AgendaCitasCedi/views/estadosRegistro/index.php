<?php
/* @var $this EstadosRegistroController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Catálogo Estados Registro';

$this->breadcrumbs=array(
	'Estado Registros',
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
    <h1>Catalogo Estados de Registros </h1>
</div>

<?php echo TbHtml::linkButton('Crear Registro', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('EstadosRegistro/create'),
)); ?>     

<br /><br />

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'estados-registro-grid',
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
        'columns'=>array(
            array(
                'name' => 'IdEstadoRegistro',
                'htmlOptions'=>array('width'=>'100'),
            ),                
            array(
                'name' => 'NombreEstadoRegistro',
                'htmlOptions'=>array('width'=>'300'),
            ), 
            array(  // muestra una columna con los botones "view", "update" y "delete"
            'class'=>'CButtonColumn',
            ),
            array('name'=>'campo1','filter'=>false, 'header'=>''),
            array('name'=>'campo1','filter'=>false, 'header'=>''),
        ),
)); ?>
