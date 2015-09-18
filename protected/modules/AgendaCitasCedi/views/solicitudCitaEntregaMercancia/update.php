<?php
/* @var $this OrdenesCompraCitasCediController */
/* @var $model OrdenesCompraCitasCedi */


//$this->menu=$this->verPermisosMenuOperaciones();
?>



<?php $this->renderPartial('_form', 
        array('model' => $model, 
            'modelagenda'=>$modelagenda,
            'modelmuelles'=>$modelmuelles,
        )
    ); 
?>

