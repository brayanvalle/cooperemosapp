<?php


class Mobility extends \Phalcon\Mvc\Model
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
    public $year;

    /**
     *
     * @var string
     */
    public $semester;

    /**
     *
     * @var string
     */
    public $dateFrom;

    /**
     *
     * @var string
     */
    public $dateTo;

    /**
     *
     * @var integer
     */
    public $createdByUserId;

    /**
     *
     * @var string
     */
    public $createdAt;

    /**
     *
     * @var string
     */
    public $costConcept;

    /**
     *
     * @var string
     */
    public $costValue;

    /**
     *
     * @var string
     */
    public $code;

    /**
     *
     * @var double
     */
    public $mobilityRequestedPersonCost;

    /**
     *
     * @var string
     */
    public $mobilityRequestedPersonInitialDate;

    /**
     *
     * @var string
     */
    public $mobilityRequestedPersonFinalDate;

    /**
     *
     * @var integer
     */
    public $networkAndAssociationId;

    /**
     *
     * @var integer
     */
    public $tutorPersonId;

    /**
     *
     * @var integer
     */
    public $entityHostId;

    /**
     *
     * @var integer
     */
    public $originLocationId;

    /**
     *
     * @var integer
     */
    public $destinationLocationId;

    /**
     *
     * @var integer
     */
    public $requestedByPersonId;

    /**
     *
     * @var integer
     */
    public $mobilityFrameworkTypeId;

    /**
     *
     * @var integer
     */
    public $mobilityTypeId;

    /**
     *
     * @var integer
     */
    public $mobilityUserId;

    /**
     *
     * @var integer
     */
    public $mobilityPurposeId;

    /**
     *
     * @var integer
     */
    public $mobilitySchoolDepartmentOriginId;

    /**
     *
     * @var integer
     */
    public $associatedMobilityId;

    /**
     *
     * @var integer
     */
    public $associatedNetworkId;

    /**
     *
     * @var integer
     */
    public $associatedAgreementId;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("nicooperationdbv2");
        $this->setSource("mobility");
        $this->hasMany('Id', 'Mobility', 'AssociatedMobilityId', ['alias' => 'Mobility']);
        $this->hasMany('Id', 'MobilityCost', 'MobilityId', ['alias' => 'MobilityCost']);
        $this->hasMany('Id', 'MobilityFiles', 'MobilityId', ['alias' => 'MobilityFiles']);
        $this->hasMany('Id', 'MobilityObservation', 'MobilityId', ['alias' => 'MobilityObservation']);
        $this->hasMany('Id', 'MobilityStatusHistory', 'MobilityId', ['alias' => 'MobilityStatusHistory']);
        $this->belongsTo('AssociatedAgreementId', 'Agreement', 'Id', ['alias' => 'Agreement']);
        $this->belongsTo('AssociatedMobilityId', 'Mobility', 'Id', ['alias' => 'Mobility']);
        $this->belongsTo('AssociatedNetworkId', 'NetworkAndAsociation', 'Id', ['alias' => 'NetworkAndAsociation']);
        $this->belongsTo('EntityHostId', 'Entity', 'Id', ['alias' => 'Entity']);
        $this->belongsTo('DestinationLocationId', 'LocationCity', 'Id', ['alias' => 'DestinationLocation']);
        $this->belongsTo('OriginLocationId', 'LocationCity', 'Id', ['alias' => 'OriginLocation']);
        $this->belongsTo('MobilityFrameworkTypeId', 'MobilityFramework', 'Id', ['alias' => 'MobilityFramework']);
        $this->belongsTo('MobilityPurposeId', 'MobilityPurpose', 'Id', ['alias' => 'MobilityPurpose']);
        $this->belongsTo('TutorPersonId', 'Person', 'Id', ['alias' => 'Person']);
        $this->belongsTo('MobilityTypeId', 'MobilityType', 'Id', ['alias' => 'MobilityType']);
        $this->belongsTo('MobilityUserId', 'Person', 'Id', ['alias' => 'Person']);
        $this->belongsTo('NetworkAndAssociationId', 'NetworkAndAsociation', 'Id', ['alias' => 'NetworkAndAsociation']);
        $this->belongsTo('RequestedByPersonId', 'Person', 'Id', ['alias' => 'Person']);
        $this->belongsTo('MobilitySchoolDepartmentOriginId', 'SchoolDepartment', 'Id', ['alias' => 'SchoolDepartment']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'mobility';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Mobility[]|Mobility|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Mobility|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
