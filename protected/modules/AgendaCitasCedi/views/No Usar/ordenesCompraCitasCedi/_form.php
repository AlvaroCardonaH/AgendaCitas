<?php
$this->pageTitle = Yii::app()->name . ' - Registrar Solictud Cita';
$this->breadcrumbs = array(
    'Registrar Solicitud Cita',
);
?>
<div class="container">
    <?php if (Yii::app()->user->hasFlash('OrdenesCompraCitasCedi')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('OrdenesCompraCitasCedi'); ?>rttrt</strong>
        </div>
    <?php else: ?>
        <div class="page-header">
            <h1>Registrar Solicitud Cita</h1>
        </div>
    
        <div class="horizontal-form" >

            <?php $form = $this->beginWidget('CActiveForm', array(
                //bootstrap.widgets.TbActiveForm
                'enableClientValidation' => true,
                //'enableAjaxValidation'=>true,
                // 'errorMessageCssClass'=>'has-error',
                'focus'=>array($model,'NumeroPiezas'),

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
                        
            <?php echo TbHtml::em('Campos con * son obligatorios.', array('color' => TbHtml::TEXT_COLOR_ERROR)); ?>

            <?php echo $form->errorSummary($model); ?>

            <div class='row'>    
                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'NumeroOrdenCompra'); ?>
                    <?php echo $form->textField($model, 'NumeroOrdenCompra', array('class' => 'form-control', 
                                                        'disabled'=>true,
                                                        'placeholder' => '')); ?>
                    <?php echo $form->error($model, 'NumeroOrdenCompra'); ?>
                </div>    

                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'NombreFabricante'); ?>
                    <?php echo $form->textField($model, 'NombreFabricante', array('class' => 'form-control', 
                                                        'disabled'=>true,
                                                        'placeholder' => '')); ?>
                    <?php echo $form->error($model, 'NombreFabricante'); ?>                
                </div>    
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'NombreCedi'); ?>
                    <?php echo $form->textField($model, 'NombreCedi', array('class' => 'form-control', 
                                                        'disabled'=>true,
                                                        'placeholder' => '')); ?>
                    <?php echo $form->error($model, 'NombreCedi'); ?>                
                </div>    

                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'NombreTransportador'); ?>
                    <?php echo $form->textField($model, 'NombreTransportador', array('class' => 'form-control', 
                                                        'disabled'=>true,
                                                        'placeholder' => '')); ?>
                    <?php echo $form->error($model, 'NombreTransportador'); ?>                
                </div>    
                
            </div>    
                
            <br/>
            
            <div class='row'>    
                
                <div class="col-md-2">
                    <?php echo $form->labelEx($modelsolicitudcita, 'FechaSolicitudCita'); ?>
                    
                    <?php $this->widget(
                            'zii.widgets.jui.CJuiDatePicker', 
                            array(
                                'model'=>$modelsolicitudcita,
                                'attribute'=>'FechaSolicitudCita',
                                'value'=>$modelsolicitudcita->FechaSolicitudCita,
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
                    
                    <?php echo $form->error($modelsolicitudcita, 'FechaSolicitudCita'); ?>
                </div>                
                
                <div class="col-md-2">
                    <?php echo $form->labelEx($modelsolicitudcita, 'HoraSolicitudCita'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $modelsolicitudcita,
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
                    <?php echo $form->error($modelsolicitudcita, 'HoraSolicitudCita'); ?>                
                    
                </div>

                <div class="col-md-2">
                    <?php echo $form->labelEx($modelsolicitudcita, 'IdCedi'); ?>
                    <?php echo $form->textField($modelsolicitudcita, 'IdCedi', array('class' => 'form-control', 
                                                        'disabled'=>true,
                                                        'placeholder' => 'ID CEDI')); ?>
                    <?php echo $form->error($modelsolicitudcita, 'IdCedi'); ?>                
                </div>
                
                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'NumeroPiezas'); ?>
                    <?php echo $form->textField($model, 'NumeroPiezas', array('class' => 'form-control', 
                                                        'placeholder' => 'Número de Piezas')); ?>
                    <?php echo $form->error($model, 'NumeroPiezas'); ?>                
                </div>
                
                <?php
                    $listaConductores = Conductor::getConductores();
                ?>
                
                <div class="col-md-4">
                    <?php echo $form->labelEx($modelsolicitudcita, 'IdConductor'); ?>
                    <?php echo $form->dropDownList($modelsolicitudcita, 'IdConductor', $listaConductores, array('class' => 'form-control','prompt'=>'Seleccionar Conductor ... ')); ?>
                    <?php echo $form->error($modelsolicitudcita, 'IdConductor'); ?>
                </div>                
                
            </div>
            
            <br/>
            
            <div class="row">
                <div class="col-md-12">
                    <?php echo $form->labelEx($modelsolicitudcita, 'ObservacionesSolicitudCita'); ?>
                    <?php echo $form->textArea($modelsolicitudcita, 'ObservacionesSolicitudCita', 
                            array('class' => 'form-control','rows'=>2, 'cols'=>50)); ?>
                    <?php echo $form->error($modelsolicitudcita, 'ObservacionesSolicitudCita'); ?> 
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