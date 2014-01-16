<?php
/* @var $this BetfairController 
   $markets 
 * $marketOdds
*/


$this->breadcrumbs = array(
    'Betfair' => array('/betfair'),
    'MarketViewer',
);
?>


<h2><?php print $marketDetails->Result->market->menuPath; ?></h2>


<?php

/*
  print_r ($marketDetails);
  print '<br/>';
  print '<br/>';
  print '<br/>';

  print_r(array_keys($marketDetails));
  print '<br/>';
  print '<br/>';
  print '<br/>';
 */ 

  print_r ($marketDetails->Result->header);
  print '<br/>';
  print 'XXXXXXXXXXXXX    XXXXXXXXXXXXXXXXXX   XXXXXXXXXXXXX';
  print '<br/>';
  print '<br/>';


  print_r ($marketDetails->Result->errorCode);
  print '<br/>';    
  print '<br/>';
  print '<br/>';
  print ' ############   ##############  #################  ';
  print '<br/>';
  print '<br/>';
    
/*
 *     
  var_dump($marketDetails->Result->market);
  print '<br/>';
  print '<br/>';
  print '<br/>';

  print_r(array_keys($marketDetails->Result->market));
  print '<br/>';
  print '<br/>';
  print '<br/>';
*/    

  print "Country: " . $marketDetails->Result->market->countryISO3; print " >> ";
  print "BaseRate: " . $marketDetails->Result->market->marketBaseRate; print " >> ";
  print "marketId: " .  $marketDetails->Result->market->marketId; print " >> ";
  print "marketStatus: " . $marketDetails->Result->market->marketStatus; print " >> ";
  print "marketSuspendTime: " . $marketDetails->Result->market->marketSuspendTime . ' ' . $marketDetails->Result->market->timezone;;
  print '<br/>';
  
  // eventHierarchy
  foreach ($marketDetails->Result->market->eventHierarchy->EventId as $eventHierarchyEventId)
  {
      echo CHtml::link($eventHierarchyEventId, array('betfair/events', 'eventId'=>$eventHierarchyEventId)) . ' >> '; 
  }
  
  // array of selectionId and runners
  //check if array has more than one element
  if (array_key_exists('Runner', $marketDetails->Result->market->runners ))
  {        
      $runners = array();
      foreach($marketDetails->Result->market->runners->Runner  as $runner)
      {
          $runners[$runner->selectionId] = $runner->name;
      }          
      print_r($runners);
  }    
  
?>

<h3><?php   print $marketDetails->Result->market->name; ?></h3>
  
