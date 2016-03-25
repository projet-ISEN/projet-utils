<?php

// import phpCAS lib
include_once('/export/www/CAS/CAS.php');

//phpCAS::setDebug();

// initialize phpCAS
//phpCAS::proxy(CAS_VERSION_2_0,'web-brest.isen.fr',443,'/cas');
phpCAS::proxy(CAS_VERSION_2_0,'web.isen-bretagne.fr',443,'/cas');

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



?>



