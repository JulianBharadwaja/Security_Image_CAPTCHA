<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="background-color: #540002; color:black; font-weight:bold;">
    <form action="SecurtiyImage.php" method="post">
      <table border="1" align='center' style="border: 1px solid white;">
        <tr>
          <td>Validation Code</td>
          <td>
            <?php
              $arr = array_merge(range(0,9) , range("A","Z") );
              //print_r($arr);
              for($i=1;$i<=5;$i++)
              {
                $ch = $arr[array_rand($arr)];
                @$captcha=$captcha.$ch;
                @$fc=$fc.$ch.",";
              }
              //echo $fc."<br>";
              $nar=explode(",",$fc);
              for($i=0;$i<5;$i++)
              {
                echo $nar[$i];
              //  echo "<img src='$nar[$i].GIF'/>";
              }
              if(isset($_POST['match']))
              {
                if($_POST['img']==$_POST['hid'])
                {
                  echo "<br/><font color='blue'>security code matched</font>";
                }else{
                  echo "<br/><font color='red'>try again!</font>";
                }
              }
             ?>
          </td>
        </tr>
        <tr>
          <td>Enter the above code here: </td>
          <td><input name="img" type="text"></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="match" value="Submit Security Code">
          </td>
        </tr>
      </table>
      <input type="hidden" name="hid" value="<?php echo $captcha; ?>">
    </form>

  </body>
</html>
