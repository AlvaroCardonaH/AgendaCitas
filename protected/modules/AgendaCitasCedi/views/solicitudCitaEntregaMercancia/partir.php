<?php
/* @var $this SolicitudCitaEntregaMercanciaController */
/* @var $model SolicitudCitaEntregaMercancia */

//$this->menu=$this->verPermisosMenuOperaciones();
?>



<?php $this->renderPartial('_form2', 
                        array(
                        'modeldetalle'=>$modeldetalle,
                        'modelsolicitud'=>$modelsolicitud,
                        'modelagenda'=>$modelagenda,
                        )); 
?>