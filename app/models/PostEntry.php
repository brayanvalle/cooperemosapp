<?php



class PostEntry extends \Phalcon\Mvc\Model
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
    public $title;

    /**
     *
     * @var string
     */
    public $body;

    /**
     *
     * @var integer
     */
    public $likesCount;

    /**
     *
     * @var integer
     */
    public $shareCount;

    /**
     *
     * @var string
     */
    public $mainBannerImageUrl;

    /**
     *
     * @var integer
     */
    public $createdByUserId;

    /**
     *
     * @var string
     */
    public $creationDate;

    /**
     *
     * @var integer
     */
    public $isPublished;

    /**
     *
     * @var string
     */
    public $publicationDate;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cooperemosappdb");
        $this->setSource("post_entry");
        $this->hasMany('Id', 'PostUserInteraction', 'PostEntryId', ['alias' => 'PostUserInteraction']);
        $this->belongsTo('Id', 'entityUser', 'Id', ['alias' => 'IdentityUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'post_entry';
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
