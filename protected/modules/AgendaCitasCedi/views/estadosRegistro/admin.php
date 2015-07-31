<?php
/* @var $this EstadosRegistroController */
/* @var $model EstadosRegistro */

$this->breadcrumbs=array(
	'Estados Registros'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EstadosRegistro', 'url'=>array('index')),
	array('label'=>'Create EstadosRegistro', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#estados-registro-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<div>
<?php echo TbHtml::linkButton('Nuevo Registro', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                        'url'   => array('create'),
    )); ?>
</div>    

<br />

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'estados-registro-grid',
        'type' => TbHtml::GRID_TYPE_BORDERED,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'template' => "{items}",
	'columns'=>array(
                array('class'=>'CCheckBoxColumn'), 
                array(
                    'name' => 'IdEstadoRegistro',
                    'htmlOptions'=>array('width' => 30,
                                        'style' => 'text-align:center'),                    
                ),  
                array(
                    'name' => 'NombreEstadoRegistro',
                    'htmlOptions'=>array('width' => 30,
                                        'style' => 'text-align:center'),                    
                ),                
		array(
			'class'=>'CButtonColumn',
                        'htmlOptions'=>array('width' => 30),
		),
	),
)); ?>
