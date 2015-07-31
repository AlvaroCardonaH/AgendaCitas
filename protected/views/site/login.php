
<?php
$this->pageTitle = Yii::app()->name . ' - Acceso Sistema';
$this->breadcrumbs = array(
    'Acceso Sistema',
);
?>
<div class="container">
    <?php if (Yii::app()->user->hasFlash('LoginForm')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('LoginForm'); ?>rttrt</strong>
        </div>
    <?php else: ?>
        <div class="page-header">
            <h1>Acceso Sistema</h1>
        </div>
    
        <div class="horizontal-form" >
                
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id' => 'inlineForm',
                'enableClientValidation' => true,
                'focus'=>array($model,'username'),
                //'enableAjaxValidation'=>true,
                // 'errorMessageCssClass'=>'has-error',

                'htmlOptions' => array('class' => 'form-vertical',
                    'role' => 'form',
                    'id' => 'loginform-form',
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
                
            </div> 
                  
            <br />
            
            <div class='form-group'>     
                    <?php echo CHtml::submitButton('Ingresar', 
                                            array('class' => 'btn btn-primary',)); ?>
            </div>
                
            <?php $this->endWidget(); ?>
                
                            
        </div><!-- form -->
    <?php endif;?>
</div>
