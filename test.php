<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.nexusmls.io/Property/(/%27:ListingKey/%27/)",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "PATCH",
  CURLOPT_POSTFIELDS => json_encode([
    'odata_context' => 'in',
    'AboveGradeFinishedArea' => 0,
    'AboveGradeFinishedAreaSource' => 'Other',
    'AccessibilityFeatures' => [
        'SmartTechnology',
        'AccessibleDoors'
    ],
    'AdditionalParcelsDescription' => 'commodo',
    'AdditionalParcelsYN' => true,
    'AnchorsCoTenants' => 'ex',
    'Appliances' => [
        'BuiltInFreezer',
        'ElectricWaterHeater',
        'EnergyStarQualifiedAppliances',
        'WaterSoftenerOwned',
        'WasherDryer'
    ],
    'ArchitecturalStyle' => [
        'SampleArchitecturalStyleEnumValue',
        'SampleArchitecturalStyleEnumValue',
        'SampleArchitecturalStyleEnumValue',
        'SampleArchitecturalStyleEnumValue',
        'SampleArchitecturalStyleEnumValue'
    ],
    'AssociationAmenities' => [
        'BilliardRoom',
        'MaidService',
        'PartyRoom',
        'BoatDock'
    ],
    'AssociationFee' => 0,
    'AssociationFee2' => 0,
    'AssociationFee2Frequency' => 'SemiAnnually',
    'AssociationFeeFrequency' => 'SemiMonthly',
    'AssociationFeeIncludes' => [
        'Trash',
        'Trash',
        'Internet',
        'Internet',
        'Gas'
    ],
    'AssociationName' => 'in aliqua velit',
    'AssociationName2' => 'veniam non dolor',
    'AssociationPhone' => 'a',
    'AssociationPhone2' => 'e',
    'AssociationYN' => false,
    'AttachedGarageYN' => true,
    'AvailabilityDate' => '2017-04-13',
    'BasementYN' => true,
    'BathroomsFull' => 42,
    'BathroomsHalf' => '42',
    'BathroomsOneQuarter' => 42,
    'BathroomsPartial' => '42',
    'BathroomsThreeQuarter' => 42,
    'BedroomsPossible' => '42',
    'BedroomsTotal' => '42',
    'BelowGradeFinishedArea' => 0,
    'BelowGradeFinishedAreaSource' => 'Appraiser',
    'BodyType' => [
        'SeeRemarks',
        'SeeRemarks',
        'TripleWide',
        'DoubleWide'
    ],
    'BuilderModel' => 'labor',
    'BuilderName' => 'laborum mollit',
    'BuildingAreaSource' => 'Assessor',
    'BuildingAreaTotal' => 0,
    'BuildingAreaUnits' => 'SquareMeters',
    'BuildingFeatures' => [
        'SampleBuildingFeaturesEnumValue',
        'SampleBuildingFeaturesEnumValue',
        'SampleBuildingFeaturesEnumValue',
        'SampleBuildingFeaturesEnumValue',
        'SampleBuildingFeaturesEnumValue'
    ],
    'BuildingName' => 'in quis ullam',
    'BusinessType' => [
        'AutoDealer',
        'DanceStudio',
        'Hobby',
        'SaddleryHarness',
        'Bakery'
    ],
    'BuyerAgencyCompensation' => 'in magna eni',
    'BuyerAgencyCompensationType' => 'Percent',
    'BuyerAgentAOR' => 'SampleAOREnumValue',
    'BuyerAgentDesignation' => [
        'CertifiedResidentialSpecialist',
        'GeneralAccreditedAppraiser',
        'CertifiedCommercialInvestmentMember',
        'ePRO'
    ],
    'BuyerAgentDirectPhone' => 'qui irure',
    'BuyerAgentEmail' => 'dolore ',
    'BuyerAgentFax' => 'officia d',
    'BuyerAgentFirstName' => '',
    'BuyerAgentFullName' => 'fugia',
    'BuyerAgentKey' => 'enim consectetur Lorem Duis',
    'BuyerAgentKeyNumeric' => 42,
    'BuyerAgentLastName' => 'commodo ut velit',
    'BuyerAgentMiddleName' => 'in aliqua',
    'BuyerAgentMlsId' => 'in nostrud quis',
    'BuyerAgentMobilePhone' => 'Lorem',
    'BuyerAgentNameSuffix' => 'n',
    'BuyerAgentOfficePhone' => 'conse',
    'BuyerAgentPager' => 'est Exc',
    'BuyerAgentPreferredPhone' => 'Ut irure ',
    'BuyerAgentPreferredPhoneExt' => 'i',
    'BuyerAgentStateLicense' => 'voluptate culpa lab',
    'BuyerAgentURL' => 'dolore ut',
    'BuyerAgentVoiceMailExt' => 'dolor adi',
    'BuyerFinancing' => [
        'Assumed',
        'Assumed',
        'Other',
        'FHA203b',
        'Other'
    ],
    'BuyerOfficeAOR' => 'SampleAOREnumValue',
    'BuyerOfficeEmail' => 'd',
    'BuyerOfficeFax' => 'do',
    'BuyerOfficeKey' => 'velit exercitation id',
    'BuyerOfficeMlsId' => 'Lorem officia anim',
    'BuyerOfficeName' => 'ex',
    'BuyerOfficePhone' => 'volup',
    'BuyerOfficePhoneExt' => 'ea Ut',
    'BuyerOfficeURL' => 'ipsum',
    'BuyerTeamKey' => 'do ut elit exercitation',
    'BuyerTeamKeyNumeric' => '42',
    'BuyerTeamName' => 'Excepteur do',
    'CableTvExpense' => 0,
    'CancellationDate' => '2017-04-13',
    'CapRate' => 0,
    'CarportYN' => false,
    'CarrierRoute' => 's',
    'City' => 'SampleCityEnumValue',
    'CityRegion' => 'tempor pariatur reprehenderit cupidatat',
    'ClosePrice' => 0,
    'CoBuyerAgentDesignation' => [
        'AtHomeWithDiversity',
        'AccreditedLandConsultant',
        'RealEstateNegotiationExpert'
    ],
    'CoBuyerAgentDirectPhone' => 'sed id ',
    'CoBuyerAgentEmail' => 'sunt in sed nisi mollit',
    'CoBuyerAgentFax' => '',
    'CoBuyerAgentFirstName' => 'Ut Duis mollit cill',
    'CoBuyerAgentFullName' => 'consectetur labore',
    'CoBuyerAgentHomePhone' => 'elit veniam',
    'CoBuyerAgentKey' => 'mollit ex Lorem ali',
    'CoBuyerAgentKeyNumeric' => '42',
    'CoBuyerAgentLastName' => 'labore do',
    'CoBuyerAgentMiddleName' => 'eu',
    'CoBuyerAgentMlsId' => 'eius',
    'CoBuyerAgentNamePrefix' => 'ut',
    'CoBuyerAgentNameSuffix' => 'in id L',
    'CoBuyerAgentOfficePhone' => 'est',
    'CoBuyerAgentOfficePhoneExt' => 'e',
    'CoBuyerAgentPager' => 'eu do a',
    'CoBuyerAgentPreferredPhone' => 'occaecat al',
    'CoBuyerAgentPreferredPhoneExt' => 'exercitati',
    'CoBuyerAgentStateLicense' => 'ut sit',
    'CoBuyerAgentTollFreePhone' => 'incididunt conse',
    'CoBuyerAgentVoiceMail' => 'ad aute repre',
    'CoBuyerAgentVoiceMailExt' => '',
    'CoBuyerOfficeAOR' => 'SampleAOREnumValue',
    'CoBuyerOfficeEmail' => 'fugiat ullamco pariatur',
    'CoBuyerOfficeKey' => 'eu',
    'CoBuyerOfficeKeyNumeric' => 42,
    'CoBuyerOfficeMlsId' => 'ex nostr',
    'CoBuyerOfficeName' => 'nulla',
    'CoBuyerOfficePhone' => 'Excepte',
    'CoBuyerOfficePhoneExt' => '',
    'CoBuyerOfficeURL' => 'commodo',
    'CoListAgentAOR' => 'SampleAOREnumValue',
    'CoListAgentDesignation' => [
        'RealEstateNegotiationExpert',
        'CertifiedRealEstateTeamSpecialist'
    ],
    'CoListAgentDirectPhone' => 'labore cu',
    'CoListAgentFax' => 'i',
    'CoListAgentFullName' => 'enim et proident Lorem dolor',
    'CoListAgentHomePhone' => 'culpa minim in a',
    'CoListAgentKey' => 'dolore nulla',
    'CoListAgentKeyNumeric' => 42,
    'CoListAgentLastName' => 'Duis Lorem',
    'CoListAgentMobilePhone' => 'adipisi',
    'CoListAgentNameSuffix' => 'c',
    'CoListAgentOfficePhone' => 'i',
    'CoListAgentOfficePhoneExt' => 'exercit',
    'CoListAgentPager' => 'sit eiusm',
    'CoListAgentPreferredPhone' => 'adipisicing ',
    'CoListAgentPreferredPhoneExt' => 'aliqua',
    'CoListAgentStateLicense' => 'aliqua aliquip minim tempor Ex',
    'CoListAgentTollFreePhone' => 'elit',
    'CoListAgentVoiceMail' => 'et si',
    'CoListOfficeEmail' => 'cupidatat incididunt',
    'CoListOfficeFax' => 'adipisic',
    'CoListOfficeKey' => 'nostrud sunt amet tempor culp',
    'CoListOfficeMlsId' => 'quis proident aliqua',
    'CoListOfficeName' => 'sed',
    'CoListOfficePhone' => 'ea',
    'CoListOfficePhoneExt' => 'lab',
    'CoListOfficeURL' => 'non aute Excepteur Ut',
    'CommonInterest' => 'StockCooperative',
    'CommonWalls' => [
        'NoOneBelow',
        'NoCommonWalls',
        'NoCommonWalls'
    ],
    'CommunityFeatures' => [
        'Golf',
        'FitnessCenter',
        'Racquetball',
        'Clubhouse',
        'Park'
    ],
    'Concessions' => 'CallListingAgent',
    'ConcessionsAmount' => 42,
    'ConcessionsComments' => 'ut dolor irure fugiat',
    'ConstructionMaterials' => [
        'MetalSiding',
        'VinylSiding',
        'Cedar',
        'SprayFoamInsulation',
        'SteelSiding'
    ],
    'ContinentRegion' => 'nisi ex deserunt tempor',
    'Contingency' => 'dolor quis adipisicing ad',
    'ContingentDate' => '2017-04-13',
    'ContractStatusChangeDate' => '2017-04-13',
    'CopyrightNotice' => 'pariatur dolore',
    'CountryRegion' => 'in',
    'CountyOrParish' => 'SampleCountyOrParishEnumValue',
    'CoveredSpaces' => 0,
    'CropsIncludedYN' => false,
    'CrossStreet' => 'labore aliquip voluptate',
    'CultivatedArea' => 0,
    'CumulativeDaysOnMarket' => '42',
    'CurrentFinancing' => [
        'None',
        'PowerPurchaseAgreement'
    ],
    'CurrentUse' => [
        'Unimproved'
    ],
    'DOH2' => 'incididunt la',
    'DOH3' => 'dol',
    'DaysOnMarket' => 42,
    'DevelopmentStatus' => [
        'SitePlanApproved',
        'Proposed',
        'RawLand',
        'Completed',
        'SeeRemarks'
    ],
    'DirectionFaces' => 'Northeast',
    'Directions' => 'elit incididunt eiusmod est culpa',
    'Disclaimer' => 'esse quis aliqua',
    'DistanceToBusComments' => 'sed dolore consequat proident',
    'DistanceToBusNumeric' => 42,
    'DistanceToBusUnits' => 'Meters',
    'DistanceToElectricNumeric' => 42,
    'DistanceToElectricUnits' => 'Feet',
    'DistanceToFreewayComments' => 'officia in',
    'DistanceToFreewayNumeric' => 42,
    'DistanceToGasComments' => 'mollit esse dolore nisi cul',
    'DistanceToGasNumeric' => 42,
    'DistanceToGasUnits' => 'Meters',
    'DistanceToPhoneServiceComments' => 've',
    'DistanceToPhoneServiceNumeric' => '42',
    'DistanceToPhoneServiceUnits' => 'Feet',
    'DistanceToPlaceofWorshipComments' => 'dolore amet culpa sunt o',
    'DistanceToPlaceofWorshipUnits' => 'Feet',
    'DistanceToSchoolBusComments' => 'quis cillum Lorem dolore',
    'DistanceToSchoolBusNumeric' => 42,
    'DistanceToSchoolsComments' => 'Duis sit ipsum',
    'DistanceToSchoolsNumeric' => 42,
    'DistanceToSewerComments' => 'sint sed velit consectetur',
    'DistanceToSewerNumeric' => '42',
    'DistanceToSewerUnits' => 'Meters',
    'DistanceToShoppingComments' => 'consequat eu anim ad ',
    'DistanceToShoppingNumeric' => 42,
    'DistanceToShoppingUnits' => 'Meters',
    'DistanceToStreetComments' => 'nulla',
    'DistanceToStreetNumeric' => '42',
    'DistanceToStreetUnits' => 'Feet',
    'DistanceToWaterComments' => 'cillum minim',
    'DistanceToWaterNumeric' => 42,
    'DistanceToWaterUnits' => 'Meters',
    'DocumentsAvailable' => [
        'SampleDocumentsAvailableEnumValue'
    ],
    'DocumentsChangeTimestamp' => '1898-05-03T07:48:01.0Z',
    'DocumentsCount' => 42,
    'DualVariableCompensationYN' => false,
    'Electric' => [
        'Fuses',
        'Volts220ForSpa',
        'Underground'
    ],
    'ElectricExpense' => 0,
    'ElectricOnPropertyYN' => true,
    'ElementarySchoolDistrict' => 'SampleElementarySchoolDistrictEnumValue',
    'Elevation' => 42,
    'ElevationUnits' => 'Meters',
    'EntryLevel' => 42,
    'EntryLocation' => 'deserunt ullamco eu',
    'Exclusions' => 'tempor',
    'ExistingLeaseType' => [
        'Nn',
        'CpiAdjustment'
    ],
    'ExpirationDate' => '2017-04-13',
    'ExteriorFeatures' => [
        'BoatSlip',
        'PermeablePaving',
        'RainGutters',
        'Dock',
        'PrivateYard'
    ],
    'FarmCreditServiceInclYN' => false,
    'FarmLandAreaUnits' => 'SquareFeet',
    'Fencing' => [
        'Brick',
        'Brick',
        'SplitRail',
        'SlumpStone'
    ],
    'FinancialDataSource' => [
        'Owner',
        'PropertyManager',
        'PropertyManager'
    ],
    'FireplaceYN' => true,
    'FireplacesTotal' => 42,
    'FoundationArea' => 0,
    'FoundationDetails' => [
        'Block',
        'Other',
        'Slab',
        'Raised'
    ],
    'FrontageType' => [
        'Lakefront',
        'LagoonEstuary',
        'BayHarbor',
        'Other'
    ],
    'FuelExpense' => 0,
    'Furnished' => 'Negotiable',
    'FurnitureReplacementExpense' => 0,
    'GarageSpaces' => 0,
    'GarageYN' => false,
    'GrazingPermitsBlmYN' => false,
    'GrazingPermitsForestServiceYN' => true,
    'GrazingPermitsPrivateYN' => true,
    'GreenBuildingVerificationType' => [
        'IndoorAirplus',
        'HomeEnergyUpgradeCertificateOfEnergyEfficiencyPerformance'
    ],
    'GreenEnergyEfficient' => [
        'Windows'
    ],
    'GreenEnergyGeneration' => [
        'Wind',
        'Wind',
        'Wind'
    ],
    'GreenSustainability' => [
        'RecycledMaterials'
    ],
    'GreenWaterConservation' => [
        'GrayWaterSystem',
        'EfficientHotWaterDistribution',
        'WaterSmartLandscaping',
        'WaterRecycling'
    ],
    'GrossScheduledIncome' => 0,
    'HabitableResidenceYN' => false,
    'Heating' => [
        'ActiveSolar',
        'FireplaceInsert',
        'Radiant'
    ],
    'HeatingYN' => true,
    'HighSchool' => 'SampleHighSchoolEnumValue',
    'HighSchoolDistrict' => 'SampleHighSchoolDistrictEnumValue',
    'HomeWarrantyYN' => false,
    'HorseYN' => false,
    'HoursDaysOfOperation' => [
        'OpenOver8HoursDay',
        'Open24Hours',
        'Open7Days',
        'OpenMondayFriday',
        'OpenSunday'
    ],
    'HoursDaysOfOperationDescription' => 'amet quis sit',
    'Inclusions' => 'sunt',
    'IncomeIncludes' => [
        'Recreation',
        'Parking',
        'Recreation'
    ],
    'InsuranceExpense' => 0,
    'InteriorFeatures' => [
        'CrownMolding',
        'WalkInClosets',
        'EntranceFoyer'
    ],
    'InternetAddressDisplayYN' => true,
    'InternetAutomatedValuationDisplayYN' => false,
    'InternetConsumerCommentYN' => false,
    'InternetEntireListingDisplayYN' => false,
    'IrrigationSource' => [
        'SampleIrrigationSourceEnumValue',
        'SampleIrrigationSourceEnumValue'
    ],
    'IrrigationWaterRightsAcres' => 0,
    'LaborInformation' => [
        'EmployeeLicenseRequired',
        'EmployeeLicenseRequired',
        'NonUnion'
    ],
    'LandLeaseAmount' => 0,
    'LandLeaseAmountFrequency' => 'BiMonthly',
    'LandLeaseExpirationDate' => '2017-04-13',
    'LandLeaseYN' => false,
    'Latitude' => 0,
    'LeasableArea' => 0,
    'LeaseAmount' => 0,
    'LeaseAmountFrequency' => 'SemiMonthly',
    'LeaseAssignableYN' => true,
    'LeaseConsideredYN' => false,
    'LeaseExpiration' => '2017-04-13',
    'LeaseRenewalCompensation' => [
        'NoRenewalCommission',
        'NoRenewalCommission',
        'CallListingOffice'
    ],
    'LeaseRenewalOptionYN' => true,
    'LeaseTerm' => 'Other',
    'Levels' => [
        'OneAndOneHalf',
        'OneAndOneHalf',
        'OneAndOneHalf'
    ],
    'License1' => 'in exercita',
    'License2' => 'ut ex do ullamco',
    'License3' => 'ipsum est',
    'ListAOR' => 'SampleAOREnumValue',
    'ListAgentAOR' => 'SampleAOREnumValue',
    'ListAgentDirectPhone' => 'dolore culpa',
    'ListAgentEmail' => 'nostrud veniam',
    'ListAgentFax' => 'non',
    'ListAgentFullName' => 'ut in magna Duis incididunt',
    'ListAgentHomePhone' => 'Du',
    'ListAgentKey' => 'pariatur elit consectetur dolore aliquip',
    'ListAgentKeyNumeric' => '42',
    'ListAgentLastName' => 'consectetur in',
    'ListAgentMlsId' => 'mollit consectetur',
    'ListAgentMobilePhone' => 'voluptat',
    'ListAgentNamePrefix' => 'cup',
    'ListAgentOfficePhoneExt' => 'ut exer',
    'ListAgentPager' => 'est elit qui in ',
    'ListAgentPreferredPhone' => 'culpa',
    'ListAgentPreferredPhoneExt' => 'la',
    'ListAgentStateLicense' => 'dolor',
    'ListAgentTollFreePhone' => 'ut',
    'ListAgentURL' => 'enim',
    'ListAgentVoiceMail' => 'adipisicing Lore',
    'ListAgentVoiceMailExt' => '',
    'ListOfficeAOR' => 'SampleAOREnumValue',
    'ListOfficeEmail' => 'nostrud exercitation',
    'ListOfficeKeyNumeric' => '42',
    'ListOfficeMlsId' => 'anim ',
    'ListOfficeName' => 'cillum',
    'ListOfficePhone' => 'ipsum quis co',
    'ListOfficePhoneExt' => 'ei',
    'ListOfficeURL' => 'magna anim consectetur Duis',
    'ListPrice' => 0,
    'ListPriceLow' => 0,
    'ListTeamKey' => 'consequat',
    'ListTeamKeyNumeric' => 42,
    'ListTeamName' => 'consectetur minim reprehenderit laboris',
    'ListingContractDate' => '2017-04-13',
    'ListingId' => 'culpa Ut Duis',
    'ListingKeyNumeric' => '42',
    'ListingService' => 'LimitedService',
    'ListingTerms' => [
        'PrivateFinancingAvailable',
        'Exchange1031'
    ],
    'LivingArea' => 0,
    'LivingAreaUnits' => 'SquareMeters',
    'LockBoxLocation' => 'proident',
    'LockBoxType' => [
        'SeeRemarks'
    ],
    'Longitude' => 0,
    'LotFeatures' => [
        'Waterfront'
    ],
    'LotSizeAcres' => 0,
    'LotSizeArea' => 0,
    'LotSizeDimensions' => 'Duis sint sunt',
    'LotSizeSource' => 'Other',
    'LotSizeSquareFeet' => 0,
    'MLSAreaMajor' => 'SampleMLSAreaMajorEnumValue',
    'MLSAreaMinor' => 'SampleMLSAreaMinorEnumValue',
    'MainLevelBathrooms' => 42,
    'MainLevelBedrooms' => 42,
    'MaintenanceExpense' => 0,
    'MajorChangeTimestamp' => '1895-07-17T09:55:29.0Z',
    'MajorChangeType' => 'Withdrawn',
    'Make' => 'anim occaecat tempor',
    'ManagerExpense' => 0,
    'MapCoordinate' => 'quis laborum dolor cons',
    'MapCoordinateSource' => 'officia Exce',
    'MiddleOrJuniorSchoolDistrict' => 'SampleMiddleOrJuniorSchoolDistrictEnumValue',
    'MlsStatus' => 'SampleMlsStatusEnumValue',
    'MobileDimUnits' => 'Feet',
    'MobileHomeRemainsYN' => false,
    'MobileLength' => '42',
    'MobileWidth' => '42',
    'Model' => 'ea in',
    'NetOperatingIncome' => 0,
    'NewConstructionYN' => false,
    'NewTaxesExpense' => 0,
    'NumberOfBuildings' => 42,
    'NumberOfFullTimeEmployees' => 42,
    'NumberOfLots' => '42',
    'NumberOfPads' => 42,
    'NumberOfPartTimeEmployees' => 42,
    'NumberOfSeparateElectricMeters' => 42,
    'NumberOfSeparateGasMeters' => 42,
    'NumberOfSeparateWaterMeters' => '42',
    'NumberOfUnitsInCommunity' => '42',
    'NumberOfUnitsLeased' => '42',
    'NumberOfUnitsMoMo' => 42,
    'NumberOfUnitsTotal' => '42',
    'NumberOfUnitsVacant' => 42,
    'OccupantName' => 'amet Duis et',
    'OccupantPhone' => 'vol',
    'OccupantType' => 'Vacant',
    'OffMarketDate' => '2017-04-13',
    'OffMarketTimestamp' => '1966-07-02T15:25:25.0Z',
    'OnMarketDate' => '2017-04-13',
    'OpenParkingYN' => true,
    'OperatingExpenseIncludes' => [
        'WaterSewer',
        'Utilities',
        'Maintenance',
        'VacancyAllowance',
        'SnowRemoval'
    ],
    'OriginalEntryTimestamp' => '1954-01-04T10:23:09.0Z',
    'OriginalListPrice' => 0,
    'OriginatingSystemID' => 'elit esse',
    'OriginatingSystemKey' => 'nisi sed pariatur Ut aute',
    'OriginatingSystemName' => 'qui dolor velit magna',
    'OtherEquipment' => [
        'Dehumidifier',
        'DcWellPump',
        'Compressor'
    ],
    'OtherExpense' => 0,
    'OtherParking' => 'ut eu',
    'OtherStructures' => [
        'Other',
        'GrainStorage',
        'CoveredArena',
        'None'
    ],
    'OwnerName' => 'consequat esse do',
    'OwnerPays' => [
        'GroundsCare',
        'Other',
        'None'
    ],
    'OwnerPhone' => 'cup',
    'OwnershipType' => 'Llc',
    'ParcelNumber' => 'sit Lorem Excepteur dolore co',
    'ParkManagerName' => 'qui',
    'ParkName' => 'dolore',
    'ParkingFeatures' => [
        'ElectricVehicleChargingStations',
        'GarageFacesFront',
        'Enclosed'
    ],
    'PastureArea' => 0,
    'PatioAndPorchFeatures' => [
        'SidePorch',
        'RearPorch',
        'Other'
    ],
    'PendingTimestamp' => '1927-09-20T12:37:58.0Z',
    'PestControlExpense' => 0,
    'PetsAllowed' => [
        'DogsOk',
        'Call',
        'Yes'
    ],
    'PhotosCount' => '42',
    'PoolExpense' => 0,
    'PoolFeatures' => [
        'Liner'
    ],
    'Possession' => [
        'ClosePlus30Days',
        'ClosePlus30Days',
        'Negotiable',
        'SubjectToTenantRights'
    ],
    'PossibleUse' => [
        'Timber',
        'Unimproved'
    ],
    'PostalCity' => 'SamplePostalCityEnumValue',
    'PostalCodePlus4' => 'i',
    'PriceChangeTimestamp' => '1930-09-17T11:01:51.0Z',
    'PrivateOfficeRemarks' => 'nisi laborum',
    'ProfessionalManagementExpense' => 0,
    'PropertyAttachedYN' => false,
    'PropertyCondition' => [
        'NewConstruction'
    ],
    'PropertySubType' => 'Quadruplex',
    'PropertyType' => 'Land',
    'PublicRemarks' => 'velit adipisicing dolore ut',
    'PublicSurveyRange' => 'tempor mol',
    'PublicSurveySection' => 'adipisi',
    'PurchaseContractDate' => '2017-04-13',
    'RVParkingDimensions' => 'eiusmod irure',
    'RangeArea' => 0,
    'RentIncludes' => [
        'Other',
        'Water',
        'Internet'
    ],
    'RoadFrontageType' => [
        'Unimproved',
        'Other'
    ],
    'RoadSurfaceType' => [
        'Asphalt',
        'Asphalt',
        'Paved'
    ],
    'Roof' => [
        'BuiltUp',
        'Mixed',
        'Shingle',
        'Foam',
        'AsbestosShingle'
    ],
    'RoomType' => [
        'MasterBathroom',
        'MasterBedroom',
        'LivingRoom'
    ],
    'RoomsTotal' => 42,
    'SeatingCapacity' => 42,
    'SecurityFeatures' => [
        'SmokeDetectors',
        'FireSprinklerSystem',
        'SecuritySystemLeased',
        'FireSprinklerSystem',
        'CarbonMonoxideDetectors'
    ],
    'SerialU' => 'nostrud',
    'SerialX' => 'non quis ',
    'SerialXX' => 'enim et tempor dolor',
    'Sewer' => [
        'PrivateSewer',
        'SepticNeeded',
        'AerobicSeptic',
        'PublicSewer'
    ],
    'ShowingAdvanceNotice' => 42,
    'ShowingContactName' => 'commodo',
    'ShowingContactPhone' => 'pari',
    'ShowingContactType' => [
        'Owner',
        'Agent'
    ],
    'ShowingDays' => [
        'SampleShowingDaysEnumValue',
        'SampleShowingDaysEnumValue'
    ],
    'ShowingInstructions' => 'voluptate',
    'ShowingRequirements' => [
        'SeeRemarks',
        'TextListingAgent'
    ],
    'ShowingStartTime' => '1902-01-14T04:50:38.0Z',
    'SignOnPropertyYN' => true,
    'SourceSystemID' => 'sed',
    'SourceSystemKey' => 'tempor dolore sint ',
    'SourceSystemName' => 'exercitation',
    'SpaYN' => false,
    'SpecialLicenses' => [
        'Liquor5YearsOrLess',
        'Entertainment',
        'Other'
    ],
    'SpecialListingConditions' => [
        'NoticeOfDefault',
        'BankruptcyProperty',
        'ThirdPartyApproval',
        'Auction'
    ],
    'StandardStatus' => 'Delete',
    'StateOrProvince' => 'MB',
    'StateRegion' => 'nisi',
    'StatusChangeTimestamp' => '1902-03-20T16:42:53.0Z',
    'StreetDirPrefix' => 'S',
    'StreetName' => 'm',
    'StreetNumberNumeric' => '42',
    'StreetSuffix' => 'SampleStreetSuffixEnumValue',
    'StreetSuffixModifier' => 'et labor',
    'StructureType' => [
        'Duplex',
        'House',
        'Cabin',
        'Office'
    ],
    'SubAgencyCompensation' => 'sed mini',
    'SubAgencyCompensationType' => 'Dollars',
    'SuppliesExpense' => 0,
    'SyndicateTo' => [
        'ZillowTrulia'
    ],
    'SyndicationRemarks' => 'labore in cupidatat sit veniam',
    'TaxAnnualAmount' => 0,
    'TaxAssessedValue' => 42,
    'TaxBlock' => 'non',
    'TaxBookNumber' => 'eiusmod ut dol',
    'TaxLegalDescription' => 'consequat aliqua tempor',
    'TaxLot' => 'ut exer',
    'TaxMapNumber' => 'aute',
    'TaxOtherAnnualAssessmentAmount' => 0,
    'TaxParcelLetter' => 'eu',
    'TaxStatusCurrent' => [
        'Real',
        'PersonalAndReal',
        'PersonalAndReal',
        'Personal'
    ],
    'TaxTract' => 'do',
    'TaxYear' => '42',
    'Topography' => 'Lorem eiusmod',
    'TotalActualRent' => 0,
    'Township' => 'dolore magna amet',
    'TransactionBrokerCompensationType' => 'Percent',
    'TrashExpense' => 0,
    'UnitNumber' => 'occa',
    'UnitTypeType' => [
        'ThreeBedroom',
        'ManagersUnit',
        'Efficiency'
    ],
    'UnitsFurnished' => 'None',
    'UniversalPropertyId' => 'ut sit',
    'UniversalPropertySubId' => 'nulla i',
    'UnparsedAddress' => 'laboris velit sunt voluptate',
    'Utilities' => [
        'Propane',
        'NaturalGasConnected'
    ],
    'VacancyAllowance' => '42',
    'VacancyAllowanceRate' => 0,
    'Vegetation' => [
        'PartiallyWooded',
        'Cleared',
        'Brush'
    ],
    'VideosChangeTimestamp' => '1908-07-16T08:12:40.0Z',
    'VideosCount' => 42,
    'ViewYN' => false,
    'VirtualTourURLBranded' => 'eu exercitation',
    'VirtualTourURLUnbranded' => 'Lorem deserunt id elit ipsum',
    'WalkScore' => 42,
    'WaterBodyName' => 'enim officia consequat elit',
    'WaterSewerExpense' => 0,
    'WaterSource' => [
        'Private',
        'Well'
    ],
    'WaterfrontFeatures' => [
        'Pond',
        'CanalAccess',
        'OceanFront',
        'OceanFront'
    ],
    'WaterfrontYN' => true,
    'WindowFeatures' => [
        'AluminumFrames',
        'DoublePaneWindows'
    ],
    'WithdrawnDate' => '2017-04-13',
    'WorkmansCompensationExpense' => 0,
    'YearBuilt' => '42',
    'YearBuiltDetails' => 'aliquip exercitation veniam commodo dolore',
    'YearBuiltSource' => 'Builder',
    'YearEstablished' => 42,
    'YearsCurrentOwner' => 42,
    'Zoning' => 'deserunt id',
    'ZoningDescription' => 'amet reprehenderit'
  ]),
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer YOUR_KEY_HERE",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}