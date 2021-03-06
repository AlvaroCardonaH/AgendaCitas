<?php

class ConductorController extends Controller
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
                //if (Yii::app()->user->checkAccess('AgendaCitasCedi_Conductor_Ver')) {
            
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
                //if (Yii::app()->user->checkAccess('AgendaCitasCedi_Conductor_Crear')) {
                    
                    $model=new Conductor;
                    // Uncomment the following line if AJAX validation is needed
                    // $this->performAjaxValidation($model);

                    $fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                    $model->FechaGraba = $fecha;
                    $model->FechaModifica = $fecha; 
                    $model->IdUsuarioGraba = Yii::app()->user->id;
                    $model->IdUsuarioModifica = Yii::app()->user->id;  

                    if(isset($_POST['Conductor']))
                    {
                            $model->attributes=$_POST['Conductor'];
                            if($model->save())
                                    $this->redirect(array('view','id'=>$model->IdConductor));
                    }

                    $this->render('create',array(
                            'model'=>$model,
                    )); 
                    
               /* } else {
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
		
        //if (Yii::app()->user->checkAccess('AgendaCitasCedi_Conductor_Modificar')) {
                
                $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                $fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );
                $model->FechaModifica = $fecha; 
                $model->IdUsuarioModifica = Yii::app()->user->id;
                
		if(isset($_POST['Conductor']))
		{
			$model->attributes=$_POST['Conductor'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdConductor));
		}

		$this->render('update',array(
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
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            //if (Yii::app()->user->checkAccess('AgendaCitasCedi_Conductor_Listar')){
            
		$model=new Conductor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Conductor']))
			$model->attributes=$_GET['Conductor'];

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
		$model=new Conductor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Conductor']))
			$model->attributes=$_GET['Conductor'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Conductor the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Conductor::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Conductor $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='conductor-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
