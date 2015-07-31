<?php
$this->pageTitle = Yii::app()->name . ' - Tipos Fabricante';
$this->breadcrumbs = array(
    'Tipos Fabricante',
);
?>
<div class="container">
    <?php if (Yii::app()->user->hasFlash('TiposFabricante')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('TiposFabricante'); ?>rttrt</strong>
        </div>
    <?php else: ?>
        <div class="page-header">
            <h1>Catálogo Tipos Fabricante</h1>
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
                    'id' => 'tipos-fabricante-form',
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
                <?php echo $form->labelEx($model, 'IdTipoFabricante'); ?>
                <?php echo $form->textField($model, 'IdTipoFabricante', array('class' => 'form-control', 'disabled'=>true,'placeholder' => '')); ?>
                <?php echo $form->error($model, 'IdTipoFabricante'); ?>
            </div>    

            <br />                
                
            <div class='row'>    
                <?php echo $form->labelEx($model, 'NombreTipoFabricante'); ?>
                <?php echo $form->textField($model, 'NombreTipoFabricante', array('class' => 'form-control', 
                                                                        'placeholder' => 'Digite Nombre', 
                                                                        'autofocus' => 'autofocus',
                                                                        'style'=>'text-transform:uppercase',
                                                                        'onKeyUp'=>'javascript:this.value=this.value.toUpperCase();',)); ?>
                <?php echo $form->error($model, 'NombreTipoFabricante'); ?>
            </div> 
                  
            <br /><br />
            
            <div class='row'>    
                <?php echo $form->labelEx($model, 'ObservacionesTipoFabricante'); ?>
                <?php echo $form->textField($model, 'ObservacionesTipoFabricante', array('class' => 'form-control', 'placeholder' => 'Digite Descripción')); ?>
                <?php echo $form->error($model, 'ObservacionesTipoFabricante'); ?>
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
