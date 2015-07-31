<?php
/* @var $this RolesController */
/* @var $model Roles */

$this->pageTitle = 'Visualizar ID Rol';

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->IdRol=>array('view','id'=>$model->IdRol),
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
    <h1>Catálogo Roles de Usuario </h1>
</div>


<div class="roles-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('Roles/update', 'id'=>$model->IdRol),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('Roles/delete', 'id'=>$model->IdRol),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'htmlOptions'=>array('style'=>'word-wrap:break-word; width:600px; font-family:"Times New Roman"'),
        'attributes' => array(
            'IdRol',
            'NombreRol',
            'DescripcionRol',
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>

