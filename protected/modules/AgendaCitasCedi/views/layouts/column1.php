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
                                //array('label' => 'Conductores', 'url' => array('conductor/index'), ),
                                array('label' => 'Motivos Bloqueo Fecha', 'url' => array('motivosBloqueoFecha/index'), ),
                                //array('label' => 'Roles', 'url' => array('roles/index'), ),
                                array('label' => 'Tipos de Muelle', 'url' => array('tiposMuelle/index'), ),
                                array('label' => 'Tipos de Fabricante', 'url' => array('tiposFabricante/index'), ),
                                array('label' => 'Tipos de Entrega', 'url' => array('tiposEntrega/index'), ),
                                
                                )   
                        ),
                        array('label' => 'Cedi', 'url' => array('#'), 'itemOptions' => array('class' => 'dropdown'),
                            'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                            'submenuOptions' => array('class' => 'dropdown-menu'),
                            'items' => array(
                                array('label' => 'Agendar Citas', 'url' => array('tAgendacitascedi/index'), ),
                                array('label' => '', 'url' => array('#'), 'itemOptions' => array('class' => 'divider')),
                                array('label' => 'Gestionar Solicitudes', 'url' => array('solicitudCitaEntregaMercancia/index'), ),
                                array('label' => 'Logistica Entrega', 'url' => array('logisticaFabricante/index'), ),
                                array('label' => 'Fecha Bloqueadas', 'url' => array('fechasBloqueadas/index'), ),
                                array('label' => 'Muelles', 'url' => array('muelles/index'), ),
                                array('label' => '', 'url' => array('#'), 'itemOptions' => array('class' => 'divider')),
                                array('label' => 'Usuarios', 'url' => array('user/index'), ),
                            )
                        ), 
                        array('label' => 'Fabricantes', 'url' => array('#'), 'itemOptions' => array('class' => 'dropdown'),
                            'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                            'submenuOptions' => array('class' => 'dropdown-menu'),
                            'items' => array(
                                array('label' => 'Acuerdos Entrega', 'url' => array('acuerdosEntregaFabricante/index'), ),
                                //array('label' => 'Logistica Entrega', 'url' => array('logisticaFabricante/index'), ),
                                array('label' => '', 'url' => array('#'), 'itemOptions' => array('class' => 'divider')),
                                array('label' => 'Solicitud de Cita', 'url' => array('ordenesCompraCitasCedi/index'), ),
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
						array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), ),
						
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