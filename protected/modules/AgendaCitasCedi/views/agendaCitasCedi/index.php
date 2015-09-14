<?php
/* @var $this MuellesController */
/* @var $dataProvider CActiveDataProvider */



$this->breadcrumbs=array(
        'Gestionar Solicitudes de Citas'=>array('solicitudCitaEntregaMercancia/index'),
	'Ver Agenda',
);
//$this->menu=$this->verPermisosMenuOperaciones();
?>

<?php
$titulo = 'Agenda / Muelle : ' . Muelles::getNombreMuelle($IdMuelle);
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
        <h3 class="panel-title"><?php echo $titulo ?></h3>
    </div>
<div class=" panel-body">


<?php $this->widget('ext.fullcalendar.EFullCalendarHeart', array(
    //'themeCssFile'=>'cupertino/jquery-ui.min.css',
    'options'=>array(
        'header'=>array(
            'left'=>'prev,next,today',
            'center'=>'title',
            'right'=>'month,agendaWeek,agendaDay',
        ),
        'events'=>$this->createUrl("calendarEvents", array('IdMuelle'=>$IdMuelle)),
    )));
?></div>
    
</div>