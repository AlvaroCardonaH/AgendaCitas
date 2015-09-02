<div class="panel panel-primary">
    <div class="panel-heading">        
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Crear Fecha Bloqueada' : 'Actualizar Fecha Bloqueada' ?></h3>
    </div>
<div class=" panel-body">
<div class="container">
    <?php if (Yii::app()->user->hasFlash('FechasBloqueadas')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('FechasBloqueadas'); ?>rttrt</strong>
        </div>
    <?php else: ?>
        
    
        <div class="horizontal-form" >

            <?php $form = $this->beginWidget('CActiveForm', array(
                //bootstrap.widgets.TbActiveForm
                'enableClientValidation' => true,
                //'enableAjaxValidation'=>true,
                // 'errorMessageCssClass'=>'has-error',
                'focus'=>array($model,'IdCedi'),

                'htmlOptions' => array('class' => 'form-horizontal',
                    'role' => 'form',
                    'id' => 'fechasbloqueadas-form',
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
                    <?php echo $form->labelEx($model, 'IdFechaBloqueada'); ?>
                    <?php echo $form->textField($model, 'IdFechaBloqueada', array('class' => 'form-control', 
                                                        'disabled'=>true,
                                                        'placeholder' => '')); ?>
                    <?php echo $form->error($model, 'IdFechaBloqueada'); ?>
                </div>    
                
                <?php
                    $listacedis = Cedi::listData();
                ?>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'IdCedi'); ?>
                    <?php echo $form->dropDownList($model, 'IdCedi', $listacedis, 
                            array('class' => 'form-control','prompt'=>'Seleccionar Cedi ... ')); ?>
                    <?php echo $form->error($model, 'IdCedi'); ?>                
                </div>    

                <?php
                    $listamuelles = Muelles::listData();
                ?>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'IdMuelle'); ?>
                    <?php echo $form->dropDownList($model, 'IdMuelle', $listamuelles, 
                            array('class' => 'form-control','prompt'=>'Seleccionar Muelle ... ')); ?>
                    <?php echo $form->error($model, 'IdMuelle'); ?>                
                </div>    
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'Fecha'); ?>
                    
                    <?php $this->widget(
                            'zii.widgets.jui.CJuiDatePicker', 
                            array(
                                'model'=>$model,
                                'attribute'=>'Fecha',
                                'value'=>$model->Fecha,
                                //additional javascript options for the date picker plugin
                                'options'=>array(
                                'dateFormat'=>'yy-mm-dd',
                                'showAnim'=>'fold',
                                'debug'=>true,
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
                    
                    <?php echo $form->error($model, 'Fecha'); ?>
                </div>
            </div>    
                
            <br/>
            
            <div class='row'>    
                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'HoraInicio'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $model,
                            'attribute'=>'HoraInicio',
                            'pluginOptions'=>array(
                                'showSeconds'=>false,
                                'showMeridian'=>false,  
                                'defaultTime'=>'00:00',
                            ),
                            'htmlOptions' => array(
                                'class' => 'form-control',
                            ),                            
                        )
                    );?>
                    <?php echo $form->error($model, 'HoraInicio'); ?>                
                    
                </div>
                
                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'HoraFinal'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $model,
                            'attribute'=>'HoraFinal',
                            'pluginOptions'=>array(
                                'showSeconds'=>false,
                                'showMeridian'=>false,  
                                'defaultTime'=>'00:00',
                            ),
                            'htmlOptions' => array(
                                'class' => 'form-control',
                            ),                            
                        )
                    );?>
                    <?php echo $form->error($model, 'HoraFinal'); ?>                
                    
                </div>
                
                <?php
                    $listamotivos = MotivosBloqueoFecha::listData();
                ?>
                
                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'IdMotivoBloqueo'); ?>
                    <?php echo $form->dropDownList($model, 'IdMotivoBloqueo', $listamotivos, 
                            array('class' => 'form-control','prompt'=>'Seleccionar Motivo ... ')); ?>
                    <?php echo $form->error($model, 'IdMotivoBloqueo'); ?>                
                </div>    
                
            </div>
            
            <br/>
            
            <div class="row">
                <div class="col-md-12">
                    <?php echo $form->labelEx($model, 'ObservacionesBloqueo'); ?>
                    <?php echo $form->textArea($model, 'ObservacionesBloqueo', 
                            array('class' => 'form-control','rows'=>2, 'cols'=>50)); ?>
                    <?php echo $form->error($model, 'ObservacionesBloqueo'); ?> 
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
    </div>
</div>