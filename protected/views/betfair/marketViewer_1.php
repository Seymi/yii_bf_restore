

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
  

<div id="MarketOdds">
<?php
    $this->renderPartial('_oddViewer',array('marketOdds'=>$marketOdds));
?>
</div>

<div id="irgendwas">
<?php
    echo '<p>';
    echo 'some text';
    echo '</p>';
?>
</div>


<?php echo CHtml::ajaxLink('Refresh odds', array('betfair/oddViewer', 'marketId'=>$marketId),
array('update' => '#MarketOdds'))
?>


