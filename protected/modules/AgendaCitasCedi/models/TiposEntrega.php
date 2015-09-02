<?php

/**
 * This is the model class for table "m_tiposentrega".
 *
 * The followings are the available columns in table 'm_tiposentrega':
 * @property integer $IdTipoEntrega
 * @property string $NombreTipoEntrega
 * @property string $ObservacionesTipoEntrega
 * @property integer $IdUsuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 */
class TiposEntrega extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_TiposEntrega';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NombreTipoEntrega, ObservacionesTipoEntrega', 'required'),
			array('NombreTipoEntrega', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdTipoEntrega, NombreTipoEntrega, ObservacionesTipoEntrega', 'safe', 'on'=>'search'),
                        array('NombreTipoEntrega','unique',
                                'caseSensitive'=>true,
                                'allowEmpty'=>true,  
                                'message'=>'Nombre Ya Existe'
                        ),                                                            
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
			'IdTipoEntrega' => 'ID',
			'NombreTipoEntrega' => 'Nombre',
                        'ObservacionesTipoEntrega' => 'Observaciones',
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

		$criteria->compare('IdTipoEntrega',$this->IdTipoEntrega);
		$criteria->compare('NombreTipoEntrega',$this->NombreTipoEntrega,true);
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
	 * @return Tiposentrega the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function  getListaTiposEntrega(){

            $tipoentrega = TiposEntrega::model()->findAll(
                        array(
                                  'select'=>'IdTipoEntrega, NombreTipoEntrega',
                                  'condition'=>''
                        )
                    );

            $listaTiposEntrega = array();
            $listaTiposEntrega [] = "";

            foreach ($tipoentrega as $reg){ 
                $listaTiposEntrega[$reg->IdTipoEntrega] = $reg->NombreTipoEntrega;
            }

            return $listaTiposEntrega;
        }

        public function getTipoEntrega ($_Id){
            $elTipoEntrega = TiposEntrega::model()->findByPk($_Id);
        }
        
        public function getNombreTipoEntrega ($_Id){

            $elNombreTipoEntrega = '';
            
            $criteria=new CDbCriteria;
            $criteria->select='NombreTipoEntrega';  // seleccionar solo la columna 'title'
            $criteria->condition='IdTipoEntrega=:IdTipoEntrega';
            $criteria->params=array(':IdTipoEntrega'=>$_Id);
            
            $elTipoEntrega = TiposEntrega::model()->find($criteria); // $params no es necesario            
            
            if ($elTipoEntrega != null){                
                $elNombreTipoEntrega = $elTipoEntrega->NombreTipoEntrega;                
            }
            return $elNombreTipoEntrega;
            
        }
        
}
