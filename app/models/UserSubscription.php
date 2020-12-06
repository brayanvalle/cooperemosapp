<?php



class UserSubscription extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $Id;

    /**
     *
     * @var integer
     */
    public $IdentityUserId;

    /**
     *
     * @var integer
     */
    public $SubscribedToUserId;

    /**
     *
     * @var string
     */
    public $Date;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("_app_user_subscription");
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
        return '_app_user_subscription';
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
