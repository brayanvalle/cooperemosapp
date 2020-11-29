<?php

class NetworkAndAsociation extends \Phalcon\Mvc\Model
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
     * @var string
     */
    public $acronym;

    /**
     *
     * @var string
     */
    public $creationDate;

    /**
     *
     * @var integer
     */
    public $schoolDepartmentId;

    /**
     *
     * @var integer
     */
    public $responsiblePersonId;

    /**
     *
     * @var string
     */
    public $code;

    /**
     *
     * @var integer
     */
    public $networkTypeId;

    /**
     *
     * @var string
     */
    public $file;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("network_and_asociation");
        $this->hasMany('Id', 'AgreementNetwork', 'networkId', ['alias' => 'AgreementNetwork']);
        $this->hasMany('Id', 'Mobility', 'AssociatedNetworkId', ['alias' => 'Mobility']);
        $this->hasMany('Id', 'Mobility', 'NetworkAndAssociationId', ['alias' => 'Mobility']);
        $this->hasMany('Id', 'NetworkAndAsociationActivity', 'NetworkAndAsociationId', ['alias' => 'NetworkAndAsociationActivity']);
        $this->hasMany('Id', 'NetworkAndAsociationBenefit', 'NetworkAndAsociationId', ['alias' => 'NetworkAndAsociationBenefit']);
        $this->hasMany('Id', 'NetworkAndAsociationCost', 'NetworkAndAsociationId', ['alias' => 'NetworkAndAsociationCost']);
        $this->hasMany('Id', 'NetworkAndAsociationEvidence', 'NetworkAndAsociationId', ['alias' => 'NetworkAndAsociationEvidence']);
        $this->hasMany('Id', 'NetworkAndAsociationObservation', 'NetworkAndAsociationId', ['alias' => 'NetworkAndAsociationObservation']);
        $this->hasMany('Id', 'NetworkAndAsociationStatusHistory', 'NetworkAndAsociationId', ['alias' => 'NetworkAndAsociationStatusHistory']);
        $this->hasMany('Id', 'NetworkResearchGroup', 'NetworkId', ['alias' => 'NetworkResearchGroup']);
        $this->hasMany('Id', 'NetworkResearchSeedbed', 'NetworkId', ['alias' => 'NetworkResearchSeedbed']);
        $this->hasMany('Id', 'NetworkSchoolDepartment', 'NetworkId', ['alias' => 'NetworkSchoolDepartment']);
        $this->hasMany('Id', 'NetworkSchoolProgram', 'NetworkId', ['alias' => 'NetworkSchoolProgram']);
        $this->belongsTo('NetworkTypeId', 'NetworkAndAsociationType', 'Id', ['alias' => 'NetworkAndAsociationType']);
        $this->belongsTo('ResponsiblePersonId', 'Person', 'Id', ['alias' => 'Person']);
        $this->belongsTo('SchoolDepartmentId', 'SchoolDepartment', 'Id', ['alias' => 'SchoolDepartment']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'network_and_asociation';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NetworkAndAsociation[]|NetworkAndAsociation|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NetworkAndAsociation|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
