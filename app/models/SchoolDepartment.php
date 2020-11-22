<?php



class SchoolDepartment extends \Phalcon\Mvc\Model
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
    public $name;

    /**
     *
     * @var integer
     */
    public $entityId;

    /**
     *
     * @var string
     */
    public $address;

    /**
     *
     * @var string
     */
    public $phoneNumber;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $personContactName;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("school_department");
        $this->hasMany('Id', 'Agreement', 'SchoolDepartmentId', ['alias' => 'Agreement']);
        $this->hasMany('Id', 'BudgetSchoolTransaction', 'SchoolDepartmentId', ['alias' => 'BudgetSchoolTransaction']);
        $this->hasMany('Id', 'Event', 'SchoolDepartmentId', ['alias' => 'Event']);
        $this->hasMany('Id', 'Mobility', 'MobilitySchoolDepartmentOriginId', ['alias' => 'Mobility']);
        $this->hasMany('Id', 'NetworkAndAsociation', 'SchoolDepartmentId', ['alias' => 'NetworkAndAsociation']);
        $this->hasMany('Id', 'NetworkSchoolDepartment', 'SchoolDepartmentId', ['alias' => 'NetworkSchoolDepartment']);
        $this->hasMany('Id', 'ResearchGroup', 'SchoolDepartmentId', ['alias' => 'ResearchGroup']);
        $this->hasMany('Id', 'SchoolDepartmentBudget', 'SchoolDepartmentId', ['alias' => 'SchoolDepartmentBudget']);
        $this->hasMany('Id', 'SchoolProgram', 'SchoolDepartmentId', ['alias' => 'SchoolProgram']);
        $this->belongsTo('EntityId', 'Entity', 'Id', ['alias' => 'Entity']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'school_department';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SchoolDepartment[]|SchoolDepartment|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SchoolDepartment|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
