<?php



class PluginGamePostInteraction extends \Phalcon\Mvc\Model
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
    public $pluginGameId;

    /**
     *
     * @var integer
     */
    public $identityUserId;

    /**
     *
     * @var string
     */
    public $body;

    /**
     *
     * @var string
     */
    public $date;

    /**
     *
     * @var string
     */
    public $assetUrl;

    /**
     *
     * @var string
     */
    public $externalLinkUrl;

    /**
     *
     * @var integer
     */
    public $hasWon;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cooperemosappdb");
        $this->setSource("plugin_game_post_interaction");
        $this->belongsTo('PluginGameId', 'uginGamePost', 'Id', ['alias' => 'PluginGamePost']);
        $this->belongsTo('IdentityUserId', 'entityUser', 'Id', ['alias' => 'IdentityUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'plugin_game_post_interaction';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PluginGamePostInteraction[]|PluginGamePostInteraction|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PluginGamePostInteraction|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
