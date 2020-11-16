<?php



class PluginGamePost extends \Phalcon\Mvc\Model
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
    public $PluginId;

    /**
     *
     * @var string
     */
    public $CreationDate;

    /**
     *
     * @var integer
     */
    public $IsPublished;

    /**
     *
     * @var integer
     */
    public $IsActive;

    /**
     *
     * @var string
     */
    public $Titile;

    /**
     *
     * @var string
     */
    public $Body;

    /**
     *
     * @var string
     */
    public $BannerImageUrl;

    /**
     *
     * @var string
     */
    public $PublishedDate;

    /**
     *
     * @var string
     */
    public $EditedDate;

    /**
     *
     * @var string
     */
    public $ValidUntil;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("_app_plugin_game_post");
        $this->hasMany('Id', 'PluginGamePostInteraction', 'PluginGameId', ['alias' => 'PluginGamePostInteraction']);
        $this->belongsTo('PluginId', 'Plugin', 'Id', ['alias' => 'Plugin']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return '_app_plugin_game_post';
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
