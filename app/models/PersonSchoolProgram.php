<?php



class PersonSchoolProgram extends \Phalcon\Mvc\Model
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
    public $schoolProgramId;

    /**
     *
     * @var integer
     */
    public $active;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("person_school_program");
        $this->belongsTo('PersonId', 'Person', 'Id', ['alias' => 'Person']);
        $this->belongsTo('SchoolProgramId', 'SchoolProgram', 'Id', ['alias' => 'SchoolProgram']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'person_school_program';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PersonSchoolProgram[]|PersonSchoolProgram|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PersonSchoolProgram|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
