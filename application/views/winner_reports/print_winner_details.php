<?php

// echo "<pre>";
// print_r($result);

?>

<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>

<style>

body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A8"] {  
  width: 10cm;
  height: 4cm; 
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="portrait"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="portrait"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}

</style>

<page size="A8">
  
      <table style="width:100%;padding:10px;font-size: 14px;">
        <tr>
          <td style='width:30%;'>Name :</td>
          <td><?php echo ucwords($result['name']); ?></td>
        </tr>
        <tr>
          <td style='width:30%;'>Mobile No :</td>
          <td><?php echo $result['msisdn']; ?></td>
        </tr>
        <tr>
          <td style='width:30%;'>Address :</td>
          <td><?php echo ucwords($result['address']); ?></td>
        </tr>
      </table>

<!--<button onclick="myFunction()">Print this page</button>-->

<script>
function myFunction() {
    window.print();
}
</script>

</page>
