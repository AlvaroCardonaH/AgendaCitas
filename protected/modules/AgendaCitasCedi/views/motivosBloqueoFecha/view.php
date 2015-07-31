<?php
/* @var $this RolesController */
/* @var $model Roles */

$this->pageTitle = 'Visualizar ID Motivo Bloqueo Fecha';

$this->breadcrumbs=array(
	'Motivos Bloqueo Fecha'=>array('index'),
	$model->IdMotivoBloqueo=>array('view','id'=>$model->IdMotivoBloqueo),
	$this->pageTitle,
);

?>

<title><?php echo Yii::app()->controller->module->getName() ." >> " . $this->pageTitle ?></title>


<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'htmlOptions'=>array ('class'=>'breadcrumb'),
));

?>

<div class="page-header">
    <h1>Catálogo Motivos Bloqueo Fecha </h1>
</div>


<div class="motivosbloqueofecha-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('motivosBloqueoFecha/update', 'id'=>$model->IdMotivoBloqueo),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('motivosBloqueoFecha/delete', 'id'=>$model->IdMotivoBloqueo),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'htmlOptions'=>array('style'=>'word-wrap:break-word; width:600px; font-family:"Times New Roman"'),
        'attributes' => array(
            'IdMotivoBloqueo',
            'DescripcionMotivoBloqueo',
            'ObservacionesMotivoBloqueo',
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>

