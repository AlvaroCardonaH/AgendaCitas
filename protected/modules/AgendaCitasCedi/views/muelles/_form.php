<link rel="stylesheet" href="/css/styleFormulariosAgendaCitas.css" type="text/css" media="all">

<?php
$this->pageTitle = Yii::app()->name . ' - Muelles';
$this->breadcrumbs = array(
    'Muelles',
);
?>
<div class="container">
    <?php if (Yii::app()->user->hasFlash('Muelles')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('Muelles'); ?>rttrt</strong>
        </div>
    <?php else: ?>
        <div class="page-header">
            <h1>Catálogo Muelles</h1>
        </div>
    
        <div class="horizontal-form" >

            <?php $form = $this->beginWidget('CActiveForm', array(
                //bootstrap.widgets.TbActiveForm
                'enableClientValidation' => true,
                //'enableAjaxValidation'=>true,
                // 'errorMessageCssClass'=>'has-error',
                'focus'=>array($model,'NombreMuelle'),

                'htmlOptions' => array('class' => 'form-horizontal',
                    'role' => 'form',
                    'id' => 'muelles-form',
                    'style'=>'word-wrap:break-word; width:1000px; font-family:"Times New Roman"',
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
                    <?php echo $form->labelEx($model, 'IdMuelle'); ?>
                    <?php echo $form->textField($model, 'IdMuelle', array('class' => 'form-control', 
                                                        'disabled'=>true,
                                                        'placeholder' => '')); ?>
                    <?php echo $form->error($model, 'IdMuelle'); ?>
                </div>    
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'NombreMuelle'); ?>
                    <?php echo $form->textField($model, 'NombreMuelle', array('class' => 'form-control', 
                                                                            'placeholder' => 'Digite Nombre',                                                                         
                                                                            'style'=>'text-transform:uppercase',
                                                                            'onKeyUp'=>'javascript:this.value=this.value.toUpperCase();',)); ?>
                    <?php echo $form->error($model, 'NombreMuelle'); ?>
                </div>  
                    
                <?php
                    $listaTiposMuelle = TiposMuelle::getListaTiposMuelle();
                ?>

                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'IdTipoMuelle'); ?>
                    <?php echo $form->dropDownList($model, 'IdTipoMuelle', $listaTiposMuelle, 
                            array('class' => 'form-control','prompt'=>'Seleccionar Tipo Muelle ... ')); ?>
                    <?php echo $form->error($model, 'IdTipoMuelle'); ?> 
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
            
            <br />
            
            <div class="row">
                
                <?php
                    $listaEstadosRegistro = EstadosRegistro::getListaEstadosRegistro();
                ?>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'IdEstadoRegistro'); ?>
                    <?php echo $form->dropDownList($model, 'IdEstadoRegistro', $listaEstadosRegistro, 
                            array('class' => 'form-control','prompt'=>'Seleccionar Estado ... ')); ?>
                    <?php echo $form->error($model, 'IdEstadoRegistro'); ?>                
                </div>    
                
                <?php
                    $listaTiposFabricante = TiposFabricante::getListaTiposFabricante();
                ?>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'IdTipoFabricante'); ?>
                    <?php echo $form->dropDownList($model, 'IdTipoFabricante', $listaTiposFabricante, 
                            array('class' => 'form-control','prompt'=>'Seleccionar Tipo Fabricante ... ')); ?>
                    <?php echo $form->error($model, 'IdTipoFabricante'); ?>                
                </div> 
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'MinimoPiezas'); ?>
                    <?php echo $form->textField($model, 'MinimoPiezas', array('class' => 'form-control', 
                                                        'placeholder' => 'Número Minimo Piezas',
                                                        )
                                                ); ?>

                    <?php echo $form->error($model, 'MinimoPiezas'); ?>                
                </div>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'MaximoPiezas'); ?>
                    <?php echo $form->textField($model, 'MaximoPiezas', array('class' => 'form-control', 
                                                        'placeholder' => 'Número Maximo Piezas',
                                                        )
                                                ); ?>

                    <?php echo $form->error($model, 'MaximoPiezas'); ?>                
                </div>
                
            </div>    
               
            <br />
            
            <div class="row">

                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'HoraAlmuerzo'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(                            
                            'model' => $model,
                            'attribute'=>'HoraAlmuerzo',
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
                    <?php echo $form->error($model, 'HoraAlmuerzo'); ?>                
                </div>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'HoraRefrigerioAM'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $model,
                            'attribute'=>'HoraRefrigerioAM',
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
                    <?php echo $form->error($model, 'HoraRefrigerioAM'); ?>                
                </div>
                
                <div class="col-md-3">
                    <?php echo $form->labelEx($model, 'HoraRefrigerioPM'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $model,
                            'attribute'=>'HoraRefrigerioPM',                            
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
                    <?php echo $form->error($model, 'HoraRefrigerioPM'); ?>                
                </div>
                                
            </div>
            
            <br/>

            <div class="row">
                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'HorarioNormalAperturaSemana'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $model,
                            'attribute'=>'HorarioNormalAperturaSemana',
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
                    <?php echo $form->error($model, 'HorarioNormalAperturaSemana'); ?>                
                </div>

                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'HorarioNormalCierreSemana'); ?>

                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $model,
                            'attribute'=>'HorarioNormalCierreSemana',
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

                    <?php echo $form->error($model, 'HorarioNormalCierreSemana'); ?>                
                </div>

                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'HorarioExtendidoAperturaSemana'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $model,
                            'attribute'=>'HorarioExtendidoAperturaSemana',
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
                    <?php echo $form->error($model, 'HorarioExtendidoAperturaSemana'); ?>                
                </div>

                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'HorarioExtendidoCierreSemana'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $model,
                            'attribute'=>'HorarioExtendidoCierreSemana',
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
                    <?php echo $form->error($model, 'HorarioExtendidoCierreSemana'); ?>                
                </div>
                
            </div>
            
            <br/>
            
            <div class="row">
                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'HorarioNormalAperturaSabado'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $model,
                            'attribute'=>'HorarioNormalAperturaSabado',
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
                    <?php echo $form->error($model, 'HorarioNormalAperturaSabado'); ?>                
                </div>

                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'HorarioNormalCierreSabado'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $model,
                            'attribute'=>'HorarioNormalCierreSabado',
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
                    <?php echo $form->error($model, 'HorarioNormalCierreSabado'); ?>                
                </div>

                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'HorarioExtendidoAperturaSabado'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $model,
                            'attribute'=>'HorarioExtendidoAperturaSabado',
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
                    <?php echo $form->error($model, 'HorarioExtendidoAperturaSabado'); ?>                
                </div>

                <div class="col-md-2">
                    <?php echo $form->labelEx($model, 'HorarioExtendidoCierreSabado'); ?>
                    <?php $this->widget(
                        'yiiwheels.widgets.timepicker.WhTimePicker',
                        array(
                            'model' => $model,
                            'attribute'=>'HorarioExtendidoCierreSabado',
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
                    <?php echo $form->error($model, 'HorarioExtendidoCierreSabado'); ?>                
                </div>
                
            </div>
                        
            <br/>
            
            <div class="row">
                <div class="col-md-12">
                    <?php echo $form->labelEx($model, 'ObservacionesMuelle'); ?>
                    <?php echo $form->textArea($model, 'ObservacionesMuelle', 
                            array('class' => 'form-control','rows'=>2, 'cols'=>50)); ?>
                    <?php echo $form->error($model, 'ObservacionesMuelle'); ?> 
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