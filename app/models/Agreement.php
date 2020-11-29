<?php
class Agreement extends \Phalcon\Mvc\Model
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
    public $code;

    /**
     *
     * @var string
     */
    public $creationDate;

    /**
     *
     * @var string
     */
    public $purposeDescription;

    /**
     *
     * @var double
     */
    public $cost;

    /**
     *
     * @var string
     */
    public $budget;

    /**
     *
     * @var integer
     */
    public $hasExtensionCost;

    /**
     *
     * @var string
     */
    public $excedentCost;

    /**
     *
     * @var string
     */
    public $initialDate;

    /**
     *
     * @var string
     */
    public $finalDate;

    /**
     *
     * @var string
     */
    public $settlementDate;

    /**
     *
     * @var string
     */
    public $extensionDate;

    /**
     *
     * @var string
     */
    public $extensionTerms;

    /**
     *
     * @var string
     */
    public $file;

    /**
     *
     * @var integer
     */
    public $agreementLineId;

    /**
     *
     * @var integer
     */
    public $agreementTypeId;

    /**
     *
     * @var integer
     */
    public $responsiblePersonId;

    /**
     *
     * @var integer
     */
    public $createdById;

    /**
     *
     * @var integer
     */
    public $schoolDepartmentId;

    /**
     *
     * @var integer
     */
    public $agreementLevelId;

    /**
     *
     * @var string
     */
    public $lastUpdate;

    /**
     *
     * @var integer
     */
    public $agreementParentId;

    /**
     *
     * @var string
     */
    public $semester;

    /**
     *
     * @var string
     */
    public $agreementNumber;

    /**
     *
     * @var integer
     */
    public $locationCityId;

    /**
     *
     * @var integer
     */
    public $researchGroupId;

    /**
     *
     * @var integer
     */
    public $agreementQuantity;

    /**
     *
     * @var string
     */
    public $agreementLevelOtherDescription;

    /**
     *
     * @var integer
     */
    public $requiresProcedureForExtension;

    /**
     *
     * @var integer
     */
    public $duration;

    /**
     *
     * @var string
     */
    public $durationUnits;

    /**
     *
     * @var integer
     */
    public $isFinalDateUndefined;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("agreement");
        $this->hasMany('Id', 'Agreement', 'AgreementParentId', ['alias' => 'Agreement']);
        $this->hasMany('Id', 'AgreementActivity', 'AgreementId', ['alias' => 'AgreementActivity']);
        $this->hasMany('Id', 'AgreementCommitment', 'AgreementId', ['alias' => 'AgreementCommitment']);
        $this->hasMany('Id', 'AgreementEntity', 'AgreementId', ['alias' => 'AgreementEntity']);
        $this->hasMany('Id', 'AgreementNetwork', 'agreementId', ['alias' => 'AgreementNetwork']);
        $this->hasMany('Id', 'AgreementObservation', 'AgreementId', ['alias' => 'AgreementObservation']);
        $this->hasMany('Id', 'AgreementResearchGroup', 'AgreementId', ['alias' => 'AgreementResearchGroup']);
        $this->hasMany('Id', 'AgreementResearchSeedbed', 'AgreementId', ['alias' => 'AgreementResearchSeedbed']);
        $this->hasMany('Id', 'AgreementScope', 'AgreementId', ['alias' => 'AgreementScope']);
        $this->hasMany('Id', 'AgreementStatusHistory', 'AgreementId', ['alias' => 'AgreementStatusHistory']);
        $this->hasMany('Id', 'Mobility', 'AssociatedAgreementId', ['alias' => 'Mobility']);
        $this->belongsTo('AgreementLevelId', 'AgreementLevel', 'Id', ['alias' => 'AgreementLevel']);
        $this->belongsTo('AgreementLineId', 'AgreementLine', 'Id', ['alias' => 'AgreementLine']);
        $this->belongsTo('AgreementParentId', 'Agreement', 'Id', ['alias' => 'Agreement']);
        $this->belongsTo('AgreementTypeId', 'AgreementType', 'Id', ['alias' => 'AgreementType']);
        $this->belongsTo('CreatedById', 'IdentityUser', 'Id', ['alias' => 'IdentityUser']);
        $this->belongsTo('LocationCityId', 'LocationCity', 'Id', ['alias' => 'LocationCity']);
        $this->belongsTo('ResponsiblePersonId', 'Person', 'Id', ['alias' => 'Person']);
        $this->belongsTo('ResearchGroupId', 'ResearchGroup', 'Id', ['alias' => 'ResearchGroup']);
        $this->belongsTo('SchoolDepartmentId', 'SchoolDepartment', 'Id', ['alias' => 'SchoolDepartment']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'agreement';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Agreement[]|Agreement|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Agreement|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
