<div id="market">
<?php
    $this->renderPartial('_marketViewer', array('marketDetails'=>$marketDetails,) );
?>
</div>

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
array('update' => '#MarketOdds'));
?>

<br/>
<?php echo CHtml::link('auto Refresh odds', array('betfair/getOdds', 'marketId'=>$marketId));
?>
