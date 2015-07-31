<style type="text/css">
.colorBox {
        font-weight: 900;
        font-family: "Times New Roman";
	border:1px solid #000000;
	background-color:#B2D1F0;
        font-size: x-large;
        text-align: center;
}

.boton {
    width: 120px; 
    height: 60px; 
    padding-bottom: 2px; 
    -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;
}
     
</style>

<?php 
Yii::app()->clientScript->registerScript('get_user_info', "
var getUserInfo = function(id){
        var numeroOrdenCompra = $.fn.yiiGridView.getSelection('ordenescompra-grid');
        if(isNaN(numeroOrdenCompra))
                return;
        data = {
                uid: numeroOrdenCompra
        }
        $.ajax({
                data: data,
                cache: false,
                success: function(html){
                        $.fn.yiiGridView.update('solicitudes-grid',
                                        { data: numeroOrdenCompra});
                }
        });
};
",CClientScript::POS_END);
?>


<?php
/* @var $this ConfiguracionEntregasProveedorCediController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Solicitar Cita Entrega Mercancia';

$this->breadcrumbs=array(
	'Solicitar Cita Entrega Mercancia',
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
    <p>Ordenes de Compra</p>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'ordenescompra-grid',
        'selectableRows'=>1,
        'selectionChanged'=>'js:getUserInfo',	// via 1: para mostrar detalles al seleccionar
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
        'rowCssClassExpression'=>'($data->IdEstadoOrdenCompra==0)?"especial":"normal"',
        'columns'=>array(
            array(
                'name' => 'NumeroOrdenCompra',
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
            'FechaTentativaEntrega',
            'FechaRegistroOrdenCompra',
            array(       
                'name' => 'TotalOrdenCompra',
                'htmlOptions'=>array('align'=>'right', 'width'=>'100'),
                'value' => function ($model){
                        return Yii::app()->format->formatNumber($model->TotalOrdenCompra);
                }
            ), 
            array(        
                'name' => 'DiaSemana',
                'header' => 'Día Fijo',
                'htmlOptions'=>array('width'=>'100'), 
                'value'=> function ($model){
                    switch($model->DiaSemana){
                        case null: return '';break;
                        case 0 : return 'Domingo'; break;
                        case 1 : return 'Lunes'; break;
                        case 2 : return 'Martes'; break;
                        case 3 : return 'Miercoles'; break;
                        case 4 : return 'Jueves'; break;
                        case 5 : return 'Viernes'; break;
                        case 6 : return 'Sabado'; break;
                    }
                }
            ),                            
            array(        
                'name' => 'HoraDia',
                'header' => 'Hora Fija',
                'htmlOptions'=>array('width'=>'60'),  
            ),                       
            /*array(        
                'name' => 'FechaSolicitudCita',
                'header' => 'Fecha Solicitud',
                'htmlOptions'=>array('width'=>'60'),  
            ),*/       
            'IdEstadoOrdenCompra'=>array(
                'name' => 'IdEstadoOrdenCompra',
                'htmlOptions'=>array('width'=>'250'),
                'value' => '$data->estadoorden->NombreEstadoOrdenCompra',
                'filter'=> CHtml::listData(EstadosOrdenCompra::model()->findAll(array('order'=>'NombreEstadoOrdenCompra')), 
                                                                        'IdEstadoOrdenCompra', 'NombreEstadoOrdenCompra')
            ),    
            array(  // muestra una columna con los botones "view", "update" y "delete"
                'class'=>'CButtonColumn',
                'template'=>'{update}',                
                'buttons'=>array(
                    'update'=>array(
                        'label'=>'Solicitar Cita',
                        'imageUrl'=>Yii::app()->request->baseUrl.'/img/AgendaCitasCedi/solicitarCita.jpg',
                    ),     
                ),                     
                
            ),
        ),
)); 

?>


<div class="colorBox">
    <p>Solicitudes de Cita Para Entrega de Mercancia</p>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'solicitudes-grid',
    'dataProvider'=>$modelsolicitudcita,    
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
            'name' => 'IdOrdenCompra',
            'htmlOptions'=>array('width'=>'50'),
        ),                
        array(
            'name' => 'IdNumeroSolicitud',
            'htmlOptions'=>array('width'=>'50'),
        ),                
        array(
            'name' => 'FechaSolicitudCita',
            'htmlOptions'=>array('width'=>'50'),
        ),                
        array(
            'name' => 'HoraSolicitudCita',
            'htmlOptions'=>array('width'=>'50'),
        ),
        array(       
            'name' => 'NumeroPiezas',
            'htmlOptions'=>array('align'=>'right', 'width'=>'100'),
            'value' => function ($modelsolicitudcita){
                return Yii::app()->format->formatNumber($modelsolicitudcita->NumeroPiezas);
            }
        ),         
        'IdConductor'=>array(
            'name' => 'IdConductor',
            'header' => 'Conductor',
            'htmlOptions'=>array('width'=>'350'),
            'value' => function ($modelsolicitudcita){
                return Conductor::getNombreConductor($modelsolicitudcita->IdConductor);
            }
        ),                    
        array(
            'name' => 'ObservacionesSolicitudCita',
            'htmlOptions'=>array('width'=>'600'),
        ),
        'IdEstadoSolicitudCita'=>array(
            'name' => 'IdEstadoSolicitudCita',
            'htmlOptions'=>array('width'=>'250'),
            'value' => '$data->estadosolicitud->NombreEstadoSolicitudCita',
            'filter'=> CHtml::listData(EstadosSolicitudCita::model()->findAll(array('order'=>'NombreEstadoSolicitudCita')), 
                                                                        'IdEstadoSolicitudCita', 'NombreEstadoSolicitudCita')
        ),                    
    ),
));

?>
