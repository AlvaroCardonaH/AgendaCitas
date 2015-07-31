<?php
/* @var $this MuellesController */
/* @var $data Muelles */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdMuelle')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdMuelle), array('view', 'id'=>$data->IdMuelle)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreMuelle')); ?>:</b>
	<?php echo CHtml::encode($data->NombreMuelle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ObservacionesMuelle')); ?>:</b>
	<?php echo CHtml::encode($data->ObservacionesMuelle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCedi')); ?>:</b>
	<?php echo CHtml::encode($data->IdCedi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdTipoFabricante')); ?>:</b>
	<?php echo CHtml::encode($data->IdTipoFabricante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdTipoMuelle')); ?>:</b>
	<?php echo CHtml::encode($data->IdTipoMuelle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEstadoRegistro')); ?>:</b>
	<?php echo CHtml::encode($data->IdEstadoRegistro); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('MinimoPiezas')); ?>:</b>
	<?php echo CHtml::encode($data->MinimoPiezas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MaximoPiezas')); ?>:</b>
	<?php echo CHtml::encode($data->MaximoPiezas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HoraAlmuerzo')); ?>:</b>
	<?php echo CHtml::encode($data->HoraAlmuerzo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HoraRefrigerio')); ?>:</b>
	<?php echo CHtml::encode($data->HoraRefrigerio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgamacionHorarioNormalSemana')); ?>:</b>
	<?php echo CHtml::encode($data->ProgamacionHorarioNormalSemana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramacionHorarioExtendidoSemana')); ?>:</b>
	<?php echo CHtml::encode($data->ProgramacionHorarioExtendidoSemana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramacionHorarioNormalSabado')); ?>:</b>
	<?php echo CHtml::encode($data->ProgramacionHorarioNormalSabado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramacionHorarioExtendidoSabado')); ?>:</b>
	<?php echo CHtml::encode($data->ProgramacionHorarioExtendidoSabado); ?>
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