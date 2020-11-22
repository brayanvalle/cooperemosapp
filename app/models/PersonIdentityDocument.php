<?php



class PersonIdentityDocument extends \Phalcon\Mvc\Model
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
    public $personId;

    /**
     *
     * @var integer
     */
    public $identityDocumentId;

    /**
     *
     * @var string
     */
    public $expeditionDate;

    /**
     *
     * @var string
     */
    public $number;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("person_identity_document");
        $this->belongsTo('IdentityDocumentId', 'IdentityDocument', 'Id', ['alias' => 'IdentityDocument']);
        $this->belongsTo('PersonId', 'Person', 'Id', ['alias' => 'Person']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'person_identity_document';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PersonIdentityDocument[]|PersonIdentityDocument|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PersonIdentityDocument|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
