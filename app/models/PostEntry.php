<?php
class PostEntry extends \Phalcon\Mvc\Model
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
    public $HashId;

    /**
     *
     * @var string
     */
    public $Title;

    /**
     *
     * @var string
     */
    public $Body;

    /**
     *
     * @var integer
     */
    public $LikesCount;

    /**
     *
     * @var integer
     */
    public $ShareCount;

    /**
     *
     * @var string
     */
    public $MainBannerImageUrl;

    /**
     *
     * @var integer
     */
    public $XreatedByUserId;

    /**
     *
     * @var string
     */
    public $XreationDate;

    /**
     *
     * @var integer
     */
    public $IsPublished;

    /**
     *
     * @var string
     */
    public $PublicationDate;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("_app_post_entry");
        $this->hasMany('Id', 'PostUserInteraction', 'PostEntryId', ['alias' => 'PostUserInteraction']);
        $this->belongsTo('CreatedByUserId', 'IdentityUser', 'Id', ['alias' => 'IdentityUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return '_app_post_entry';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PostEntry[]|PostEntry|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PostEntry|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
