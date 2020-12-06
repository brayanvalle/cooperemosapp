<?php



class PostUserInteractionType extends \Phalcon\Mvc\Model
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
    public $Name;

    /**
     *
     * @var string
     */
    public $KeyName;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("_app_post_user_interaction_type");
        $this->hasMany('Id', 'PostUserInteraction', 'PostUserInteractionTypeId', ['alias' => 'PostUserInteraction']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return '_app_post_user_interaction_type';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PostUserInteractionType[]|PostUserInteractionType|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PostUserInteractionType|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
