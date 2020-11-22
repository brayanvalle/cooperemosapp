<?php



class Person extends \Phalcon\Mvc\Model
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
    public $fullName;

    /**
     *
     * @var integer
     */
    public $idPersonRole;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $phoneNumber;

    /**
     *
     * @var string
     */
    public $birthDate;

    /**
     *
     * @var integer
     */
    public $active;

    /**
     *
     * @var string
     */
    public $personId;

    /**
     *
     * @var string
     */
    public $createdAt;

    /**
     *
     * @var integer
     */
    public $maritalStatusId;

    /**
     *
     * @var string
     */
    public $firstName;

    /**
     *
     * @var string
     */
    public $secondaryName;

    /**
     *
     * @var string
     */
    public $firstSurname;

    /**
     *
     * @var string
     */
    public $secondarySurname;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("person");
        $this->hasMany('Id', 'Agreement', 'ResponsiblePersonId', ['alias' => 'Agreement']);
        $this->hasMany('Id', 'EventParticipant', 'PersonId', ['alias' => 'EventParticipant']);
        $this->hasMany('Id', 'Mobility', 'TutorPersonId', ['alias' => 'Mobility']);
        $this->hasMany('Id', 'Mobility', 'MobilityUserId', ['alias' => 'Mobility']);
        $this->hasMany('Id', 'Mobility', 'RequestedByPersonId', ['alias' => 'Mobility']);
        $this->hasMany('Id', 'NetworkAndAsociation', 'ResponsiblePersonId', ['alias' => 'NetworkAndAsociation']);
        $this->hasMany('Id', 'PersonIdentityDocument', 'PersonId', ['alias' => 'PersonIdentityDocument']);
        $this->hasMany('Id', 'PersonSchoolProgram', 'PersonId', ['alias' => 'PersonSchoolProgram']);
        $this->belongsTo('MaritalStatusId', 'MaritalStatus', 'Id', ['alias' => 'MaritalStatus']);
        $this->belongsTo('IdPersonRole', 'PersonRole', 'Id', ['alias' => 'PersonRole']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'person';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Person[]|Person|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Person|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
