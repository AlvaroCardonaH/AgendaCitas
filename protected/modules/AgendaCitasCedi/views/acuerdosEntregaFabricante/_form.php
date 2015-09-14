<div class="panel panel-primary">
    <div class="panel-heading">        
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Crear Acuerdo de Entrega' : 'Actualizar Acuerdo de Entrega' ?></h3>
    </div>
<div class=" panel-body">
<div class="container">
    <?php if (Yii::app()->user->hasFlash('AcuerdosEntregaFabricante')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('AcuerdosEntregaFabricante'); ?>rttrt</strong>
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
                    'id' => 'acuerdos-form',
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
                    <?php echo $form->labelEx($model, 'IdAcuerdoEntrega'); ?>
                    <?php echo $form->textField($model, 'IdAcuerdoEntrega', array('class' => 'form-control', 
                                                        'disabled'=>true,
                                                        'placeholder' => '')); ?>
                    <?php echo $form->error($model, 'IdAcuerdoEntrega'); ?>
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
                                                
            </div>
            
            <br/>
            
            <div class="row">
                
                <div class="col-md-3">
                    
                    <?php 
                        $listaDiasSemana = CHtml::listData(DiasSemanaAgenda::model()->findAll(array('order'=>'NumeroDia')), 
                                                                        'NumeroDia', 'NombreDia');
                    ?>
                    
                    <?php echo $form->labelEx($model, 'DiaSemana'); ?>
                    <?php echo $form->dropDownList($model, 'DiaSemana', $listaDiasSemana, 
                            array('class' => 'form-control','prompt'=>'Seleccionar Día Semana ... ')); ?>                    
                    <?php echo $form->error($model, 'DiaSemana'); ?>                                   
                                        
                </div>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'HoraDia'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $model,
                            'attribute'=>'HoraDia',
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
                    <?php echo $form->error($model, 'Hora'); ?>                
                    
                </div>
            </div>
            
            <br />
            
            <div class="row">
                <div class="col-md-12">
                    <?php echo $form->labelEx($model, 'ObservacionesAcuerdoEntrega'); ?>
                    <?php echo $form->textArea($model, 'ObservacionesAcuerdoEntrega', 
                            array('class' => 'form-control','rows'=>2, 'cols'=>50)); ?>
                    <?php echo $form->error($model, 'ObservacionesAcuerdoEntrega'); ?> 
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