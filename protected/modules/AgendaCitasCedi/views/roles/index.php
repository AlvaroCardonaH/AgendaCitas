<?php
/* @var $this RolesController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Catálogo Roles';

$this->breadcrumbs=array(
	'Roles',
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

<?php echo TbHtml::linkButton('Crear Registro', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'method' => 'post',
                                        'submit' => array ('Roles/create'),
)); ?>     

<br /><br />

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'roles-grid',
	'dataProvider'=>$model->search(),        
	'filter'=>$model,
        'summaryText' => "Mostrando {start} – {end} de {count} resultados",
        'pager'=>array(
            'header' => 'Ir a la pagina:',
            'firstPageLabel' => '< <',
            'prevPageLabel' => 'Anterior',
            'nextPageLabel' => 'Siguiente',
            'lastPageLabel' => '>>',
        ),  
        'htmlOptions'=>array('style'=>'word-wrap:break-word; width:800px; font-family:"Times New Roman"'),
        'columns'=>array(
            array(
                'name' => 'IdRol',
                'htmlOptions'=>array('width'=>'100'),
            ),                
            array(
                'name' => 'NombreRol',
                'htmlOptions'=>array('width'=>'200'),
            ), 
            array(
                'name' => 'DescripcionRol',
                'htmlOptions'=>array('width'=>'400'),
            ),             
            array(  // muestra una columna con los botones "view", "update" y "delete"
                'class'=>'CButtonColumn',
                'htmlOptions'=>array('width'=>'100'),
            ),
        ),
)); ?>
