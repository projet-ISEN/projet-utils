<?php

// import phpCAS lib
include_once('/export/www/CAS/CAS.php');

//phpCAS::setDebug();

// initialize phpCAS
phpCAS::client(SAML_VERSION_1_1,'web-brest.isen.fr',443,'/cas');

// no SSL validation for the CAS server
phpCAS::setNoCasServerValidation();

// Handle SAML logout requests that emanate from the CAS host exclusively.
// Failure to restrict SAML logout requests to authorized hosts could
// allow denial of service attacks where at the least the server is
// tied up parsing bogus XML messages.
phpCAS::handleLogoutRequests(true, "web-brest.isen.fr");

// force CAS authentication
phpCAS::forceAuthentication();

// at this step, the user has been authenticated by the CAS server

$userData = phpCAS::getAttributes();

/*
Les donnnés renvoyées pas CAS sont les suivantes : 
$userData["Login"]
$userData["Name"]
$userData["Mail"]
$userData["Telephone"]
$userData["uidNumber"]
$userData["gidNumber"]
*/

// Pour avoir les noms des groupes ISEN-Brest en clair
$groupeISEN = "";
switch ($userData["gidNumber"]) {
    case "1000":
        $groupeISEN = "Personnel";
        break;
    case "1001":
        $groupeISEN = "N1";
        break;        
    case "1101":
        $groupeISEN = "CIR1";
        break;         
    case "1201":
        $groupeISEN = "BTS-INFO-1";
        break;         
    case "1301":
        $groupeISEN = "BTS-ELEC-1";
        break;          
    case "1002":
        $groupeISEN = "N2";
        break;         
    case "1102":
        $groupeISEN = "CIR2";
        break;         
    case "1202":
        $groupeISEN = "BTS-INFO-2";
        break; 
    case "1302":
        $groupeISEN = "BTS-ELEC-2";
        break;        
    case "1003":
        $groupeISEN = "N3";
        break;         
    case "1103":
        $groupeISEN = "CIR3";
        break;        
    case "1303":
        $groupeISEN = "ITII3";
        break;         
    case "1004":
        $groupeISEN = "N4";
        break;        
    case "1304":
        $groupeISEN = "ITII4";
        break;                
    case "1005":
        $groupeISEN = "N5";
        break;        
    case "1305":
        $groupeISEN = "ITII5";
        break;                
    case "1006":
        $groupeISEN = "N6";
        break;                
    case "1306":
        $groupeISEN = "ITII6";
        break;                
    case "1010":
        $groupeISEN = "Divers";
        break;                
    case "1011":
        $groupeISEN = "Vacataire";
        break;
    case "1012":
        $groupeISEN = "Invite";
        break; 
    case "1013":
        $groupeISEN = "Thesard";
        break;            
    case "1100":
        $groupeISEN = "club";
        break;
}

// Pour avoir les noms des groupes dans uPortal en clair
$groupeUPORTAL = "";
switch ($userData["gidNumber"]) {
    case "1000":  // Personnel
        $groupeUPORTAL = "groupe08"; 
        break;
    case "1004":  // N4
    case "1005":  // N5
        $groupeUPORTAL = "groupe07"; 
        break;       
    case "1303":  // ITII3 
    case "1304":  // ITII4
    case "1305":  // ITII5
        $groupeUPORTAL = "groupe06"; // ITII3, ITII4, ITII5
        break;        
    case "1103":  // CIR3
        $groupeUPORTAL = "groupe05"; 
        break;         
    case "1001":  // N1
    case "1101":  // CIR1
    case "1201":  // BTS-INFO-1
    case "1301":  // BTS-ELEC-1
    case "1002":  // N2
    case "1102":  // CIR2
    case "1202":  // BTS-INFO-2
    case "1302":  // BTS-ELEC-2
    case "1003":  // N3                    
        $groupeUPORTAL = "groupe04";
        break;   
    case "1013":  // Thesard
    case "1011":  // Vacataire    
        $groupeUPORTAL = "groupe03"; 
        break;        
    case "1006":  // N6
        $groupeUPORTAL = "groupe02"; 
        break;
    case "1012":  // Invite             
        $groupeUPORTAL = "groupe01";
        break;                        
}

?>



