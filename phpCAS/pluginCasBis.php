<?php

// import phpCAS lib
include_once('/export/www/CAS/CAS.php');

//phpCAS::setDebug();

// initialize phpCAS
//phpCAS::client(SAML_VERSION_1_1,'web-brest.isen.fr',443,'/cas');
phpCAS::client(SAML_VERSION_1_1,'web.isen-bretagne.fr',443,'/cas');

// no SSL validation for the CAS server
phpCAS::setNoCasServerValidation();

// Handle SAML logout requests that emanate from the CAS host exclusively.
// Failure to restrict SAML logout requests to authorized hosts could
// allow denial of service attacks where at the least the server is
// tied up parsing bogus XML messages.
//phpCAS::handleLogoutRequests(true, "web-brest.isen.fr");
phpCAS::handleLogoutRequests(true, "web.isen-bretagne.fr");

// force CAS authentication
phpCAS::forceAuthentication();

// at this step, the user has been authenticated by the CAS server

$userData = phpCAS::getAttributes();

/*
Les donnnés renvoyées pas CAS sont les suivantes : 
$userData["Login"]
$userData["Name"]
$userData["FirstName"]
$userData["LastName"]
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
        $groupeISEN = "CSI1";
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
        $groupeISEN = "CSI2";
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
        $groupeISEN = "CSI3";
        break;         
    case "1103":
        $groupeISEN = "CIR3";
        break;        
    case "1303":
        $groupeISEN = "CIPA3";
        break;         
    case "1004":
        $groupeISEN = "M1";
        break;        
    case "1304":
        $groupeISEN = "CIPA4";
        break;                
    case "1005":
        $groupeISEN = "M2";
        break;        
    case "1305":
        $groupeISEN = "CIPA5";
        break;                
    case "1006":
        $groupeISEN = "N6";
        break;                
    case "1306":
        $groupeISEN = "CIPA6";
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
    case "1004":  // M1
    case "1005":  // M2
        $groupeUPORTAL = "groupe07"; 
        break;       
    case "1303":  // CIPA3 
    case "1304":  // CIPA4
    case "1305":  // CIPA5
        $groupeUPORTAL = "groupe06"; // CIPA3, CIPA4, CIPA5
        break;        
    case "1103":  // CIR3
        $groupeUPORTAL = "groupe05"; 
        break;         
    case "1001":  // CSI1
    case "1101":  // CIR1
    case "1201":  // BTS-INFO-1
    case "1301":  // BTS-ELEC-1
    case "1002":  // CSI2
    case "1102":  // CIR2
    case "1202":  // BTS-INFO-2
    case "1302":  // BTS-ELEC-2
    case "1003":  // CSI3                    
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



