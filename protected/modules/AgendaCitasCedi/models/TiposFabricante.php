<?php

/**
 * This is the model class for table "m_tiposfabricante".
 *
 * The followings are the available columns in table 'm_tiposfabricante':
 * @property integer $IdTipoFabricante
 * @property string $NombreTipoFabricante
 * @property string $ObservacionesTipoFabricante
 * @property integer $IdUsuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 */
class TiposFabricante extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_tiposfabricante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NombreTipoFabricante, ObservacionesTipoFabricante', 'required'),
			array('NombreTipoFabricante', 'length', 'max'=>45),
			array('ObservacionesTipoFabricante', 'length', 'max'=>255),
			array('FechaModifica', 'safe'),
                        array('NombreTipoFabricante','unique',
                                'caseSensitive'=>true,
                                'allowEmpty'=>true,  
                                'message'=>'Nombre Ya Existe'
                        ),                                        
                    
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdTipoFabricante, NombreTipoFabricante, ObservacionesTipoFabricante', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdTipoFabricante' => 'ID',
			'NombreTipoFabricante' => 'Nombre',
			'ObservacionesTipoFabricante' => 'Observaciones',
			'IdUsuarioGraba' => 'Id Usuario Graba',
			'FechaGraba' => 'Fecha Graba',
			'IdUsuarioModifica' => 'Id Usuario Modifica',
			'FechaModifica' => 'Fecha Modifica',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('IdTipoFabricante',$this->IdTipoFabricante);
		$criteria->compare('NombreTipoFabricante',$this->NombreTipoFabricante,true);
		$criteria->compare('ObservacionesTipoFabricante',$this->ObservacionesTipoFabricante,true);
		$criteria->compare('IdUsuarioGraba',$this->IdUsuarioGraba);
		$criteria->compare('FechaGraba',$this->FechaGraba,true);
		$criteria->compare('IdUsuarioModifica',$this->IdUsuarioModifica);
		$criteria->compare('FechaModifica',$this->FechaModifica,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TiposFabricante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function  getListaTiposFabricante(){

            $tiposfabricante = TiposFabricante::model()->findAll(
                        array(
                                  'select'=>'IdTipoFabricante, NombreTipoFabricante',
                                  'condition'=>''
                        )
            );

            $listaTiposFabricante = array();
            $listaTiposFabricante [] = "";

            foreach ($tiposfabricante as $reg){ 
                $listaTiposFabricante[$reg->IdTipoFabricante] = $reg->NombreTipoFabricante;
            }

            return $listaTiposFabricante;
        }

        public static function getTipoFabricante ($_Id){
            $elTipoFabricante = TiposFabricante::model()->findByPk($_Id);
        }
        
        public static function getNombreTipoFabricante ($_Id){
            
            $elNombreTipoFabricante = '';
            
            $criteria=new CDbCriteria;
            $criteria->select='NombreTipoFabricante';  // seleccionar solo la columna 'title'
            $criteria->condition='IdTipoFabricante=:IdTipoFabricante';
            $criteria->params=array(':IdTipoFabricante'=>$_Id);
            
            $elTipoFabricante = TiposFabricante::model()->find($criteria); // $params no es necesario            
            
            if ($elTipoFabricante != null){                
                $elNombreTipoFabricante = $elTipoFabricante->NombreTipoFabricante;                
            }
            return $elNombreTipoFabricante;
        }
        
}
