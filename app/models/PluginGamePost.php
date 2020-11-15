<?php



class PluginGamePost extends \Phalcon\Mvc\Model
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
    public $pluginId;

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
     * @var integer
     */
    public $isActive;

    /**
     *
     * @var string
     */
    public $titile;

    /**
     *
     * @var string
     */
    public $body;

    /**
     *
     * @var string
     */
    public $bannerImageUrl;

    /**
     *
     * @var string
     */
    public $publishedDate;

    /**
     *
     * @var string
     */
    public $editedDate;

    /**
     *
     * @var string
     */
    public $validUntil;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cooperemosappdb");
        $this->setSource("plugin_game_post");
        $this->hasMany('Id', 'uginGamePostInteraction', 'PluginGameId', ['alias' => 'PluginGamePostInteraction']);
        $this->belongsTo('PluginId', 'ugin', 'Id', ['alias' => 'Plugin']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'plugin_game_post';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PluginGamePost[]|PluginGamePost|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PluginGamePost|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
