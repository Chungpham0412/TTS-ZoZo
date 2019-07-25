<!DOCTYPE html>
<?php
if(isset($_POST['abc'])){
    // Authorisation details.
    $username = $_POST['username'];
    $hash = $_POST['hash'];

    // Config variables. Consult http://api.txtlocal.com/docs for more info.
    $test = "0";

    // Data for text message. This is the text message data.
    $sender = $_POST['sender']; // This is who the message appears to be from.
    $numbers = $_POST['num']; // A single number or a comma-seperated list of numbers
    $message = $_POST['mess'];
    // 612 chars or less
    // A single number or a comma-seperated list of numbers
    $message = urlencode($message);
    $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
    $ch = curl_init('http://api.txtlocal.com/send/?');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); // This is the result from the API
    curl_close($ch);
    echo($result);
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="test.php" method="POST" role="form">

       <table align="center">
           <tr>
               <td>Tên</td>
               <td><input type="text" name="username" class="form-control"></td>
           </tr>
           <tr>
               <td>hash</td>
               <td><input type="text" name="hash" class="form-control"></td>
           </tr>
           <tr>
               <td>sender</td>
               <td><input type="text" name="sender" class="form-control"></td>
           </tr>
           <tr>
               <td>num</td>
               <td><input type="text" name="num" class="form-control"></td>
           </tr>
           <tr>
               <td>mess</td>
               <td><textarea name="mess"></textarea></td>
           </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="abc" value="send">
                    
                </td>
            </tr>
       </table>
    
        
    
    </form>
</body>
</html>