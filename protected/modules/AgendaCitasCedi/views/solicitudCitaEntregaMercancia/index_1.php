<style type="text/css">
.colorBox {
        font-weight: 900;
        font-family: "Times New Roman";
	border:1px solid #000000;
	background-color:#B2D1F0;
        font-size: x-large;
        text-align: center;
}
     
</style>

<?php
/* @var $this SolicitudCitaEntregaMercanciaController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Gestionar Solicitudes de Citas';

$this->breadcrumbs=array(
	'Gestionar Solicitudes de Citas',
);

?>

<title><?php echo Yii::app()->controller->module->getName() ." >> " . $this->pageTitle ?></title>

<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'htmlOptions'=>array ('class'=>'breadcrumb'),
));
?>

<div class="colorBox">
    <p>Solicitudes de Citas Para Entrega de Mercancia</p>
</div>


<?php   //zii.widgets.grid.CGridView
    $this->widget('application.extensions.LiveGridView.RefreshGridView', array(
        'id'=>'ordenescompra-grid',
        'updatingTime'=>6000, // 6 sec
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
        'rowCssClassExpression'=>'($data->IdEstadoSolicitudCita==0)?"especial":"normal"',
        'columns'=>array(
            array(
                'name' => 'IdNumeroSolicitud',
                'htmlOptions'=>array('width'=>'50'),
            ),                            
            array(
                'name' => 'IdOrdenCompra',
                'htmlOptions'=>array('width'=>'50'),
            ),                
            'IdFabricante'=>array(
                'name' => 'IdFabricante',
                'htmlOptions'=>array('width'=>'250'),
                'value' => '$data->fabricante->Nombre',
                'filter'=> CHtml::listData(Fabricante::model()->findAll(array('order'=>'Nombre')), 
                                                                        'IdFabricante', 'Nombre')
            ),
            'IdTransportador'=>array(
                'name' => 'IdTransportador',
                'header' => 'Transportador',
                'htmlOptions'=>array('width'=>'250'),
                'value' => function ($model){
                        return Transportador::getNombreTransportador($model->IdTransportador);
                }
            ),            
            'IdCedi'=>array(
                'name' => 'IdCedi',
                'htmlOptions'=>array('width'=>'150'),
                'value' => '$data->cedi->NombreCEDI',
                'filter'=> CHtml::listData(Cedi::model()->findAll(array('order'=>'NombreCEDI')), 
                                                                        'IDCEDI', 'NombreCEDI')
            ),             
            array(       
                'name' => 'TotalOrdenCompra',
                'htmlOptions'=>array('align'=>'right', 'width'=>'100'),
                'value' => function ($model){
                        return Yii::app()->format->formatNumber($model->TotalOrdenCompra);
                }
            ), 
            array(       
                'name' => 'NumeroPiezas',
                'htmlOptions'=>array('align'=>'right', 'width'=>'100'),
                'value' => function ($model){
                        return Yii::app()->format->formatNumber($model->NumeroPiezas);
                }
            ), 
            'FechaSolicitudCita',                    
            array(        
                'name' => 'HoraSolicitudCita',
                'header' => 'Hora',
                'htmlOptions'=>array('width'=>'60'),  
            ),                       
            'IdEstadoSolicitudCita'=>array(
                'name' => 'IdEstadoSolicitudCita',
                'htmlOptions'=>array('width'=>'250'),
                'value' => '$data->estadosolicitud->NombreEstadoSolicitudCita',
                'filter'=> CHtml::listData(EstadosSolicitudCita::model()->findAll(array('order'=>'NombreEstadoSolicitudCita')), 
                                                                        'IdEstadoSolicitudCita', 'NombreEstadoSolicitudCita')
            ),    
            array(  // muestra una columna con los botones "view", "update" y "delete"
                'class'=>'CButtonColumn',
                'template'=>'{update}',                
                'buttons'=>array(
                    'update'=>array(
                        'label'=>'Confirmar Cita',
                        'imageUrl'=>Yii::app()->request->baseUrl.'/img/AgendaCitasCedi/solicitarCita.jpg',
                    ),     
                ),                     
                
            ),
        ),
)); 

?>