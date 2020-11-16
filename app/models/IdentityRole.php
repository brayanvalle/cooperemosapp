<?php



class IdentityRole extends \Phalcon\Mvc\Model
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
    public $KeyName;

    /**
     *
     * @var string
     */
    public $Name;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("_app_identity_role");
        $this->hasMany('Id', 'IdentityUser', 'IdentityRoleId', ['alias' => 'IdentityUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return '_app_identity_role';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return IdentityRole[]|IdentityRole|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return IdentityRole|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
