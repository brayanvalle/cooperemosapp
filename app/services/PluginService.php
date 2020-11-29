<?php

class PluginService{


    public function getMobilityReport($mobilityId){
        $mobility = Mobility::findFirst($mobilityId);
        $mobilityDto = $this->getMobilityReportDto($mobility);
        return $mobilityDto;
    }

    private function getMobilityReportDto($mobility){
        $mobilityStatus = MobilityStatusHistory::find('MobilityId = ' . $mobility->Id);

        $mobilityStatusDto = [];

        foreach($mobilityStatus as $mobStatus){
            array_push($mobilityStatusDto,[
                'Current' => $mobStatus->Current,
                'Date' => Date($mobStatus->Date, ''),
                'StatusName' => $mobStatus->MobilityStatus->Name
            ]);
        }
        $mobilityDto = [
            'Id' => $mobility->Id,
            'Code' => $mobility->Code,
            'Year' => $mobility->Year,
            'Semester' => $mobility->Semester,
            'DateFrom' => $mobility->DateFrom,
            'DateTo' => $mobility->DateTo,
            'Type' => $mobility->MobilityType->Name,
            'OriginLocation' => $mobility->OriginLocation->Name,
            'DestinationLocation' => $mobility->DestinationLocation->Name,
            'Objective' => $mobility->MobilityPurpose->Name,
            'Status' => $mobilityStatusDto
        ];
        
        return $mobilityDto;
    }

    public function getUserMobilityReport($personId){  
        $mobilities = Mobility::find([
            'MobilityUserId = ' . $personId,
            "order" => "CreatedAt DESC"]);

        $mobilitiesDto = [];
        foreach($mobilities as $mobility){
            
            $mobilityDto = $this->getMobilityReportDto($mobility);
            array_push($mobilitiesDto,$mobilityDto);
        }       

        $mobilitiesDto = Utils::ObjectUtil()->array2Obj($mobilitiesDto);

        return $mobilitiesDto;

    }


    public function getNetworkAndAgreementReport(){
        $networks = NetworkAndAsociation::find(["order" => "CreationDate DESC","limit" => 10]);
        $agreements = Agreement::find(["order" => "InitialDate DESC", "limit" => 10]);
        $networksDao =[];
        $agreementsDao =[];
        foreach($networks as $network){
            array_push($networksDao,Utils::ObjectUtil()->array2Obj([
                'Name' => $network->Name,
                'SchoolDepartment' => $network->SchoolDepartment->Name,
                'Type' => $network->NetworkAndAsociationType->Name
            ]));
        }

        foreach($agreements as $agreement){
            array_push($agreementsDao,Utils::ObjectUtil()->array2Obj([
                'PurposeDescription' => $agreement->PurposeDescription,
                'Type' => $agreement->AgreementType->Name,
                'LocationCity' => $agreement->LocationCity->Name
            ]));
        }

        return [
            'Networks' => $networksDao,
            'Agreements' => $agreementsDao
        ];

    }

}