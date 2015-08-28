<?php
/* @var $this UserController */
/* @var $model User */
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
					<?php echo $form->labelEx($model,'username'); ?>
					<?php echo $form->textField($model,'username', array('class' => 'form-control'),array('size'=>20,'maxlength'=>20)); ?>
					<?php echo $form->error($model,'username'); ?>
				</div>
				
				<br /><br />

						
			

						
			

						
			

						
			<div class="row">
					<?php echo $form->labelEx($model,'email'); ?>
					<?php echo $form->textField($model,'email', array('class' => 'form-control'),array('size'=>60,'maxlength'=>255)); ?>
					<?php echo $form->error($model,'email'); ?>
				</div>
				
				<br /><br />

						
			<div class="row">
					<?php echo $form->labelEx($model,'status'); ?>
					<?php echo $form->textField($model,'status', array('class' => 'form-control')); ?>
					<?php echo $form->error($model,'status'); ?>
				</div>
				
				<br /><br />

						
		

						
			<div class="row">
					<?php echo $form->labelEx($model,'primernombre'); ?>
					<?php echo $form->textField($model,'primernombre', array('class' => 'form-control'),array('size'=>15,'maxlength'=>15)); ?>
					<?php echo $form->error($model,'primernombre'); ?>
				</div>
				
				<br /><br />

						
			<div class="row">
					<?php echo $form->labelEx($model,'segundonombre'); ?>
					<?php echo $form->textField($model,'segundonombre', array('class' => 'form-control'),array('size'=>15,'maxlength'=>15)); ?>
					<?php echo $form->error($model,'segundonombre'); ?>
				</div>
				
				<br /><br />

						
			<div class="row">
					<?php echo $form->labelEx($model,'primerapellido'); ?>
					<?php echo $form->textField($model,'primerapellido', array('class' => 'form-control'),array('size'=>15,'maxlength'=>15)); ?>
					<?php echo $form->error($model,'primerapellido'); ?>
				</div>
				
				<br /><br />

						
			<div class="row">
					<?php echo $form->labelEx($model,'segundoapellido'); ?>
					<?php echo $form->textField($model,'segundoapellido', array('class' => 'form-control'),array('size'=>15,'maxlength'=>15)); ?>
					<?php echo $form->error($model,'segundoapellido'); ?>
				</div>
				
				<br /><br />

			<div class="row">
					<?php echo $form->labelEx($model,'rol_id'); ?>
					<?php echo $form->textField($model,'rol_id', array('class' => 'form-control')); ?>
					<?php echo $form->error($model,'rol_id'); ?>
				</div>
				
				<br /><br />			
			

						
			<div class="row">
					<?php echo $form->labelEx($model,'IdFabricante'); ?>
					<?php echo $form->textField($model,'IdFabricante', array('class' => 'form-control')); ?>
					<?php echo $form->error($model,'IdFabricante'); ?>
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