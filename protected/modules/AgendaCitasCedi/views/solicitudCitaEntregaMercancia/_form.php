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
$this->pageTitle = Yii::app()->name . ' - Gestionar Solictudes de Citas';
$this->breadcrumbs = array(
    'Gestionar Solicitudes de Citas',
);
?>
<div class="container">
    <?php if (Yii::app()->user->hasFlash('SolicitudCitaEntregaMercancia')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('SolicitudCitaEntregaMercancia'); ?>rttrt</strong>
        </div>
    <?php else: ?>
    
        <div class="page-header">
            
            <div class="colorBox">
                <p>Muelles Disponibles de CEDI</p>
            </div>
    
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'muelles-grid',
                    'dataProvider'=>$modelmuelles,   
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
                            'name' => 'NombreMuelle',
                            'htmlOptions'=>array('width'=>'250'),
                        ),                                     
                        array(
                            'name' => 'IdTipoMuelle',
                            'htmlOptions'=>array('width'=>'100'),
                            'value'=> function($modelmuelles){
                                return TiposMuelle::getNombreTipoMuelle($modelmuelles->IdTipoMuelle);
                            },                
                        ),             
                        array(
                            'name' => 'IdTipoFabricante',
                            'htmlOptions'=>array('width'=>'150'),
                            'value'=> function($modelmuelles){
                                return TiposFabricante::getNombreTipoFabricante($modelmuelles->IdTipoFabricante);
                            },                                
                        ), 
                        array(
                            'name' => 'IdEstadoRegistro',
                            'htmlOptions'=>array('width'=>'100'),
                            'value'=> function($modelmuelles){
                                return EstadosRegistro::getNombreEstado($modelmuelles->IdEstadoRegistro);
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
                            'template'=>'{index}',                
                            'buttons'=>array(
                                'index'=>array(
                                    'label'=>'Validar Disponibilidad',
                                    'url'=>'Yii::app()->createUrl("AgendaCitasCedi/agendaCitasCedi/index", array("IdMuelle"=>$data->IdMuelle))',
                                    'imageUrl'=>Yii::app()->request->baseUrl.'/img/AgendaCitasCedi/calendar_muelle.jpg',
                                    'options'=>array("target"=>"_blank"),
                                ),     
                            ),                                                                             
                        ),
                    ),
                )
            );
            ?>
            
        </div>

        <div class="horizontal-form" >

            <?php $form = $this->beginWidget('CActiveForm', array(
                //bootstrap.widgets.TbActiveForm
                'enableClientValidation' => true,
                //'enableAjaxValidation'=>true,
                // 'errorMessageCssClass'=>'has-error',
                'focus'=>array($modelagenda,'IdMuelle'),

                'htmlOptions' => array('class' => 'form-horizontal',
                    'role' => 'form',
                    'id' => 'solicitudcita-form',
                ),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'errorCssClass' => 'has-error',
                    'successCssClass' => 'has-success',
                    'inputContainer' => '.form-group',
                    'validateOnChange' => true
                ),
            )); ?>
                        
            <div class='row'>    
                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'IdOrdenCompra'); ?>
                    <?php echo $form->textField($model, 'IdOrdenCompra', array('class' => 'form-control', 
                                                        'disabled'=>true,
                                                        'placeholder' => '')); ?>
                    <?php echo $form->error($model, 'IdOrdenCompra'); ?>
                </div>    

                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'NombreFabricante'); ?>
                    <?php echo $form->textField($model, 'NombreFabricante', array('class' => 'form-control', 
                                                        'disabled'=>true,
                                                        'placeholder' => '')); ?>
                    <?php echo $form->error($model, 'NombreFabricante'); ?>                
                </div>    
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'NombreCEDI'); ?>
                    <?php echo $form->textField($model, 'NombreCEDI', array('class' => 'form-control', 
                                                        'disabled'=>true,
                                                        'placeholder' => '')); ?>
                    <?php echo $form->error($model, 'NombreCEDI'); ?>                
                </div>    

                <?php
                    $model->TotalOrdenCompraFormat = Yii::app()->format->formatNumber($model->TotalOrdenCompra);
                ?>        
                
                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'TotalOrdenCompraFormat'); ?>
                    <?php echo $form->textField($model, 'TotalOrdenCompraFormat', array('class' => 'form-control',
                                                        'style'=>'text-align: right',
                                                        'disabled'=>true,
                                                        'placeholder' => '')); ?>
                    <?php echo $form->error($model, 'TotalOrdenCompraFormat'); ?>                
                </div>

                <?php
                    $model->NumeroPiezasFormat = Yii::app()->format->formatNumber($model->NumeroPiezas);
                ?>        
                
                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'NumeroPiezas'); ?>
                    <?php echo $form->textField($model, 'NumeroPiezas', array('class' => 'form-control', 
                                                        'style'=>'text-align: right',
                                                        'placeholder' => 'Número de Piezas')); ?>
                    <?php echo $form->error($model, 'NumeroPiezas'); ?>                
                </div>
                
                
            </div>    
                
            <br/>
            
            <div class="row">
                <div class="col-md-12">
                    <?php echo $form->labelEx($model, 'ObservacionesSolicitudCita'); ?>
                    <?php echo $form->textArea($model, 'ObservacionesSolicitudCita', 
                            array('class' => 'form-control','rows'=>1, 'cols'=>80, 'disabled'=>true,)); ?>
                    <?php echo $form->error($model, 'ObservacionesSolicitudCita'); ?> 
                </div>    
            </div>
            
            <br />
            
            <div class='row'>    
                
                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'IdNumeroSolicitud'); ?>
                    <?php echo $form->textField($model, 'IdNumeroSolicitud', array('class' => 'form-control', 
                                                        'disabled'=>true,
                                                        'placeholder' => '')); ?>
                    <?php echo $form->error($model, 'IdNumeroSolicitud'); ?>
                </div>    
                
                <?php
                    $listamuelles = Muelles::getListaMuelles($model->IdCedi);
                ?>
                
                <div class="col-md-4">
                    <?php echo $form->labelEx($modelagenda, 'IdMuelle'); ?>
                    <?php echo $form->dropDownList($modelagenda, 'IdMuelle', $listamuelles, 
                            array('class' => 'form-control',
                                  'prompt'=>'Seleccionar Muelle ... ',
                            )
                        ); ?>
                    <?php echo $form->error($modelagenda, 'IdMuelle'); ?>
                </div>                                
                
                                                
                <div class="col-md-2">
                    <?php echo $form->labelEx($modelagenda, 'FechaSolicitudCita'); ?>
                    
                    <?php $this->widget(
                            'zii.widgets.jui.CJuiDatePicker', 
                            array(
                                'model'=>$modelagenda,
                                'attribute'=>'FechaSolicitudCita',
                                'value'=>$modelagenda->FechaSolicitudCita,
                                //additional javascript options for the date picker plugin
                                'options'=>array(
                                    'dateFormat'=>'yy-mm-dd',
                                    'showAnim'=>'slide',   //fold
                                    'debug'=>true,
                                    'showButtonPanel'=>false,
                                    'datepickerOptions'=>array(
                                            'changeMonth'=>true, 
                                            'changeYear'=>true),
                                ),
                                'htmlOptions'=>array(
                                    'class' => 'form-control',
                                    //'style'=>'height:20px;'
                                ),
                            )
                    );?>     
                    
                    <?php echo $form->error($modelagenda, 'FechaSolicitudCita'); ?>
                </div>                
                
                <div class="col-md-2">
                    <?php echo $form->labelEx($modelagenda, 'HoraSolicitudCita'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $modelagenda,
                            'attribute'=>'HoraSolicitudCita',
                            'pluginOptions'=>array(
                                'showSeconds'=>false,
                                'showMeridian'=>false,  
                                //'defaultTime'=>'00:00',
                            ),
                            'htmlOptions' => array(
                                'class' => 'form-control',
                            ),                            
                        )
                    );?>
                    <?php echo $form->error($modelagenda, 'HoraSolicitudCita'); ?>                
                    
                </div>
                
                
            </div>
            
            <br/>
            
            <div class="row">
                <div class="col-md-12">
                    <?php echo $form->labelEx($modelagenda, 'ObservacionesEvento'); ?>
                    <?php echo $form->textArea($modelagenda, 'ObservacionesEvento', 
                            array('class' => 'form-control','rows'=>2, 'cols'=>50)); ?>
                    <?php echo $form->error($modelagenda, 'ObservacionesEvento'); ?> 
                </div>    
            </div>
                            
            <br/>
            
            <div class="row">
                <div class='col-md-3'>     
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Grabar' : 'Actualizar', 
                                                array('class' => 'btn btn-primary',)); ?>
                </div>
                
            </div>    
                
            <?php $this->endWidget(); ?>
            
                
        </div><!-- form -->
    <?php endif;?>
</div>