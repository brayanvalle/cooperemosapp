<?php

class Entity extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var integer
     */
    public $entityTypeId;

    /**
     *
     * @var integer
     */
    public $entityCountryId;

    /**
     *
     * @var string
     */
    public $personContactName;

    /**
     *
     * @var string
     */
    public $personContactEmail;

    /**
     *
     * @var string
     */
    public $personContactPhoneNumber;

    /**
     *
     * @var integer
     */
    public $entityApp;

    /**
     *
     * @var string
     */
    public $website;

    /**
     *
     * @var string
     */
    public $nit;

    /**
     *
     * @var integer
     */
    public $entityCityId;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("entity");
        $this->hasMany('Id', 'AgreementEntity', 'EntityId', ['alias' => 'AgreementEntity']);
        $this->hasMany('Id', 'Mobility', 'EntityHostId', ['alias' => 'Mobility']);
        $this->hasMany('Id', 'SchoolDepartment', 'EntityId', ['alias' => 'SchoolDepartment']);
        $this->belongsTo('EntityTypeId', 'EntityType', 'Id', ['alias' => 'EntityType']);
        $this->belongsTo('EntityCityId', 'LocationCity', 'Id', ['alias' => 'LocationCity']);
        $this->belongsTo('EntityCountryId', 'LocationCountry', 'Id', ['alias' => 'LocationCountry']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'entity';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Entity[]|Entity|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Entity|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
