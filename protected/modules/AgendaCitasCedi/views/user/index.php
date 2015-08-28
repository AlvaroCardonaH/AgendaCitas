<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

/*$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Usuarios Fabricantes</h1>




<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		//'auth_key',
		//'password_hash',
		//'password_reset_token',
		'email',
                array(
		'header'=>'Estado',                 
                'value'=>'Yii::app()->controller->obtenerEstado($data->status)',                
                  
                ),
		//'status',
		//'created_at',
		//'updated_at',
		'primernombre',
		'segundonombre',
		'primerapellido',
		'segundoapellido',
                /*array('header'=>'Nombre Rol',
                       //'name'=>'BuscarDia',
                       //'htmlOptions'=>array('style'=>'width: 80px; text-align: justify;'),
                       'value'=>'$data->rol->NombreRol',                      
                      ),*/
		'rol.NombreRol',
		'fabricante.Nombre',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
