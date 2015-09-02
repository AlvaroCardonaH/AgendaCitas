<?php

class OrdenesCompraCitasCediController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column1';

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
	 */
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			//'model'=>$this->loadModel($id),
                    'model'=> OrdenesCompraCitasCedi::model()->getOrdenCompraCitaCedi($id),
                    
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new OrdenesCompraCitasCedi;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OrdenesCompraCitasCedi']))
		{
			$model->attributes=$_POST['OrdenesCompraCitasCedi'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->NumeroOrdenCompra));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $modelsolicitudcita =  new SolicitudCitaEntregaMercancia();
                
            $model=OrdenesCompraCitasCedi::model()->getOrdenCompraCitaCedi($id);
                
            if($model===null){
		throw new CHttpException(404,'The requested page does not exist.');
            }else{
                $modelsolicitudcita->IdFabricante = $model->IdFabricante;
                $modelsolicitudcita->IdCedi = $model->IdCedi;
                $modelsolicitudcita->IdTransportador = $model->IdTransportador;
                $modelsolicitudcita->IdOrdenCompra = $model->NumeroOrdenCompra;
                $modelsolicitudcita->FechaRegistroOrdenCompra = $model->FechaRegistroOrdenCompra;
                $modelsolicitudcita->FechaTentativaEntrega = $model->FechaTentativaEntrega;
                $modelsolicitudcita->TotalOrdenCompra = $model->TotalOrdenCompra;
                $modelsolicitudcita->IdEstadoSolicitudCita = 0;
                
                $fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $modelsolicitudcita->FechaGraba = $fecha;
                $modelsolicitudcita->FechaModifica = $fecha; 
                $modelsolicitudcita->IdUsuarioGraba = Yii::app()->user->id;
                $modelsolicitudcita->IdUsuarioModifica = Yii::app()->user->id;                
                
                if ($model->FechaSolicitudCita){
                    $modelsolicitudcita->FechaSolicitudCita = $model->FechaSolicitudCita;
                }else{
                    $modelsolicitudcita->FechaSolicitudCita = $model->FechaTentativaEntrega;
                    $model->FechaSolicitudCita =$model->FechaTentativaEntrega;
                }    
                
                $modelsolicitudcita->HoraSolicitudCita = $model->HoraDia;
                
                
                $model->IdEstadoOrdenCompra = 1;                
            }

		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);               
            
            if (isset($_POST['OrdenesCompraCitasCedi'])){
                $model->attributes=$_POST['OrdenesCompraCitasCedi'];
                
                if ($model->save()){
                              
                    $modelsolicitudcita->NumeroPiezas = $model->NumeroPiezas;
                    
                    if (isset($_POST['SolicitudCitaEntregaMercancia'])){
                        
                        $modelsolicitudcita->attributes=$_POST['SolicitudCitaEntregaMercancia'];
                        
                        if ($modelsolicitudcita->save()){
                            
                            $this->enviarEmailSolicitud($model, $modelsolicitudcita);
                            
                            $this->redirect(array('view','id'=>$model->NumeroOrdenCompra));
                        }                                    
                    }    
                }                                                    
            }
            
            $this->render('update',array(
		'model'=>$model,
                'modelsolicitudcita' => $modelsolicitudcita,
            ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            
            $dataProviderSolicitudes=new CActiveDataProvider(SolicitudCitaEntregaMercancia::model(), array(
			'keyAttribute'=>'IdNumeroSolicitud',
			'criteria'=>array(
                            'condition'=>'IdOrdenCompra=-1',                            
			),
                        'sort'=>array(
                                'defaultOrder'=>'FechaSolicitudCita DESC',
                        ),
            ));   
            
            if(Yii::app()->request->isAjaxRequest){
                
		// el update del CGridView Solicitudes hecho en Ajax produce un ajaxRequest sobre el mismo
		// action que lo invoco por primera vez y el argumento fue pasado mediante {data: xxx} al // momento de hacer el update al CGridView con id 'productos'
                
                if (isset($_GET[0]))
                    $numeroOrdenCompra = $_GET[0]; 
                else
                    $numeroOrdenCompra = -1;
                
		//Yii::log("\nAJAX_REQUEST\nPROVOCADO_POR_EL_UPDATE_AL_CGRIDVIEW_PRODUCTOS"
		//		."\nNumero Orden Compra seleccionada es=".$numeroOrdenCompra
                //,"info");
		
                // actualizas el criteria del data provider para ajustarlo a lo que se pide:
		$dataProviderSolicitudes->criteria = array('condition'=>'IdOrdenCompra='.$numeroOrdenCompra);
                
		// para responderle al request ajax debes hacer un ECHO con el JSON del dataprovider
		echo CJSON::encode($dataProviderSolicitudes);
            }            
            
            $model=new OrdenesCompraCitasCedi('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['OrdenesCompraCitasCedi']))
			$model->attributes=$_GET['OrdenesCompraCitasCedi'];

            $this->render('index',array(
			'model'=>$model,
                        'modelsolicitudcita'=>$dataProviderSolicitudes,
            ));            
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new OrdenesCompraCitasCedi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrdenesCompraCitasCedi']))
			$model->attributes=$_GET['OrdenesCompraCitasCedi'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return OrdenesCompraCitasCedi the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=OrdenesCompraCitasCedi::model()->findByPk($id);
                
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param OrdenesCompraCitasCedi $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ordenes-compra-citas-cedi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function enviarEmailSolicitud ($model, $modelsolicitudcita){
            
            $email = new EnviarEmail();
            
            // Traemos datos del Cedi - Usuario Administrador Cedi
            $elCedi = Cedi::getCedi($model->IdCedi);
            
            $elUsuarioAdmin = Usuarios::getUsuarioDocumento($elCedi->CedulaJefe);
                                
            $elUsuario = Usuarios::getUsuarioId(Yii::app()->user->id);
            
            if ($elUsuario){
		Yii::app()->user->setFlash('success', '<strong>Message sent!   </strong>Thank you for contacting us. We will respond to you as soon as possible.');      
            }

            
            if (($elUsuario) && ($elUsuarioAdmin)){
                
                $emailUsuarioAdmin = $elUsuarioAdmin->EmailUsuario;
                $nombreCompletoAdmin = $elUsuarioAdmin->PrimerNombre . ' ' . $elUsuarioAdmin->SegundoNombre . ' ' . $elUsuarioAdmin->PrimerApellido . ' ' . $elUsuarioAdmin->SegundoApellido;
                
                $emailUsuarioFabricante = $elUsuario->EmailUsuario;
                $nombreCompletoFabricante = $elUsuario->PrimerNombre . ' ' . $elUsuario->SegundoNombre . ' ' . $elUsuario->PrimerApellido . ' ' . $elUsuario->SegundoApellido;
                
                if (($emailUsuarioFabricante) && ($emailUsuarioAdmin)){
                    $body = "Numero Orden -> " . $model->NumeroOrdenCompra . "<br />"
                        . "Fecha Solicitud -> " . $modelsolicitudcita->FechaSolicitudCita . "<br />"
                        . 'Hora Solicitud -> ' . $modelsolicitudcita->HoraSolicitudCita . "<br />"
                        . 'CEDI -> ' . $model->NombreCedi . "<br />"
                        . 'Número Piezas -> ' . $model->NumeroPiezas . "<br />"
                        . 'Fabricante -> ' . $model->NombreFabricante . "<br />"    
                        . 'Transportadora -> ' . $model->NombreTransportador . "<br />"
                        . 'Observaciones -> ' . $modelsolicitudcita->ObservacionesSolicitudCita . "<br />";

                    $subject = 'Solicitud de Cita Nro : '.$modelsolicitudcita->IdNumeroSolicitud
                                        . ' - Fabricante : ' . $model->NombreFabricante;

                    $message = $body;

                    $email->enviar(
                            array($emailUsuarioFabricante, $nombreCompletoFabricante), 
                            array($emailUsuarioAdmin, $nombreCompletoAdmin), 
                            $subject, 
                            $message
                    );
                }    
            }                
        }
}
