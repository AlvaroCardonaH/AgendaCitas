<?php
/* @var $this TiposEntregaController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Catálogo Tipos Entrega';

$this->breadcrumbs=array(
	'Tipos Entrega',
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
    <h1>Catálogo Tipos Entrega </h1>
</div>

<?php echo TbHtml::linkButton('Crear Registro', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('TiposEntrega/create'),
)); ?>     

<br />

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'tipos-muelles-grid',
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
