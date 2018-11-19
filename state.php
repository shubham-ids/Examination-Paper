<?php
include('db/connection.php');
include('function.php');
  DependentTable('CountryId' ,STATE , 'country_id' , empty($_REQUEST['state_id'] ) ? '' : $_REQUEST['state_id']);
  DependentTable('stateId' ,DISTRICT , 'state_id' , 'district_id' , empty($_REQUEST['district_id'] ) ? '' : $_REQUEST['district_id']);
?>