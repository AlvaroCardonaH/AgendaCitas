<?php
/* @var $this TAgendacitascediController */
/* @var $model TAgendacitascedi */
/* @var $form CActiveForm */
?>

<div class="container">
    
    <div class="horizontal-form" >

        <div class='row'>
                
            <div class="col-lg-5" >

			<?php $form=$this->beginWidget('CActiveForm', array(
				'enableClientValidation' => true,
                //'enableAjaxValidation'=>true,
                // 'errorMessageCssClass'=>'has-error',

                'htmlOptions' => array('class' => 'form-horizontal',
                    'role' => 'form',
                    'id' => 'rol-form',
                    
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

						
			<div class="row">
					<?php echo $form->labelEx($model,'IdNumeroSolicitud'); ?>
					<?php echo $form->textField($model,'IdNumeroSolicitud'); ?>
					<?php echo $form->error($model,'IdNumeroSolicitud'); ?>
				</div>
				
				<br /><br />

						
			<div class="row">
					<?php echo $form->labelEx($model,'IdCedi'); ?>
					<?php echo $form->textField($model,'IdCedi'); ?>
					<?php echo $form->error($model,'IdCedi'); ?>
				</div>
				
				<br /><br />

						
			<div class="row">
					<?php echo $form->labelEx($model,'IdMuelle'); ?>
					<?php echo $form->textField($model,'IdMuelle'); ?>
					<?php echo $form->error($model,'IdMuelle'); ?>
				</div>
				
				<br /><br />

						
			<div class="row">
					<?php echo $form->labelEx($model,'TituloEvento'); ?>
					<?php echo $form->textField($model,'TituloEvento',array('size'=>45,'maxlength'=>45)); ?>
					<?php echo $form->error($model,'TituloEvento'); ?>
				</div>
				
				<br /><br />

						
			<div class="row">
					<?php echo $form->labelEx($model,'FechaInicio'); ?>
					<?php echo $form->textField($model,'FechaInicio'); ?>
					<?php echo $form->error($model,'FechaInicio'); ?>
				</div>
				
				<br /><br />

						
			<div class="row">
					<?php echo $form->labelEx($model,'FechaFinal'); ?>
					<?php echo $form->textField($model,'FechaFinal'); ?>
					<?php echo $form->error($model,'FechaFinal'); ?>
				</div>
				
				<br /><br />

						
			<div class="row">
					<?php echo $form->labelEx($model,'ObservacionesEvento'); ?>
					<?php echo $form->textField($model,'ObservacionesEvento',array('size'=>60,'maxlength'=>255)); ?>
					<?php echo $form->error($model,'ObservacionesEvento'); ?>
				</div>
				
				<br /><br />

						
			<div class="row">
					<?php echo $form->labelEx($model,'IdUsuarioGraba'); ?>
					<?php echo $form->textField($model,'IdUsuarioGraba'); ?>
					<?php echo $form->error($model,'IdUsuarioGraba'); ?>
				</div>
				
				<br /><br />

						
			<div class="row">
					<?php echo $form->labelEx($model,'FechaGraba'); ?>
					<?php echo $form->textField($model,'FechaGraba'); ?>
					<?php echo $form->error($model,'FechaGraba'); ?>
				</div>
				
				<br /><br />

						
			<div class="row">
					<?php echo $form->labelEx($model,'IdUsuarioModifica'); ?>
					<?php echo $form->textField($model,'IdUsuarioModifica'); ?>
					<?php echo $form->error($model,'IdUsuarioModifica'); ?>
				</div>
				
				<br /><br />

						
			<div class="row">
					<?php echo $form->labelEx($model,'FechaModifica'); ?>
					<?php echo $form->textField($model,'FechaModifica'); ?>
					<?php echo $form->error($model,'FechaModifica'); ?>
				</div>
				
				<br /><br />

							
				
				<div class="form-group">
					<?php echo CHtml::submitButton($model->isNewRecord ? 'Grabar' : 'Actualizar', array('class' => 'btn btn-primary')); ?>
				</div>

			<?php $this->endWidget(); ?>

			</div>    
            
            </div>    
                
        </div><!-- form -->
    
</div>