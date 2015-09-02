<div class="panel panel-primary">
    <div class="panel-heading">        
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Crear Conductor' : 'Actualizar Conductor' ?></h3>
    </div>
<div class=" panel-body">
    
<div class="container">
    <?php if (Yii::app()->user->hasFlash('Conductor')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('Conductor'); ?>rttrt</strong>
        </div>
    <?php else: ?>
       
    
        <div class="horizontal-form" >
                
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id' => 'inlineForm',
                'enableClientValidation' => true,
                'focus'=>array($model,'IdEstadoRegistro'),
                //'enableAjaxValidation'=>true,
                // 'errorMessageCssClass'=>'has-error',

                'htmlOptions' => array('class' => 'form-vertical',
                    'role' => 'form',
                    'id' => 'conductor-form',
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
                <div class="col-md-3">
                <?php echo $form->labelEx($model, 'IdConductor'); ?>
                <?php echo $form->textField($model, 'IdConductor', array('class' => 'form-control', 'disabled'=>true,'placeholder' => '')); ?>
                <?php echo $form->error($model, 'IdConductor'); ?>
                </div>    
                
                <?php
                    $listaEstadosRegistro = EstadosRegistro::getListaEstadosRegistro();
                ?>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'IdEstadoRegistro'); ?>
                    <?php echo $form->dropDownList($model, 'IdEstadoRegistro', $listaEstadosRegistro, array('class' => 'form-control','prompt'=>'Seleccionar Condición ... ')); ?>
                    <?php echo $form->error($model, 'IdEstadoRegistro'); ?>
                </div>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'NumeroDocumento'); ?>
                    <?php echo $form->textField ($model, 'NumeroDocumento', array('class' => 'form-control', 
                                                                            'placeholder' => 'Digite Número Documento', 
                                                        )); ?>
                    <?php echo $form->error($model, 'NumeroDocumento'); ?>
                </div>       
                
            </div>    
                
            <br />   

            <div class="row" >                
                    
                <div class="col-md-3">
                <?php echo $form->labelEx($model, 'PrimerNombre'); ?>
                <?php echo $form->textField($model, 'PrimerNombre', array('class' => 'form-control', 
                                                                        'placeholder' => 'Digite Primer Nombre',                                                                         
                                                                        'style'=>'text-transform:uppercase',
                                                                        'onKeyUp'=>'javascript:this.value=this.value.toUpperCase();',)); ?>
                <?php echo $form->error($model, 'PrimerNombre'); ?>
                </div>    
                
                <div class="col-md-3">
                <?php echo $form->labelEx($model, 'SegundoNombre'); ?>
                <?php echo $form->textField($model, 'SegundoNombre', array('class' => 'form-control', 
                                                                        'placeholder' => 'Digite Segundo Nombre', 
                                                                        'style'=>'text-transform:uppercase',
                                                                        'onKeyUp'=>'javascript:this.value=this.value.toUpperCase();',)); ?>
                <?php echo $form->error($model, 'SegundoNombre'); ?>
                </div>    
            
                <div class="col-md-3">
                <?php echo $form->labelEx($model, 'PrimerApellido'); ?>
                <?php echo $form->textField($model, 'PrimerApellido', array('class' => 'form-control', 
                                                                        'placeholder' => 'Digite Primer Apellido', 
                                                                        'style'=>'text-transform:uppercase',
                                                                        'onKeyUp'=>'javascript:this.value=this.value.toUpperCase();',)); ?>
                <?php echo $form->error($model, 'PrimerApellido'); ?>
                </div>    
            
                <div class="col-md-3">
                <?php echo $form->labelEx($model, 'SegundoApellido'); ?>
                <?php echo $form->textField($model, 'SegundoApellido', array('class' => 'form-control', 
                                                                        'placeholder' => 'Digite Segundo Apellido', 
                                                                        'style'=>'text-transform:uppercase',
                                                                        'onKeyUp'=>'javascript:this.value=this.value.toUpperCase();',)); ?>
                <?php echo $form->error($model, 'SegundoApellido'); ?>
                </div>    
                
            </div> 
                  
            <br />
            
            <div class='row'>
                <div class="col-md-6">
                    <?php echo $form->labelEx($model, 'EmailConductor'); ?>
                    <?php echo $form->emailField ($model, 'EmailConductor', array('class' => 'form-control', 
                                                                            'placeholder' => 'Digite Correo Electrónico', 
                                                        )); ?>
                    <?php echo $form->error($model, 'EmailConductor'); ?>
                </div>       

                <div class="col-md-3">                
                    <?php echo $form->labelEx($model, 'Telefono1'); ?>
                    <?php echo $form->textField ($model, 'Telefono1', array('class' => 'form-control', 
                                                                            'placeholder' => 'Digite Número Documento', 
                                                        )); ?>
                    <?php echo $form->error($model, 'Telefono1'); ?>
                </div>       
                
                <div class="col-md-3">                
                    <?php echo $form->labelEx($model, 'Telefono2'); ?>
                    <?php echo $form->textField ($model, 'Telefono2', array('class' => 'form-control', 
                                                                            'placeholder' => 'Digite Número Documento', 
                                                        )); ?>
                    <?php echo $form->error($model, 'Telefono2'); ?>
                </div>       
                                
            </div>
            
            <br />
            
            <div class='form-group'>     
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Grabar' : 'Actualizar', 
                                            array('class' => 'btn btn-primary',)); ?>
            </div>
                
            <?php $this->endWidget(); ?>
                
                            
        </div><!-- form -->
    <?php endif;?>
</div>
</div>
</div>
