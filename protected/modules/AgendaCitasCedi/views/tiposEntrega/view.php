<?php
/* @var $this TiposEntregaController */
/* @var $model TiposEntrega */

$this->pageTitle = 'Visualizar ID Tipo Entrega';

$this->breadcrumbs=array(
	'Tipos Entrega'=>array('index'),
	$model->IdTipoEntrega=>array('view','id'=>$model->IdTipoEntrega),
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
    <h1>Catálogo Tipos Entrega</h1>
</div>


<div class="tipos-muelle-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('TiposEntrega/update', 'id'=>$model->IdTipoEntrega),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('TiposEntrega/delete', 'id'=>$model->IdTipoEntrega),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'IdTipoEntrega',
            'NombreTipoEntrega',
            'ObservacionesTipoEntrega',
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>
