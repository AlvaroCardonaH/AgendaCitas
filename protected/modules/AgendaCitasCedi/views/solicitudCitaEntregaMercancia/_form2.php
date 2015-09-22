<?php
        Yii::app()->clientScript->registerScript(
        'testjs',
                
        '$( "#SolicitudesCitaDetalle_NuevoNumeroPiezas" ).keyup(function() {
        piezasiniciales = $("#SolicitudesCitaDetalle_NumeroPiezasIniciales").val(); 
        
        resta = piezasiniciales - eval($("#SolicitudesCitaDetalle_NuevoNumeroPiezas").val());
       
        $("#SolicitudesCitaDetalle_NumeroPiezas").val(resta);
        
        if($("#SolicitudesCitaDetalle_NumeroPiezas").val() == "NaN")
        {
            $("#SolicitudesCitaDetalle_NumeroPiezas").val(piezasiniciales);
        }
        
        if(eval($("#SolicitudesCitaDetalle_NuevoNumeroPiezas").val()) >= piezasiniciales)
        {
            alert("El nuevo valor de piezas no debe ser mayor o igual al numero original de piezas");
            $("#SolicitudesCitaDetalle_NuevoNumeroPiezas").val("");
            $("#SolicitudesCitaDetalle_NumeroPiezas").val(piezasiniciales);
        }
        
        });
        ',
        CClientScript::POS_READY
        ); 
?>
<div class="panel panel-primary">
    <div class="panel-heading">        
        <h3 class="panel-title">Partir Orden</h3>
    </div>
<div class=" panel-body">
    
    <div class="page-header">
             <h4><p align="left">Datos Actuales de la Orden: <?= $modeldetalle->IdOrdenCompra; ?></p></h4>
            
    </div> 
    <div class="horizontal-form" >

            <?php $form = $this->beginWidget('CActiveForm', array(
                //bootstrap.widgets.TbActiveForm
                'enableClientValidation' => true,
                //'enableAjaxValidation'=>true,
                // 'errorMessageCssClass'=>'has-error',
                //'focus'=>array($modelagenda,'IdMuelle'),

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
            
            <?php
                    $modeldetalle->NumeroPiezasIniciales = $modeldetalle->NumeroPiezas;
            ?>  
            
            <?php echo $form->hiddenField($modeldetalle, 'NumeroPiezasIniciales'); ?>
            
                      
            <div class="col-md-2">
                    <?php echo $form->labelEx($modeldetalle, 'NumeroPiezas'); ?>
                    <?php echo $form->textField($modeldetalle, 'NumeroPiezas', array('class' => 'form-control', 
                                                        'disabled'=>true,
                                                        'placeholder' => '')); ?>
                    <?php echo $form->error($modeldetalle, 'NumeroPiezas'); ?>                
            </div> 
            
            
            
            <div class="col-md-2">
                    
                
                    <?php echo $form->labelEx($modelsolicitud, 'FechaSolicitudCita'); ?>
                    
                    <?php $this->widget(
                            'zii.widgets.jui.CJuiDatePicker', 
                            array(
                                'model'=>$modelsolicitud,
                                'attribute'=>'FechaSolicitudCita',
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
                    
                    <?php echo $form->error($modelsolicitud, 'FechaSolicitudCita'); ?>
            </div>
            
            <div class="col-md-2">
                   <?php echo $form->labelEx($modelsolicitud, 'HoraSolicitudCita'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $modelsolicitud,
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
                    <?php echo $form->error($modelsolicitud, 'HoraSolicitudCita'); ?>               
            </div>
            
                <?php
                    $listamuelles = Muelles::getListaMuelles($modelsolicitud->IdCedi);
                ?>
                
                <div class="col-md-5">
                    <?php echo $form->labelEx($modelagenda, 'IdMuelle'); ?>
                    <?php echo $form->dropDownList($modelagenda, 'IdMuelle', $listamuelles, 
                            array('class' => 'form-control',
                                  'prompt'=>'Seleccionar Muelle ... ',
                            )
                        ); ?>
                    <?php echo $form->error($modelagenda, 'IdMuelle'); ?>
                </div>    
        </div>
        
        <div class="row">
                <div class="col-md-11">
                    <?php echo $form->labelEx($modelagenda, 'ObservacionesEvento'); ?>
                    <?php echo $form->textArea($modelagenda, 'ObservacionesEvento', 
                            array('class' => 'form-control','rows'=>1, 'cols'=>50)); ?>
                    <?php echo $form->error($modelagenda, 'ObservacionesEvento'); ?> 
                </div>    
            </div>
        
            <div class="page-header">
                 <h4><p align="left">Nuevos Datos de la Orden Partida:</p></h4>

            </div> 
        
        <div class='row'>    
            <div class="col-md-2">
                    <?php echo $form->labelEx($modeldetalle, 'NuevoNumeroPiezas'); ?>
                    <?php echo $form->textField($modeldetalle, 'NuevoNumeroPiezas', array('class' => 'form-control', 
                                                        
                                                        )); ?>
                    <?php echo $form->error($modeldetalle, 'NuevoNumeroPiezas'); ?>                
            </div> 
            
            
            
            <div class="col-md-2">
                    <?php echo $form->labelEx($modelsolicitud, 'FechaSolicitudCita'); ?>
                    
                    <?php $this->widget(
                            'zii.widgets.jui.CJuiDatePicker', 
                            array(
                                'model'=>$modelsolicitud,
                                'attribute'=>'NuevaFechaSolicitudCita',
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
                    
                    <?php echo $form->error($modelsolicitud, 'NuevaFechaSolicitudCita'); ?>             
            </div>
            
            <div class="col-md-2">
                    <?php echo $form->labelEx($modelsolicitud, 'HoraSolicitudCita'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $modelsolicitud,
                            'attribute'=>'NuevaHoraSolicitudCita',
                            'pluginOptions'=>array(
                                'showSeconds'=>false,
                                'showMeridian'=>false,  
                                'defaultTime'=>false,
                            ),
                            'htmlOptions' => array(
                                'class' => 'form-control',
                            ),                            
                        )
                    );?>
                    <?php echo $form->error($modelsolicitud, 'NuevaHoraSolicitudCita'); ?>              
            </div>
            
            <?php
                    $listamuelles = Muelles::getListaMuelles($modelsolicitud->IdCedi);
            ?>
                
                <div class="col-md-5">
                    <?php echo $form->labelEx($modelagenda, 'IdMuelle'); ?>
                    <?php echo $form->dropDownList($modelagenda, 'NuevoIdMuelle', $listamuelles, 
                            array('class' => 'form-control',
                                  'prompt'=>'Seleccionar Muelle ... ',
                            )
                        ); ?>
                    <?php echo $form->error($modelagenda, 'NuevoIdMuelle'); ?>
                </div>    
        </div>
        <br>
        <div class="row">
                <p align ='center'>
                    <?php echo CHtml::submitButton($modeldetalle->isNewRecord ? 'Crear' : 'Partir y Agendar Solicitud', 
                                                array('class' => 'btn btn-primary')); ?>
                </p>
                
            </div> 
            <?php $this->endWidget(); ?>
    </div>
    
</div>
</div>