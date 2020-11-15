<?php



class IdentityUser extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $Id;

    /**
     *
     * @var string
     */
    public $UserHashId;

    /**
     *
     * @var string
     */
    public $PasswordHash;

    /**
     *
     * @var string
     */
    public $Email;

    /**
     *
     * @var string
     */
    public $GoogleId;

    /**
     *
     * @var integer
     */
    public $IsActive;

    /**
     *
     * @var string
     */
    public $CreatedAt;

    /**
     *
     * @var string
     */
    public $LastConnectionDate;

    /**
     *
     * @var integer
     */
    public $IdentityRoleId;

    /**
     *
     * @var string
     */
    public $PasswordRecoveryToken;

    /**
     *
     * @var string
     */
    public $UpdatedAt;

    /**
     *
     * @var integer
     */
    public $ExternalUserProfileId;

    /**
     *
     * @var integer
     */
    public $IsInternal;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cooperemosappdb");
        $this->setSource("identity_user");
        $this->hasMany('Id', 'PluginGamePostInteraction', 'IdentityUserId', ['alias' => 'PluginGamePostInteraction']);
        $this->hasMany('Id', 'PostEntry', 'Id', ['alias' => 'PostEntry']);
        $this->hasMany('Id', 'PostUserInteraction', 'IdentityUserId', ['alias' => 'PostUserInteraction']);
        $this->hasMany('Id', 'UserSubscription', 'IdentityUserId', ['alias' => 'UserSubscription']);
        $this->hasMany('Id', 'UserSubscription', 'SubscribedToUserId', ['alias' => 'UserSubscription']);
        $this->belongsTo('IdentityRoleId', 'IdentityRole', 'Id', ['alias' => 'IdentityRole']);
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
