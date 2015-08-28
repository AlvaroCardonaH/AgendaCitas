<?php $this->beginContent('/layouts/main'); ?>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo Yii::app()->homeUrl; ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
            </div>
            <div class="navbar-collapse collapse">
                <?php $this->widget('zii.widgets.CMenu', array(
                    'encodeLabel' => true,
                    'items' => array(
                       // array('label' => 'Home', 'url' => array('/AgendaCitasCedi')),
                         array('label' => 'Catalogos', 'url' => array('#'), 'itemOptions' => array('class' => 'dropdown'),
                            'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                            'submenuOptions' => array('class' => 'dropdown-menu'),
                            'items' => array(
                                array('label' => 'Conductores', 'url' => array('conductor/index'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label' => 'Motivos Bloqueo Fecha', 'url' => array('motivosBloqueoFecha/index'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label' => 'Roles', 'url' => array('roles/index'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label' => 'Tipos de Muelle', 'url' => array('tiposMuelle/index'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label' => 'Tipos de Fabricante', 'url' => array('tiposFabricante/index'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label' => 'Tipos de Entrega', 'url' => array('tiposEntrega/index'), 'visible'=>!Yii::app()->user->isGuest),
                                
                                )   
                        ),
                        array('label' => 'Cedi', 'url' => array('#'), 'itemOptions' => array('class' => 'dropdown'),
                            'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                            'submenuOptions' => array('class' => 'dropdown-menu'),
                            'items' => array(
                                array('label' => 'Agendar Citas', 'url' => array('tAgendacitascedi/index'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label' => '', 'url' => array('#'), 'itemOptions' => array('class' => 'divider')),
                                array('label' => 'Gestionar Solicitudes', 'url' => array('solicitudCitaEntregaMercancia/index'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label' => 'Logistica Entrega', 'url' => array('logisticaFabricante/index'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label' => 'Fecha Bloqueadas', 'url' => array('fechasBloqueadas/index'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label' => 'Muelles', 'url' => array('muelles/index'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label' => '', 'url' => array('#'), 'itemOptions' => array('class' => 'divider')),
                                array('label' => 'Usuarios', 'url' => array('user/index'), 'visible'=>!Yii::app()->user->isGuest),
                            )
                        ), 
                        array('label' => 'Fabricantes', 'url' => array('#'), 'itemOptions' => array('class' => 'dropdown'),
                            'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                            'submenuOptions' => array('class' => 'dropdown-menu'),
                            'items' => array(
                                array('label' => 'Acuerdos Entrega', 'url' => array('acuerdosEntregaFabricante/index'), 'visible'=>!Yii::app()->user->isGuest),
                                //array('label' => 'Logistica Entrega', 'url' => array('logisticaFabricante/index'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label' => '', 'url' => array('#'), 'itemOptions' => array('class' => 'divider')),
                                array('label' => 'Solicitud de Cita', 'url' => array('ordenesCompraCitasCedi/index'), 'visible'=>!Yii::app()->user->isGuest),
                            )
                        ),                       
              
                    ),
                    // 'htmlOptions'=>array('class'=>'main-menu')
                    'htmlOptions' => array('class' => 'nav navbar-nav')
                )); ?>
                 <div class=" navbar-right">
                       <?php $this->widget('zii.widgets.CMenu', array(
                    'encodeLabel' => true,
                    'items' => array(
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
						
                    ),
                    
                    'htmlOptions' => array('class' => 'nav navbar-nav')
                )); ?>
		</div>
            </div>
            <!--/.navbar-collapse -->
        </div>
        <!--/.container -->
    </div><!--/.navbar -->
    <div class="container">
        <?php
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) :?>
            <?php foreach ($flashMessages as $key => $message)  : ?>
                <div class="alert alert-dismissable alert-<?php echo $key; ?>">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><?php echo   $message;?></strong>
                </div>
            <?php endforeach; ?>
        <?php endif;?>
        <?php echo $content; ?>
        <!-- Example row of columns -->
        <hr>
      
    </div> <!-- /container -->
<?php $this->endContent(); ?>
<?php cs()->registerCssFile($this->getBootstrap3LayoutCssFileURL()); ?>