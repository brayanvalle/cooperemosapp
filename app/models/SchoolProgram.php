<?php



class SchoolProgram extends \Phalcon\Mvc\Model
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
    public $active;

    /**
     *
     * @var integer
     */
    public $schoolDepartmentId;

    /**
     *
     * @var integer
     */
    public $locationCityId;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("school_program");
        $this->hasMany('Id', 'NetworkSchoolProgram', 'SchoolProgramId', ['alias' => 'NetworkSchoolProgram']);
        $this->hasMany('Id', 'PersonSchoolProgram', 'SchoolProgramId', ['alias' => 'PersonSchoolProgram']);
        $this->belongsTo('LocationCityId', 'LocationCity', 'Id', ['alias' => 'LocationCity']);
        $this->belongsTo('SchoolDepartmentId', 'SchoolDepartment', 'Id', ['alias' => 'SchoolDepartment']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'school_program';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SchoolProgram[]|SchoolProgram|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SchoolProgram|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
