<?php

/**
 * zeitbereinigte Quote fuer Unentschieden
 * @author Seymi
 */
class timeLine {
    
    public $start_odd = 3.6;
    public $full_time = 93;
    public $start_time;
    public $odd_now;
    public $minutes_played;
    
    protected function minutes_played ($start_time)
    {
      $now = date('Y-m-d H:i:s');
      echo $now;
      echo $start_time;
      
      return $start_time - $now;
    }
    
    public function get_current_odd($minutes_played, $start_odd)
    {
      $odd_now = ($start_odd - 1)*($this->full_time -$minutes_played)/$this->full_time+1;
      echo "die neue Quote: $odd_now";
      echo "<br/>";
      return $odd_now;
    }        
    
}

$timeLiner = new timeLine();

//multiple_lay




//$minutes_played = 16;
//$start_odd = 2.82;

echo $timeLiner->get_current_odd($timeLiner->minutes_played, $timeLiner->start_odd);

echo "<br/>";


?>

<form action="" >
    
<input id="minutes_played" type="number" name="minutes_played" size=1 />
<input id="start_odd" type="number" name="start_odd" size=1 />

<input type="submit" value="berechne Quote" onsubmit=" <?php $timeLiner->get_current_odd($minutes_played, $start_odd) ?>"/>
</form>
