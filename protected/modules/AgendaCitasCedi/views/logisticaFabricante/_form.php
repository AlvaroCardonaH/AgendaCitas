<div class="panel panel-primary">
    <div class="panel-heading">        
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Crear Logistica de Entrega' : 'Actualizar Logistica de Entrega' ?></h3>
    </div>
<div class=" panel-body">
<div class="container">
    <?php if (Yii::app()->user->hasFlash('LogisticaFabricante')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('LogisticaFabricante'); ?>rttrt</strong>
        </div>
    <?php else: ?>
        
        <div class="horizontal-form" >

            <?php $form = $this->beginWidget('CActiveForm', array(
                //bootstrap.widgets.TbActiveForm
                'enableClientValidation' => true,
                //'enableAjaxValidation'=>true,
                // 'errorMessageCssClass'=>'has-error',
                'focus'=>array($model,'IdFabricante'),

                'htmlOptions' => array('class' => 'form-horizontal',
                    'role' => 'form',
                    'id' => 'logistica-form',
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
                    <?php echo $form->labelEx($model, 'IdLogisticaFabricante'); ?>
                    <?php echo $form->textField($model, 'IdLogisticaFabricante', array('class' => 'form-control', 
                                                        'disabled'=>true,
                                                        'placeholder' => '')); ?>
                    <?php echo $form->error($model, 'IdLogisticaFabricante'); ?>
                </div>    
                                    
                <?php
                    $listaFabricantes = Fabricante::listData();
                ?>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'IdFabricante'); ?>
                    <?php echo $form->dropDownList($model, 'IdFabricante', $listaFabricantes, 
                            array('class' => 'form-control','prompt'=>'Seleccionar Fabricante ... ')); ?>
                    <?php echo $form->error($model, 'IdFabricante'); ?>                
                </div>    
                
                <?php
                    $listaCedis = Cedi::listData();
                ?>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'IdCedi'); ?>
                    <?php echo $form->dropDownList($model, 'IdCedi', $listaCedis, 
                            array('class' => 'form-control','prompt'=>'Seleccionar Cedi ... ')); ?>
                    <?php echo $form->error($model, 'IdCedi'); ?>                
                </div>    
                
                <?php
                    $listaTransportadores = Transportador::getTransportador();
                ?>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'IdTransportador'); ?>
                    <?php echo $form->dropDownList($model, 'IdTransportador', $listaTransportadores, 
                            array('class' => 'form-control','prompt'=>'Seleccionar Transportador ... ')); ?>
                    <?php echo $form->error($model, 'IdTransportador'); ?>                
                </div>                    
                
                                                
            </div>
            
            <br />

            <?php
                $listaUsuarios = Usuarios::getUsuarios(2);
            ?>
            
            <div class="row">
                <div class="col-md-4">
                    <?php echo $form->labelEx($model, 'IdUsuarioResponsable'); ?>
                    <?php echo $form->dropDownList($model, 'IdUsuarioResponsable', $listaUsuarios, 
                            array('class' => 'form-control','prompt'=>'Seleccionar Usuario ... ')); ?>
                    <?php echo $form->error($model, 'IdUsuarioResponsable'); ?>                                    
                </div>    
            </div>

            <br />
            
            <div class="row">
                <div class="col-md-12">
                    <?php echo $form->labelEx($model, 'ObservacionesLogistica'); ?>
                    <?php echo $form->textArea($model, 'ObservacionesLogistica', 
                            array('class' => 'form-control','rows'=>2, 'cols'=>50)); ?>
                    <?php echo $form->error($model, 'ObservacionesLogistica'); ?> 
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
</div></div></div>