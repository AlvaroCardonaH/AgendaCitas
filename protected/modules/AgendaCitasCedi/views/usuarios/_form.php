<link rel="stylesheet" href="/css/styleFormulariosAgendaCitas.css" type="text/css" media="all">

<?php
$this->pageTitle = Yii::app()->name . ' - Usuarios';
$this->breadcrumbs = array(
    'Usuarios',
);
?>
<div class="container">
    <?php if (Yii::app()->user->hasFlash('Usuarios')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('Usuarios'); ?>rttrt</strong>
        </div>
    <?php else: ?>
        <div class="page-header">
            <h1>Catálogo Usuarios</h1>
        </div>
    
        <div class="horizontal-form" >
                
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id' => 'inlineForm',
                'enableClientValidation' => true,
                'focus'=>array($model,'IdEstadoRegistro'),
                //'enableAjaxValidation'=>true,
                // 'errorMessageCssClass'=>'has-error',

                'htmlOptions' => array('class' => 'form-vertical',
                    'role' => 'form',
                    'id' => 'usuario-form',
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
                <?php echo $form->labelEx($model, 'IdUsuario'); ?>
                <?php echo $form->textField($model, 'IdUsuario', array('class' => 'form-control', 'disabled'=>true,'placeholder' => '')); ?>
                <?php echo $form->error($model, 'IdUsuario'); ?>
                </div>    
                
                <?php
                    $listaEstadosRegistro = EstadosRegistro::getListaEstadosRegistro();
                ?>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'IdEstadoRegistro'); ?>
                    <?php echo $form->dropDownList($model, 'IdEstadoRegistro', $listaEstadosRegistro, array('class' => 'form-control','prompt'=>'Seleccionar Condición ... ')); ?>
                    <?php echo $form->error($model, 'IdEstadoRegistro'); ?>
                </div>
                
                <?php
                    $listaStatus = array(
                        0 => "Activo",
                        1 => "Inactivo",
                    );
                ?>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'Activo'); ?>
                    <?php echo $form->dropDownList($model, 'Activo', $listaStatus, array('class' => 'form-control','prompt'=>'Seleccionar Estado ... ')); ?>
                    <?php echo $form->error($model, 'Activo'); ?>
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
                    <?php echo $form->labelEx($model, 'EmailUsuario'); ?>
                    <?php echo $form->emailField ($model, 'EmailUsuario', array('class' => 'form-control', 
                                                                            'placeholder' => 'Digite Correo Electrónico', 
                                                        )); ?>
                    <?php echo $form->error($model, 'EmailUsuario'); ?>
                </div>       
                
                <?php
                    $listaRoles = Roles::getListaRoles();
                ?>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'IdRol'); ?>
                    <?php echo $form->dropDownList($model, 'IdRol', $listaRoles, array('class' => 'form-control','prompt'=>'Seleccionar Rol ... ')); ?>
                    <?php echo $form->error($model, 'IdRol'); ?>
                </div>
                
                <?php
                    $listaTransportadores = Transportador::getTransportador();
                ?>
                
            </div>
            
            <br />
                
            <div class='row'>    
                
                <?php if ($model->isNewRecord) {
                ?>                    
                
                <div class="col-md-3">
                <?php echo $form->labelEx($model, 'username'); ?>
                <?php echo $form->textField($model, 'username', array('class' => 'form-control', 
                                                                        'placeholder' => 'Digite Nombre de Usuario', 
                )); ?>
                <?php echo $form->error($model, 'username'); ?>
                </div>  
                
                <div class="col-md-3">
                   
                <?php echo $form->labelEx($model, 'password'); ?>
                <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 
                                                                        'placeholder' => 'Digite Contraseña de Usuario', 
                )); ?>
                <?php echo $form->error($model, 'password'); ?>
                    
                </div>  
                
                <?php
                }
                ?>
                
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
