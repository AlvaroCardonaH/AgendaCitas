
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



$this->breadcrumbs=array(
	'Gestionar Solicitudes de Citas',
);
//$this->menu=$this->verPermisosMenuOperaciones();
?>


<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'htmlOptions'=>array ('class'=>'breadcrumb'),
));
?>


<div class="panel panel-primary">
    <div class="panel-heading">        
        <h3 class="panel-title">Solicitudes de Citas Para Entrega de Mercancia</h3>
    </div>
<div class=" panel-body">
<?php   //zii.widgets.grid.CGridView
    $this->widget('application.extensions.LiveGridView.RefreshGridView', array(
        'id'=>'ordenescompra-grid',
        'updatingTime'=>6000, // 6 sec
	'dataProvider'=>$model->search(),        
	'filter'=>$model,
        'htmlOptions'=>array('style'=>'word-wrap:break-word;"'),
        'rowCssClassExpression'=>'($data->IdEstadoSolicitudCita==0)?"especial":"normal"',
        'columns'=>array(
            array(
                'name' => 'IdNumeroSolicitud',
                'htmlOptions'=>array('width'=>'50'),
            ),                            
           /* array(
                'name' => 'IdOrdenCompra',
                'htmlOptions'=>array('width'=>'50'),
            ),*/                
            'IdFabricante'=>array(
                'name' => 'IdFabricante',
                'htmlOptions'=>array('width'=>'250'),
                'value' => '$data->fabricante->Nombre',
                'filter'=> CHtml::listData(Fabricante::model()->findAll(array('order'=>'Nombre')), 
                                                                        'IdFabricante', 'Nombre')
            ),
            /*'IdTransportador'=>array(
                'name' => 'IdTransportador',
                'header' => 'Transportador',
                'htmlOptions'=>array('width'=>'250'),
                'value' => function ($model){
                        return Transportador::getNombreTransportador($model->IdTransportador);
                }
            ), */           
            'IdCedi'=>array(
                'name' => 'IdCedi',
                'htmlOptions'=>array('width'=>'150'),
                'value' => '$data->cedi->NombreCEDI',
                'filter'=> CHtml::listData(Cedi::model()->findAll(array('order'=>'NombreCEDI')), 
                                                                        'IDCEDI', 'NombreCEDI')
            ),             
            /*array(       
                'name' => 'TotalOrdenCompra',
                'htmlOptions'=>array('align'=>'right', 'width'=>'100'),
                'value' => function ($model){
                        return Yii::app()->format->formatNumber($model->TotalOrdenCompra);
                }
            ), */
            array(       
                'header' => 'Total Orden Compra',
                'htmlOptions'=>array('align'=>'right', 'width'=>'100'),
                'value' =>'$data->getTotalOrdenCompra($data->IdNumeroSolicitud)'
                
            ),        
            /*array(       
                'name' => 'NumeroPiezas',
                'htmlOptions'=>array('align'=>'right', 'width'=>'100'),
                'value' => function ($model){
                        return Yii::app()->format->formatNumber($model->NumeroPiezas);
                }
            ),*/
            array(       
                'header' => 'Numero Piezas',
                'htmlOptions'=>array('align'=>'right', 'width'=>'100'),
                'value' =>'$data->getTotalNumeroPiezas($data->IdNumeroSolicitud)'
                
            ),         
            'FechaSolicitudCita',                    
            array(        
                'name' => 'HoraSolicitudCita',
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
                'deleteConfirmation'=>'Desea cancelar esta cita',
                'htmlOptions'=>array('width'=>'150'),
                'template'=>'{update}{reprogramar}{delete}',                
                'buttons'=>array(
                    'update'=>array(
                        'label'=>'Confirmar Cita',
                        'imageUrl'=>Yii::app()->request->baseUrl.'/img/AgendaCitasCedi/solicitarCita.jpg',
                    ),     
                    'reprogramar'=>array(
                        'label'=>'Reprogramar Cita',
                        'url'=>'Yii::app()->controller->createUrl("reprogramar",array("id"=>$data->IdNumeroSolicitud))',
                        'imageUrl'=>Yii::app()->request->baseUrl.'/img/AgendaCitasCedi/reprogramar_cita.jpg',
                    ),                         
                    'delete'=>array(
                        'label'=>'Cancelar Cita',
                        'imageUrl'=>Yii::app()->request->baseUrl.'/img/AgendaCitasCedi/cancelar_cita.jpg',
                    ),     
                    
                ),                     
                
            ),
        ),
)); 

 ?>

