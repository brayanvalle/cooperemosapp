<?php



class ExternalServiceProvider extends \Phalcon\Mvc\Model
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
    public $hashId;

    /**
     *
     * @var string
     */
    public $token;

    /**
     *
     * @var string
     */
    public $apiUrl;

    /**
     *
     * @var string
     */
    public $name;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cooperemosappdb");
        $this->setSource("external_service_provider");
        $this->hasMany('Id', 'Plugin', 'ExternalServiceProviderId', ['alias' => 'Plugin']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'external_service_provider';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ExternalServiceProvider[]|ExternalServiceProvider|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ExternalServiceProvider|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
