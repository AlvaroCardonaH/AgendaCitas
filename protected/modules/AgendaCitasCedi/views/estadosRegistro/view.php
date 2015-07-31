<?php
/* @var $this EstadosRegistroController */
/* @var $model EstadosRegistro */

$this->pageTitle = 'Visualizar ID Estados Registro';

$this->breadcrumbs=array(
	'Estados Registros'=>array('index'),
	$model->IdEstadoRegistro=>array('view','id'=>$model->IdEstadoRegistro),
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
    <h1>Catálogo Estados de Registro </h1>
</div>


<div class="estados-ordenes-compra-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('EstadosRegistro/update', 'id'=>$model->IdEstadoRegistro),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('EstadosRegistro/delete', 'id'=>$model->IdEstadoRegistro),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'IdEstadoRegistro',
            'NombreEstadoRegistro',
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>

