<?php
/* @var $this RolesController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Catálogo Motivos Bloqueo Fechas';

$this->breadcrumbs=array(
	'Motivos Bloqueo Fechas',
);

?>

<title><?php echo Yii::app()->controller->module->getName() ." >> " . $this->pageTitle ?></title>

<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'htmlOptions'=>array ('class'=>'breadcrumb'),
));
?>

<div class="panel panel-primary">
    <div class="panel-heading">        
        <h3 class="panel-title">Motivos Bloqueo Fecha</h3>
    </div>
<div class=" panel-body">


<?php /*echo TbHtml::linkButton('Crear Registro', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('motivosBloqueoFecha/create'),
)); */?>   
<?php //$this->menu=$this->verPermisosMenuOperaciones();?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'roles-grid',
	'dataProvider'=>$model->search(),        
	'filter'=>$model,
        'columns'=>array(
            array(
                'name' => 'IdMotivoBloqueo',
                'htmlOptions'=>array('width'=>'100'),
            ),                
            array(
                'name' => 'DescripcionMotivoBloqueo',
                'htmlOptions'=>array('width'=>'300'),
            ), 
            array(
                'name' => 'ObservacionesMotivoBloqueo',
                'htmlOptions'=>array('width'=>'300'),
            ),             
            array(  // muestra una columna con los botones "view", "update" y "delete"
                'class'=>'CButtonColumn',
                'htmlOptions'=>array('width'=>'100'),
            ),
        ),
)); ?>

    </div>
</div>
