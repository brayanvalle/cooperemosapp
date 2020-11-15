<?php



class PostUserInteraction extends \Phalcon\Mvc\Model
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
    public $PostEntryId;

    /**
     *
     * @var integer
     */
    public $IdentityUserId;

    /**
     *
     * @var string
     */
    public $Date;

    /**
     *
     * @var integer
     */
    public $PostUserInteractionTypeId;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cooperemosappdb");
        $this->setSource("post_user_interaction");
        $this->belongsTo('IdentityUserId', 'IdentityUser', 'Id', ['alias' => 'IdentityUser']);
        $this->belongsTo('PostEntryId', 'PostEntry', 'Id', ['alias' => 'PostEntry']);
        $this->belongsTo('PostUserInteractionTypeId', 'PostUserInteractionType', 'Id', ['alias' => 'PostUserInteractionType']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'post_user_interaction';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PostUserInteraction[]|PostUserInteraction|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PostUserInteraction|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
