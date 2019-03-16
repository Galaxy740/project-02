<?php
$('#datetimepicker').datetimepicker({
  format: 'dd/MM/yyyy hh:mm:ss',
  
});
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript"src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">

<div id="datetimepicker" class="input-append date">
    <input type="text" placeholder="dd/MM/yyyy hh:mm:ss"/>
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
     </span>
</div>