<?php



class UserSubscription extends \Phalcon\Mvc\Model
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
    public $identityUserId;

    /**
     *
     * @var integer
     */
    public $subscribedToUserId;

    /**
     *
     * @var string
     */
    public $date;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cooperemosappdb");
        $this->setSource("user_subscription");
        $this->belongsTo('IdentityUserId', 'IdentityUser', 'Id', ['alias' => 'IdentityUser']);
        $this->belongsTo('SubscribedToUserId', 'IdentityUser', 'Id', ['alias' => 'IdentityUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user_subscription';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserSubscription[]|UserSubscription|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserSubscription|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
