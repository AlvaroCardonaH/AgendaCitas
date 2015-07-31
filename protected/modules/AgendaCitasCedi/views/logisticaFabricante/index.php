<?php
/* @var $this ConfiguracionEntregasProveedorCediController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Logística Entrega de Mercancía';

$this->breadcrumbs=array(
	'Logística de Entrega de Mercancía',
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
    <h1>Logística Entrega de Mercancía</h1>
</div>

<?php echo TbHtml::linkButton('Crear Registro', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('logisticaFabricante/create'),
)); ?>     

<br />

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'configuracion-grid',
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
        'htmlOptions'=>array('style'=>'word-wrap:break-word; width:1300px; font-family:"Times New Roman"'),
        'columns'=>array(
            array(
                'name' => 'IdLogisticaFabricante',
                'htmlOptions'=>array('width'=>'50'),
            ),                
            'IdFabricante'=>array(
                'name' => 'IdFabricante',
                'htmlOptions'=>array('width'=>'250'),
                'value' => '$data->fabricante->Nombre',
                'filter'=> CHtml::listData(Fabricante::model()->findAll(array('order'=>'Nombre')), 
                                                                        'IdFabricante', 'Nombre')
            ),
            'IdCedi'=>array(
                'name' => 'IdCedi',
                'htmlOptions'=>array('width'=>'250'),
                'value' => '$data->cedi->NombreCEDI',
                'filter'=> CHtml::listData(Cedi::model()->findAll(array('order'=>'NombreCEDI')), 
                                                                        'IDCEDI', 'NombreCEDI')
            ),
            'IdTransportador'=>array(
                'name' => 'IdTransportador',
                'htmlOptions'=>array('width'=>'250'),
                'value' => function ($model){
                    return Transportador::getNombreTransportador($model->IdTransportador);
                },
                'filter'=> CHtml::listData(Transportador::model()->findAll(array('order'=>'Nombre')), 
                                                                        'IdTransportador', 'Nombre'),
            ),                 
            'IdUsuarioResponsable'=>array(
                'name' => 'IdUsuarioResponsable',
                'htmlOptions'=>array('width'=>'300'),
                'value' => function ($model){
                    return Usuarios::getNombreUsuario($model->IdUsuarioResponsable);
                },
                //'filter'=> CHtml::listData(Transportador::model()->findAll(array('order'=>'Nombre')), 
                //                                                        'IdTransportador', 'Nombre'),
                'filter'=> Usuarios::getUsuarios(2),        
            ),                                         
            array(
                'name' => 'ObservacionesLogistica',
                'htmlOptions'=>array('width'=>'400'),
            ),             
            array(  // muestra una columna con los botones "view", "update" y "delete"
            'class'=>'CButtonColumn',
            'htmlOptions'=>array('width'=>'150'),    
            ),
        ),
)); ?>
