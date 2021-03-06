

<script type="text/javascript">
    
    auto_refresh = true;
    //auto_refresh = false;
    
    
    if (auto_refresh) window.onload = setupRefresh;
    
    function setupRefresh() {
      setTimeout("refreshPage();", 1000); // milliseconds
    }
    function refreshPage() {
       window.location = location.href;
    }
  </script> 



<?php
/* @var $this BetfairController 
 * $marketOdds
*/


$this->breadcrumbs = array(
    'Betfair' => array('/betfair'),
    'OddViewer',
);
?>



<p>
<?php
//   market odds starts here
//  print_r ($marketOdds);
//  print '<br/>';

  $show_header = true;
  $show_header = false;
  
  if ($show_header)
  {    
    print_r ($marketOdds->Result->header);
    print '<br/>';
  
    print_r ($marketOdds->Result->errorCode);
    print '<br/>';
  }    

?>  
</p>  

<?php
  //print_r ($marketOdds->Result->marketPrices);
  //print '<br/>';

  print date('Y-m-d H:i:s');   print '<br/>';
  
  if (array_key_exists('Result', $marketOdds))
  {
    //if (array_key_exists('marketPrices', $marketOdds->Result)  && is_array($marketOdds->Result) )
    if (array_key_exists('marketPrices', $marketOdds->Result))
    {
      print_r ($marketOdds->Result->marketPrices->currencyCode);
      print ' >> ';
      print_r ($marketOdds->Result->marketPrices->delay);
      print ' >> ';

      print_r ($marketOdds->Result->marketPrices->marketStatus);
      print ' >> ';

      print_r ($marketOdds->Result->marketPrices->numberOfWinners);
      print '<br/>';

      //print_r($marketOdds->Result->marketPrices->runnerPrices);
      print '<br/>';
    }    
  }    
  
  ?>


  <div id="odds">
  <table cellpadding="1" cellspacing="1" border="2">

  <?php
  
  //check if array has at least one element
  if (array_key_exists('RunnerPrices', $marketOdds->Result->marketPrices->runnerPrices ))
  {
      
    foreach ($marketOdds->Result->marketPrices->runnerPrices->RunnerPrices as $runnerPrice)
    {

     /*
      print_r ($runnerPrice);       print '<br/>';
     */ 

      print '<tr>';
      //print '<td rowspan="2" >';
      //print '<td rowspan="1" >';
      print '<td>';
      print 'selectionId: ' . $runnerPrice->selectionId;      //print '<br/>';
      //print 'asianLineId: ' . $runnerPrice->asianLineId;       print ' >> ';
      //print 'handicap: ' .  $runnerPrice->handicap;     print ' >> ';
      //print 'reductionFactor: ' . $runnerPrice->reductionFactor;        print ' >> ';
      //print 'sortOrder: ' . $runnerPrice->sortOrder;      print ' >> ';
      //print 'lastPrice: ' . $runnerPrice->lastPriceMatched;      print ' >> ';
      //print 'totalAmount: ' . $runnerPrice->totalAmountMatched;      print '<br/>';
      //print '_________________'; 
      print '</td>';

      print '<td class="odd_back">';
      //print_r ($runnerPrice->bestPricesToBack);

    // Vorlage von eventHierarchy
    //foreach ($marketDetails->Result->market->eventHierarchy->EventId as $eventHierarchyEventId)
    //{
    //    echo CHtml::link($eventHierarchyEventId, array('betfair/events', 'eventId'=>$eventHierarchyEventId)) . ' >> '; 
    //}

      //foreach ($runnerPrice->bestPricesToBack->Price->price as $price)
 
    //check if array has more than one element
    if (array_key_exists('bestPricesToBack', $runnerPrice ))
    {        
      
      foreach ($runnerPrice->bestPricesToBack as $price)
      {

            $sorted_prices = array();
            foreach($price as $p)
            {
                $sorted_prices[$p->depth] = $p;
            }

            krsort($sorted_prices);

            $records = array();
            foreach($sorted_prices as $record)
            {
                $records []= $record;
            }

            $sorted_prices = $records;
          
            
          print '<table>';
          print '<tr>';
          
          //foreach ($price as $p)
          foreach ($sorted_prices as $p)  
          {
             print '<td>';
             print $p->price;
             print '<br/>';
             print $p->amountAvailable;
             print '</td>';
          }    

          print '</tr>';
          print '</table>';
          
          //print_r( $price);
          //print $price->amountAvailable;
      }
      
    }

      print '</td>';

      print '<td class="odd_lay">';    
      //print_r ($runnerPrice->bestPricesToLay);

    if (array_key_exists('bestPricesToLay', $runnerPrice ))
    {        
      
      foreach ($runnerPrice->bestPricesToLay as $price)
      {
          print '<table>';
          print '<tr>';
          
          foreach ($price as $p)
          {
             print '<td>';
             print $p->price;
             print '<br/>';
             print $p->amountAvailable;
             print '</td>';
             
          } 
          print '</tr>';
          print '</table>';
          
          
          //print_r( $price);
          //print $price->amountAvailable;
      }    
    }


      print '</td>';
      
      
      print '<td>';
          print '<table>';
          print '<tr>';
                print 'lastPrice: ' . $runnerPrice->lastPriceMatched;      print '<br/>';
                print 'totalAmount: ' . $runnerPrice->totalAmountMatched;      
          print '</tr>';
          print '</table>';
      print '</td>';


      print '</tr>';
    }    
  
  }        

  
  ?>
  
  </table>
</div>

  <?php
  
  print_r( $marketOdds->Result->minorErrorCode);
  print '<br/>';
  
  
/*  
[currencyCode] => EUR 
[delay] => 0 
[discountAllowed] => 1 
[lastRefresh] => 1388988383940 
[marketBaseRate] => 5 
[marketId] => 112324681 
[marketInfo] => 
[removedRunners] => 
[marketStatus] => ACTIVE 
[numberOfWinners] => 1 
[bspMarket] =>  
*/
  
  

/*
  foreach ($marketDetails->Result->market as $key => $value) {
    print "Key: $key";
    print '<br/>';
    
    if (!is_array($value))
    {    
      print ("Value: $marketDetails->Result->market[$key]");
      print '<br/>';
    } else
    {
      //print_r ($value);
      print '<br/>';
    }    
        
  } 
 */   

/*
  foreach ($marketDetails->Result->market as $marketDetail) 
  {
    //print_r ($marketDetail);
  //  print '<br/>';
      
  print_r ($marketDetail->countryISO3);
  print '<br/>';
 */

  
  /*
  countryISO3
  discountAllowed
  eventTypeId
  lastRefresh
  marketBaseRate
  marketDescription
  marketDescriptionHasDate
  marketDisplayTime
  marketId
  marketStatus
  marketSuspendTime
  marketTime
  marketType
  marketTypeVariant
  menuPath
  eventHierarchy  (EventId)
  name
  numberOfWinners
  parentEventId

  runners    (asianLineId, handicap, name, selectionId)

  unit
  maxUnitValue
  minUnitValue          
  interval          
  runnersMayBeAdded        
  timezone
  couponLinks          
  bspMarket
  */        
          
  
 
?>

