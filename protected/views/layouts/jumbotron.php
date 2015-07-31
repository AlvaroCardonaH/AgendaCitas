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
                        array('label' => 'Home', 'url' => array('/site/index')),
                        array('label' => 'Agenda Citas Cedi', 'url' => array('/AgendaCitasCedi')),
                                           
                        
                    ),
                    // 'htmlOptions'=>array('class'=>'main-menu')
                    'htmlOptions' => array('class' => 'nav navbar-nav')
                )); 
                
                ?>
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