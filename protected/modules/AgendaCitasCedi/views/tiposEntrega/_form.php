<div class="panel panel-primary">
    <div class="panel-heading">        
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Crear Tipo Entrega' : 'Actualizar Tipo Entrega' ?></h3>
    </div>
<div class=" panel-body">
<div class="container">
    <?php if (Yii::app()->user->hasFlash('TiposEntrega')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('TiposEntrega'); ?>rttrt</strong>
        </div>
    <?php else: ?>
       
    
        <div class="horizontal-form" >

            <div class='row'>
                
            <div class="col-lg-5" >  
                
            <?php $form = $this->beginWidget('CActiveForm', array(
                'enableClientValidation' => true,
                //'enableAjaxValidation'=>true,
                // 'errorMessageCssClass'=>'has-error',

                'htmlOptions' => array('class' => 'form-horizontal',
                    'role' => 'form',
                    'id' => 'tipos-muelle-form',
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
                <?php echo $form->labelEx($model, 'IdTipoEntrega'); ?>
                <?php echo $form->textField($model, 'IdTipoEntrega', array('class' => 'form-control', 'disabled'=>true,'placeholder' => '')); ?>
                <?php echo $form->error($model, 'IdTipoEntrega'); ?>
            </div>    

            <br />                
                
            <div class='row'>    
                <?php echo $form->labelEx($model, 'NombreTipoEntrega'); ?>
                <?php echo $form->textField($model, 'NombreTipoEntrega', array('class' => 'form-control', 
                                                                        'placeholder' => 'Digite Nombre', 
                                                                        'autofocus' => 'autofocus',
                                                                        'style'=>'text-transform:uppercase',
                                                                        'onKeyUp'=>'javascript:this.value=this.value.toUpperCase();',)); ?>
                <?php echo $form->error($model, 'NombreTipoEntrega'); ?>
            </div> 
                  
            <br /><br />
            
            <div class='row'>    
                <?php echo $form->labelEx($model, 'ObservacionesTipoEntrega'); ?>
                <?php echo $form->textField($model, 'ObservacionesTipoEntrega', array('class' => 'form-control', 'placeholder' => 'Digite Descripción')); ?>
                <?php echo $form->error($model, 'ObservacionesTipoEntrega'); ?>
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
