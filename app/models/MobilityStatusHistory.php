<?php
class MobilityStatusHistory extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $current;

    /**
     *
     * @var string
     */
    public $date;

    /**
     *
     * @var integer
     */
    public $createdById;

    /**
     *
     * @var integer
     */
    public $mobilityId;

    /**
     *
     * @var integer
     */
    public $mobilityStatusId;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("mobility_status_history");
        $this->belongsTo('CreatedById', 'IdentityUser', 'Id', ['alias' => 'IdentityUser']);
        $this->belongsTo('MobilityId', 'Mobility', 'Id', ['alias' => 'Mobility']);
        $this->belongsTo('MobilityStatusId', 'MobilityStatus', 'Id', ['alias' => 'MobilityStatus']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'mobility_status_history';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MobilityStatusHistory[]|MobilityStatusHistory|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MobilityStatusHistory|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
