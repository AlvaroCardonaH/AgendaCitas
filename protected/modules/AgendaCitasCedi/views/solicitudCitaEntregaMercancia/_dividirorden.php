<?php $form = $this->beginWidget('CActiveForm', array(
                //bootstrap.widgets.TbActiveForm
                'enableClientValidation' => true,
                //'enableAjaxValidation'=>true,
                // 'errorMessageCssClass'=>'has-error',
                'focus'=>array($modelagenda,'IdMuelle'),

                'htmlOptions' => array('class' => 'form-horizontal',
                    'role' => 'form',
                    'id' => 'solicitudcita-form',
                ),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'errorCssClass' => 'has-error',
                    'successCssClass' => 'has-success',
                    'inputContainer' => '.form-group',
                    'validateOnChange' => true
                ),
            )); ?>

<?php
            
            
            $modeldetalle = new SolicitudesCitaDetalle('search'); 
            $modeldetalle->unsetAttributes(); // clear any default values
            
            //$ValorOrdenCompra = Yii::app()->format->formatNumber($modeldetalle->TotalOrdenCompra);
            
            $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'detalle-grid',
                    'dataProvider'=>$modeldetalle->search($model->IdNumeroSolicitud),
                    'htmlOptions'=>array('style'=>'word-wrap:break-word; "'),
                    'columns'=>array(
                        /*array(
                            'name' => 'IdSolicitudesCitaDetalle',
                            'htmlOptions'=>array('width'=>'50'),
                        ), */
                        array(
                            'name' => 'IdOrdenCompra',
                            'htmlOptions'=>array('width'=>'50'),
                        ),
                        array(
                            'header' => 'Valor Orden',
                            'value' => '$data->TotalOrdenCompra',
                            'htmlOptions'=>array('width'=>'50'),
                        ),
                        array(
                            'name' => 'NumeroPiezas',
                            'htmlOptions'=>array('width'=>'50'),
                        ),
                        array(
                            'name' => 'FechaTentativaEntrega',
                            'htmlOptions'=>array('width'=>'50'),
                        ),
                        array(
                            'name' => 'FechaRegistroOrdenCompra',
                            'htmlOptions'=>array('width'=>'50'),
                        ),
                              
                        
                    ),
                )
            );
            
            ?>
            
            <div class="row">
                <div class='col-md-3'>     
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Grabar' : 'Actualizar', 
                                                array('class' => 'btn btn-primary',)); ?>
                </div>
                
            </div>   
     
            <?php $this->endWidget(); ?>