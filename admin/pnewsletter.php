<?php
$counter=0;
session_start();
error_reporting(0);
if($_SESSION['username']==""){
  echo "<script>alert('Please Login')</script>";
  echo "<script>window.open('../','_self');</script>";
}
else{
  $user=$_POST['user'];
 require_once("../config.php"); ?>
<html>
<head>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body lang=EN-US>
<div class="container">
  <div class="row">
<table class="table" style="width: 100%;padding-bottom: 20px" class="table">
 <tr>
  <?php
 $sql1 = "SELECT * FROM `school` ORDER BY id DESC";
 $sc=mysqli_query($conn,$sql1);
 if($dd=mysqli_fetch_array($sc)){
  $name=$dd['name'];
  $head=$dd['head'];
  $tel=$dd['phone'];
  $po=$dd['po'];
 }
  ?>
  <td width="38%" colspan=3 style='width:20%;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:45.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span style='font-size:50.0pt;text-align: center;font-family: courier;color:green;
  mso-bidi-font-size:11.0pt'><?php echo $name." " ?>Secondary School<o:p></o:p><br></span></b>Tel: <?php echo "0".$tel;?><br>P.o Box <?php echo $po."<br><br>";?></p>
  </td>
 </tr>
  <table class="table">
    <tr>
       <td  colspan="2" class="text-success" style="font-size: 30px;text-align: center">
       NewsLetter Events of The Term
      </td>
    </tr>
    <?php
  $sql1 = "SELECT * FROM events";
  $fees=mysqli_query($conn,$sql1);
  while($nt=mysqli_fetch_array($fees)){
    $vhead=$nt['title'];
    $amt=$nt['description'];
  ?>
    <tr>
      <td style="color: gray;text-align: center;"><?php echo "<b>".$vhead."<b>"."<br>".$amt?></td>
      <br>
    </tr>
  <?php }?>
  </table>
  </div>
  </td>
 </tr>
</table><br><br><br>
</div>
</div>
<br>
<br>
<br>
<script type="text/javascript">
  window.load(print());
</script>
</body>
</html>
<?php } ?>