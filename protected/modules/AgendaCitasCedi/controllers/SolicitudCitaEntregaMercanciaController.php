<?php

class SolicitudCitaEntregaMercanciaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='/layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
         * 
         */

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
            //if (Yii::app()->user->checkAccess('AgendaCitasCedi_SolicitudCitaEntregaMercancia_Ver')) {
                $this->render('view',array(
			'model'=>$this->loadModel($id),
		));
            /*} else {
                    $this->render('//site/error', array(
                    'code' => '101',
                    'message' => Yii::app()->params ['accessError']
                    ));
            }*/
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            //if (Yii::app()->user->checkAccess('AgendaCitasCedi_SolicitudCitaEntregaMercancia_Crear')) {
                $model=new SolicitudCitaEntregaMercancia;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SolicitudCitaEntregaMercancia']))
		{
			$model->attributes=$_POST['SolicitudCitaEntregaMercancia'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdNumeroSolicitud));
		}

		$this->render('create',array(
			'model'=>$model,
		));            /*} else {
                    $this->render('//site/error', array(
                    'code' => '101',
                    'message' => Yii::app()->params ['accessError']
                    ));
            }*/
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            //if (Yii::app()->user->checkAccess('AgendaCitasCedi_SolicitudCitaEntregaMercancia_Modificar')) {
                //$model=$this->loadModel($id);                
            
                $modelagenda = new AgendaCitasCedi();
                         
                $model= SolicitudCitaEntregaMercancia::model()->getSolicitudCita($id);
                
                $modelmuelles=new CActiveDataProvider(Muelles::model(), array(
                            'keyAttribute'=>'IdMuelle',
                            'criteria'=>array(
                                'condition'=>'IdCedi='.$model->IdCedi,                            
                            ),
                            'sort'=>array(
                                    'defaultOrder'=>'IdMuelle ASC',
                            ),
                ));   
                
                $modelagenda->FechaSolicitudCita = $model->FechaSolicitudCita;
                $modelagenda->HoraSolicitudCita = $model->HoraSolicitudCita;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SolicitudCitaEntregaMercancia']))
		{
                    $model->attributes=$_POST['SolicitudCitaEntregaMercancia'];
                    $model->IdEstadoSolicitudCita = 1;
                        
                    if($model->save()){
                        
                        $fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                        $modelagenda->FechaGraba = $fecha;
                        $modelagenda->FechaModifica = $fecha; 
                        $modelagenda->IdUsuarioGraba = Yii::app()->user->id;
                        $modelagenda->IdUsuarioModifica = Yii::app()->user->id; 
                        
                        $modelagenda->IdCedi = $model->IdCedi;
                        $modelagenda->IdNumeroSolicitud = $model->IdNumeroSolicitud;
                        $modelagenda->TituloEvento = $model->NombreFabricante . ' - ' .$model->IdNumeroSolicitud;
                        
                        $fechaaux = $modelagenda->FechaSolicitudCita . ' ' . $modelagenda->HoraSolicitudCita;
                        
                        $modelagenda->FechaInicio = $fechaaux;
                        $modelagenda->FechaFinal = $fechaaux;

                        if(isset($_POST['AgendaCitasCedi'])){
                            $modelagenda->attributes=$_POST['AgendaCitasCedi'];
                            if ($modelagenda->save()){
                                $this->redirect(array('view','id'=>$model->IdNumeroSolicitud));
                            }
                        }                                        
                    }        
		}

		$this->render('update',array(
                    'model'=>$model,
                    'modelagenda'=>$modelagenda,
                    'modelmuelles'=>$modelmuelles,
                   // 'modeldetalle'=>$modeldetalle,
		));
            /*} else {
                    $this->render('//site/error', array(
                    'code' => '101',
                    'message' => Yii::app()->params ['accessError']
                    ));
            }*/
		
	}
        
        public function actionReprogramar($id)
	{
                //if (Yii::app()->user->checkAccess('AgendaCitasCedi_SolicitudCitaEntregaMercancia_Reprogramar')) {
                    //$model=$this->loadModel($id);                
            
                $modelagenda = new AgendaCitasCedi();
            
                $model= SolicitudCitaEntregaMercancia::model()->getSolicitudCita($id);
                
                $modelmuelles=new CActiveDataProvider(Muelles::model(), array(
                            'keyAttribute'=>'IdMuelle',
                            'criteria'=>array(
                                'condition'=>'IdCedi='.$model->IdCedi,                            
                            ),
                            'sort'=>array(
                                    'defaultOrder'=>'IdMuelle ASC',
                            ),
                ));   
                
              //  $modelagenda->FechaSolicitudCita = $model->FechaSolicitudCita;
                //$modelagenda->HoraSolicitudCita = $model->HoraSolicitudCita;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SolicitudCitaEntregaMercancia']))
		{
                    $model->attributes=$_POST['SolicitudCitaEntregaMercancia'];
                    $model->IdEstadoSolicitudCita = 1;
                        
                    if($model->save()){
                        
                        $fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                        $modelagenda->FechaGraba = $fecha;
                        $modelagenda->FechaModifica = $fecha; 
                        $modelagenda->IdUsuarioGraba = Yii::app()->user->id;
                        $modelagenda->IdUsuarioModifica = Yii::app()->user->id; 
                        
                        $modelagenda->IdCedi = $model->IdCedi;
                        $modelagenda->TituloEvento = $model->NombreFabricante . ' - ' .$model->IdOrdenCompra;
                        
                        //$fechaaux = $modelagenda->FechaSolicitudCita . ' ' . $modelagenda->HoraSolicitudCita;
                        
                        //$modelagenda->FechaInicio = $fechaaux;
                        //$modelagenda->FechaFinal = $fechaaux;

                        if(isset($_POST['AgendaCitasCedi'])){
                            $modelagenda->attributes=$_POST['AgendaCitasCedi'];
                            if ($modelagenda->save()){
                                $this->redirect(array('view','id'=>$model->IdNumeroSolicitud));
                            }
                        }                                        
                    }        
		}

		$this->render('reprogramar',array(
                    'model'=>$model,
                    'modelagenda'=>$modelagenda,
                    'modelmuelles'=>$modelmuelles,
		));
                /*} else {
                        $this->render('//site/error', array(
                        'code' => '101',
                        'message' => Yii::app()->params ['accessError']
                        ));
                }*/
		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//$this->loadModel($id)->delete();
                $model=$this->loadModel($id);
                $model->IdEstadoSolicitudCita = 3;
                $model->save();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            //if (Yii::app()->user->checkAccess('AgendaCitasCedi_SolicitudCitaEntregaMercancia_Listar')) {
                $model=new SolicitudCitaEntregaMercancia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SolicitudCitaEntregaMercancia']))
			$model->attributes=$_GET['SolicitudCitaEntregaMercancia'];

		$this->render('index',array(
			'model'=>$model,
		));
            /*} else {
                    $this->render('//site/error', array(
                    'code' => '101',
                    'message' => Yii::app()->params ['accessError']
                    ));
            }*/
		            
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SolicitudCitaEntregaMercancia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SolicitudCitaEntregaMercancia']))
			$model->attributes=$_GET['SolicitudCitaEntregaMercancia'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
       /* public function actionCancelar($id)
        {
            $model=new SolicitudCitaEntregaMercancia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SolicitudCitaEntregaMercancia']))
			$model->attributes=$_GET['SolicitudCitaEntregaMercancia'];

		$this->render('admin',array(
			'model'=>$model,
		));
        }*/

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SolicitudCitaEntregaMercancia the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SolicitudCitaEntregaMercancia::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SolicitudCitaEntregaMercancia $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='solicitud-cita-entrega-mercancia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
}
