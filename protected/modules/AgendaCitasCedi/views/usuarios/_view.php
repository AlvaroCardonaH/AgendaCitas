<?php
/* @var $this UsuariosController */
/* @var $data Usuarios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdUsuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdUsuario), array('view', 'id'=>$data->IdUsuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Login')); ?>:</b>
	<?php echo CHtml::encode($data->Login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Contrasena')); ?>:</b>
	<?php echo CHtml::encode($data->Contrasena); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PrimerNombre')); ?>:</b>
	<?php echo CHtml::encode($data->PrimerNombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SegundoNombre')); ?>:</b>
	<?php echo CHtml::encode($data->SegundoNombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PrimerApellido')); ?>:</b>
	<?php echo CHtml::encode($data->PrimerApellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SegundoApellido')); ?>:</b>
	<?php echo CHtml::encode($data->SegundoApellido); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('EmailUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->EmailUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdRol')); ?>:</b>
	<?php echo CHtml::encode($data->IdRol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdFabricante')); ?>:</b>
	<?php echo CHtml::encode($data->IdFabricante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEstadoRegistro')); ?>:</b>
	<?php echo CHtml::encode($data->IdEstadoRegistro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdUsuarioGraba')); ?>:</b>
	<?php echo CHtml::encode($data->IdUsuarioGraba); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaGraba')); ?>:</b>
	<?php echo CHtml::encode($data->FechaGraba); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdUsuarioModifica')); ?>:</b>
	<?php echo CHtml::encode($data->IdUsuarioModifica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaModifica')); ?>:</b>
	<?php echo CHtml::encode($data->FechaModifica); ?>
	<br />

	*/ ?>

</div>