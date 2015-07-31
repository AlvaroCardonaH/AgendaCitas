<?php
/* @var $this TiposFabricanteController */
/* @var $model TiposFabricante */

$this->pageTitle = 'Visualizar ID Tipo Fabricante';

$this->breadcrumbs=array(
	'Tipos Fabricante'=>array('index'),
	$model->IdTipoFabricante=>array('view','id'=>$model->IdTipoFabricante),
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
    <h1>Catálogo Tipos Fabricante</h1>
</div>


<div class="tipos-muelle-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('TiposFabricante/update', 'id'=>$model->IdTipoFabricante),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('TiposFabricante/delete', 'id'=>$model->IdTipoFabricante),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'IdTipoFabricante',
            'NombreTipoFabricante',
            'ObservacionesTipoFabricante',
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>
