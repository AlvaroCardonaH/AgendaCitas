<?php
/* @var $this TiposMuelleController */
/* @var $model TiposMuelle */

$this->pageTitle = 'Visualizar ID Tipo Muelle';

$this->breadcrumbs=array(
	'Tipos Muelle'=>array('index'),
	$model->IdTipoMuelle=>array('view','id'=>$model->IdTipoMuelle),
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
    <h1>Catálogo Tipos Muelle</h1>
</div>


<div class="tipos-muelle-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('TiposMuelle/update', 'id'=>$model->IdTipoMuelle),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('TiposMuelle/delete', 'id'=>$model->IdTipoMuelle),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'IdTipoMuelle',
            'NombreTipoMuelle',
            'ObservacionesTipoMuelle',
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>
