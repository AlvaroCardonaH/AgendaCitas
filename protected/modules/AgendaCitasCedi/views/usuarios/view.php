<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->pageTitle = 'Visualizar ID Usuario';

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->IdUsuario=>array('view','id'=>$model->IdUsuario),
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
    <h1>Registrar Usuarios</h1>
</div>


<div class="usuarios-view">
       
    <p>
        <?php echo TbHtml::linkButton('Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('usuarios/update', 'id'=>$model->IdUsuario),
                                        )); ?>    
            
        <?php echo TbHtml::linkButton('Eliminar', array('color' => TbHtml::BUTTON_COLOR_DANGER,
                                        'method' => 'post',
                                        'submit' => array ('usuarios/delete', 'id'=>$model->IdUsuario),
                                        'confirm' => 'Esta seguro de eliminar este registro?')); ?>
    
    </p>
    
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'htmlOptions'=>array('style'=>'word-wrap:break-word; width:600px; font-family:"Times New Roman"'),
        'attributes' => array(            
            'IdUsuario',
            'username',            
            array(
                'name' => 'NumeroDocumento',
                'value' => Yii::app()->format->formatNumber($model->NumeroDocumento),
            ),            
            array(
                'name' => 'Nombre Completo',
                'value' => $model->PrimerNombre . ' ' . $model->SegundoNombre . ' ' . $model->PrimerApellido . ' ' . $model->SegundoApellido,
            ),
            'EmailUsuario',
            array(
                'name' => 'IdRol',
                'value' => $model->IdRol . ' - ' . $model->rol->NombreRol,
            ),                        
            array(
                'name' => 'Activo',
                'value' => $model->Activo = 1 ? 'Activo' : 'Inactivo',
            ),                                    
            'IdUsuarioGraba',
            'FechaGraba',
            'IdUsuarioModifica',
            'FechaModifica',
        ),
    
    )); ?>
    
    
    
</div>

