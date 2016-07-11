<?php
/**
 * Template: element-type-wheel-of-fortune.php
 *
 * Available data: $element_id, $type, $id, $name, $classes, $description, $required, $answers, $response, $extra_attr, $response_year, $response_month, $response_day, $years, $months, $days
 */

?>
<div class="wheel-of-fortune <?php echo esc_attr( $id ); ?>">
<div id="wheeldiv">
  <canvas id='myCanvas' width='700' height='700'>
    Canvas not supported, use another browser.
  </canvas>
  <img id="prizepointer" src="<?php echo $pointer_image; ?>" />

</div>

<div id="cong"></div>
<div id="demo"></div>
<a href="#" onClick="spinWheel.startAnimation();" class="button">Spin the Wheel</a>
<input type="hidden" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo $response; ?>"/>
<script>
  var spinWheel = new Winwheel({
    'canvasId'    : 'myCanvas',
    'textAlignment' : 'center',
    'numSegments' : <?php echo count( $answers ); ?>,
    'textMargin' : 33,
    'textOrientation' : 'horizontal',
    'textFillStyle' : '#1C1D21',
    'textFontSize'    : 28,
    'lineWidth' : 2,
    'rotationAngle': -4,
    'segments'    :
        [
        <?php foreach ( $answers as $answer ) : ?>
            {'strokeStyle' : '#FFFAE0' , 'fillStyle' : '#FFFAE0', 'text' : '<?php echo $answer['label']; ?>'},
        <?php endforeach; ?>
        ],
    'animation' :
    {
      'type'     : 'spinToStop',
      'duration' : 5,
      'spins'    : 8,
      'callbackFinished' : 'alertPrize()'

    }
  });
  function alertPrize()
  {

    var winningSegment = spinWheel.getIndicatedSegment();
    var winningSegmentNumber = spinWheel.getIndicatedSegmentNumber();
    for (var x = 1; x < spinWheel.segments.length; x ++)
    {
      spinWheel.segments[x].fillStyle = 'gray';
      spinWheel.segments[x].strokeStyle = '#262626';
    }

    // Make the winning one yellow.
    spinWheel.segments[winningSegmentNumber].fillStyle = '#ffd34e';

    // Call draw function to render changes.
    spinWheel.draw();

    document.getElementById("cong").className = "setborder";
    document.getElementById("demo").className = "setborderbottom";

    document.getElementById('<?php echo $input_id; ?>').value = winningSegment.text;

    document.getElementById("cong").innerHTML = "<strong>" + winningSegment.text + "</strong>";
    document.getElementById("demo").innerHTML = "<?php echo $winning_text; ?>";
  }

</script>
</div>