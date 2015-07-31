<?php

/**
 * This is the model class for table "m_tiposmuelle".
 *
 * The followings are the available columns in table 'm_tiposmuelle':
 * @property integer $IdTipoMuelle
 * @property string $NombreTipoMuelle
 * @property string $ObservacionesTipoMuelle
 * @property integer $IdUsuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 */
class TiposMuelle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_tiposmuelle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NombreTipoMuelle, ObservacionesTipoMuelle', 'required'),
			array('NombreTipoMuelle', 'length', 'max'=>45),
			array('ObservacionesTipoMuelle', 'length', 'max'=>255),
                        array('NombreTipoMuelle','unique',
                                'caseSensitive'=>true,
                                'allowEmpty'=>true,  
                                'message'=>'Nombre Ya Existe'
                        ),                                        
                    
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdTipoMuelle, NombreTipoMuelle, ObservacionesTipoMuelle', 'safe', 'on'=>'search'),
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
			'IdTipoMuelle' => 'ID',
			'NombreTipoMuelle' => 'Nombre',
			'ObservacionesTipoMuelle' => 'Observaciones',
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

		$criteria->compare('IdTipoMuelle',$this->IdTipoMuelle);
		$criteria->compare('NombreTipoMuelle',$this->NombreTipoMuelle,true);
		$criteria->compare('ObservacionesTipoMuelle',$this->ObservacionesTipoMuelle,true);
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
	 * @return TiposMuelle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function  getListaTiposMuelle(){

            $tiposmuelle = TiposMuelle::model()->findAll(
                        array(
                                  'select'=>'IdTipoMuelle, NombreTipoMuelle',
                                  'condition'=>''
                        )
                    );

            $listaTiposMuelle = array();
            $listaTiposMuelle [] = "";

            foreach ($tiposmuelle as $reg){ 
                $listaTiposMuelle[$reg->IdTipoMuelle] = $reg->NombreTipoMuelle;
            }

            return $listaTiposMuelle;
        }

        public static function getTipoMuelle ($_Id){
            $elTipoMuelle = TiposMuelle::model()->findByPk($_Id);
            
            return $elTipoMuelle;
        }
        
        public static function getNombreTipoMuelle ($_Id){

            $elNombreTipoMuelle = '';
            
            $criteria=new CDbCriteria;
            $criteria->select='NombreTipoMuelle';  // seleccionar solo la columna 'title'
            $criteria->condition='IdTipoMuelle=:Id';
            $criteria->params=array(':Id'=>$_Id);
            
            $elTipoMuelle = TiposMuelle::model()->find($criteria); // $params no es necesario            
            
            if ($elTipoMuelle != null){                
                $elNombreTipoMuelle = $elTipoMuelle->NombreTipoMuelle;                
            }
            return $elNombreTipoMuelle;
            
        }
        
}
