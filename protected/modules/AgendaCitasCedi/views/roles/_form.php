<?php
$this->pageTitle = Yii::app()->name . ' - Roles';
$this->breadcrumbs = array(
    'Roles',
);
?>
<div class="container">
    <?php if (Yii::app()->user->hasFlash('Roles')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('Roles'); ?>rttrt</strong>
        </div>
    <?php else: ?>
        <div class="page-header">
            <h1>Catálogo Roles de Usuario</h1>
        </div>
    
        <div class="horizontal-form" >

            <div class='row'>
                
            <div class="col-lg-5" >  
                
            <?php $form = $this->beginWidget('CActiveForm', array(
                'enableClientValidation' => true,
                //'enableAjaxValidation'=>true,
                // 'errorMessageCssClass'=>'has-error',

                'htmlOptions' => array('class' => 'form-horizontal',
                    'role' => 'form',
                    'id' => 'rol-form',
                    //'style'=>'word-wrap:break-word; width:200px; font-family:"Times New Roman"',
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
                <?php echo $form->labelEx($model, 'IdRol'); ?>
                <?php echo $form->textField($model, 'IdRol', array('class' => 'form-control', 'disabled'=>true,'placeholder' => '')); ?>
                <?php echo $form->error($model, 'IdRol'); ?>
            </div>    

            <br />                
                
            <div class='row'>    
                <?php echo $form->labelEx($model, 'NombreRol'); ?>
                <?php echo $form->textField($model, 'NombreRol', array('class' => 'form-control', 
                                                                        'placeholder' => 'Digite Nombre', 
                                                                        'autofocus' => 'autofocus',
                                                                        'style'=>'text-transform:uppercase',
                                                                        'onKeyUp'=>'javascript:this.value=this.value.toUpperCase();',)); ?>
                <?php echo $form->error($model, 'NombreRol'); ?>
            </div> 
                  
            <br /><br />
            
            <div class='row'>    
                <?php echo $form->labelEx($model, 'DescripcionRol'); ?>
                <?php echo $form->textField($model, 'DescripcionRol', array('class' => 'form-control', 'placeholder' => 'Digite Descripción')); ?>
                <?php echo $form->error($model, 'DescripcionRol'); ?>
            </div>    
            
            <br /><br />
            
            <div class='form-group'>     
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Grabar' : 'Actualizar', 
                                            array('class' => 'btn btn-primary',)); ?>
            </div>
                
            <?php $this->endWidget(); ?>
                
            </div>    
            
            </div>    
                
        </div><!-- form -->
    <?php endif;?>
</div>
