<?php
/* @var $this OrdenesCompraCitasCediController */
/* @var $model OrdenesCompraCitasCedi */

$this->breadcrumbs=array(
	'Ordenes Compra Citas Cedis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrdenesCompraCitasCedi', 'url'=>array('index')),
	array('label'=>'Manage OrdenesCompraCitasCedi', 'url'=>array('admin')),
);
?>

<h1>Create OrdenesCompraCitasCedi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>