<?php



class LocationCity extends \Phalcon\Mvc\Model
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
    public $stateId;

    /**
     *
     * @var string
     */
    public $cityCode;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("location_city");
        $this->hasMany('Id', 'Agreement', 'LocationCityId', ['alias' => 'Agreement']);
        $this->hasMany('Id', 'Entity', 'EntityCityId', ['alias' => 'Entity']);
        $this->hasMany('Id', 'Mobility', 'DestinationLocationId', ['alias' => 'Mobility']);
        $this->hasMany('Id', 'Mobility', 'OriginLocationId', ['alias' => 'Mobility']);
        $this->hasMany('Id', 'SchoolProgram', 'LocationCityId', ['alias' => 'SchoolProgram']);
        $this->belongsTo('StateId', 'LocationState', 'Id', ['alias' => 'LocationState']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'location_city';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return LocationCity[]|LocationCity|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return LocationCity|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
