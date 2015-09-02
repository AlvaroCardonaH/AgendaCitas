<?php

class AgendaCitasCediController extends Controller
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
	
	public function actionView($id)
	{
            //if (Yii::app()->user->checkAccess('AgendaCitasCedi_AgendaCitasCedi_Ver')) {
                $this->render('view',array(
			'model'=>$this->loadModel($id),
		));
            /*} else {
            $this->render('//site/error', array(
            'code' => '101',
            'message' => Yii::app()->params ['accessError']
            ));
            }
		
	}
         
         */

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            //if (Yii::app()->user->checkAccess('AgendaCitasCedi_AgendaCitasCedi_Crear')) {
                $model=new AgendaCitasCedi;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AgendaCitasCedi']))
		{
			$model->attributes=$_POST['AgendaCitasCedi'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdEventoAgenda));
		}

		$this->render('create',array(
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
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            //if (Yii::app()->user->checkAccess('AgendaCitasCedi_AgendaCitasCedi_Modificar')) {
                $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AgendaCitasCedi']))
		{
			$model->attributes=$_POST['AgendaCitasCedi'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdEventoAgenda));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($IdMuelle)
	{                
                /*$dataProvider=new CActiveDataProvider(AgendaCitasCedi::model(), array(
                            'keyAttribute'=>'IdEventoAgenda',
                            'criteria'=>array(
                                'condition'=>'IdMuelle='.$IdMuelle,                            
                            ),
                ));*/   
                
                
		//$dataProvider=new CActiveDataProvider('AgendaCitasCedi');
                //if (Yii::app()->user->checkAccess('AgendaCitasCedi_AgendaCitasCedi_Listar')) {
                        $this->render('index',array(
			//'model'=>$dataProvider,
                        'IdMuelle'=>$IdMuelle,
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
		$model=new AgendaCitasCedi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AgendaCitasCedi']))
			$model->attributes=$_GET['AgendaCitasCedi'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=AgendaCitasCedi::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='agenda-citas-cedi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
    public function actionCalendarEvents($IdMuelle)
    {       
        $items = array();
        $model= AgendaCitasCedi::model()->findAll(
                        array(
                                  'select'=>'* ',
                            
                                  'condition' => 'IdMuelle = :IdMuelle',
                                  'params'    => array(':IdMuelle' => $IdMuelle),
                        )                
                ); 
        
        
        foreach ($model as $value) {
            $items[]=array(
                'id'=>$value->IdEventoAgenda,
                'title'=>$value->TituloEvento,
                'start'=>$value->FechaInicio,
                'end'=>date('Y-m-d', strtotime('+1 day', strtotime($value->FechaFinal))),
                //'color'=>'#CC0000',
                //'allDay'=>true,
                'url'=>'#',
            );
        }
        echo CJSON::encode($items);
        Yii::app()->end();
    }        
}
