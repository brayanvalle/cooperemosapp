<?php



class IdentityUser extends \Phalcon\Mvc\Model
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
    public $userHashId;

    /**
     *
     * @var string
     */
    public $passwordHash;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $googleId;

    /**
     *
     * @var integer
     */
    public $isActive;

    /**
     *
     * @var string
     */
    public $createdAt;

    /**
     *
     * @var string
     */
    public $lastConnectionDate;

    /**
     *
     * @var integer
     */
    public $identityRoleId;

    /**
     *
     * @var string
     */
    public $passwordRecoveryToken;

    /**
     *
     * @var string
     */
    public $updatedAt;

    /**
     *
     * @var integer
     */
    public $externalUserProfileId;

    /**
     *
     * @var integer
     */
    public $isInternal;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cooperemosappdb");
        $this->setSource("identity_user");
        $this->hasMany('Id', 'uginGamePostInteraction', 'IdentityUserId', ['alias' => 'PluginGamePostInteraction']);
        $this->hasMany('Id', 'stEntry', 'Id', ['alias' => 'PostEntry']);
        $this->hasMany('Id', 'stUserInteraction', 'IdentityUserId', ['alias' => 'PostUserInteraction']);
        $this->hasMany('Id', 'erSubscription', 'IdentityUserId', ['alias' => 'UserSubscription']);
        $this->hasMany('Id', 'erSubscription', 'SubscribedToUserId', ['alias' => 'UserSubscription']);
        $this->belongsTo('IdentityRoleId', 'entityRole', 'Id', ['alias' => 'IdentityRole']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'identity_user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return IdentityUser[]|IdentityUser|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return IdentityUser|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
