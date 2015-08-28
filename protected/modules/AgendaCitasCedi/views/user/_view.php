<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auth_key')); ?>:</b>
	<?php echo CHtml::encode($data->auth_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password_hash')); ?>:</b>
	<?php echo CHtml::encode($data->password_hash); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password_reset_token')); ?>:</b>
	<?php echo CHtml::encode($data->password_reset_token); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primernombre')); ?>:</b>
	<?php echo CHtml::encode($data->primernombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('segundonombre')); ?>:</b>
	<?php echo CHtml::encode($data->segundonombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primerapellido')); ?>:</b>
	<?php echo CHtml::encode($data->primerapellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('segundoapellido')); ?>:</b>
	<?php echo CHtml::encode($data->segundoapellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rol_id')); ?>:</b>
	<?php echo CHtml::encode($data->rol_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdFabricante')); ?>:</b>
	<?php echo CHtml::encode($data->IdFabricante); ?>
	<br />

	*/ ?>

</div>