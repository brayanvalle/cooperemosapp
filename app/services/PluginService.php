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

}