<?php
    $to      = 'paul@amazingwei.com';
    $subject = 'from paul website message';
    $message = $_POST['msg']. "\r\n************ name = [" . $_POST['name'] . "] email = [". $_POST['email']."]";
    $headers = 'From: 30897292@qq.com' . "\r\n" .
        'Reply-To: 30897292@qq.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message);
    $msg_json = ['name' => $_POST['name'], 'email' => $_POST['email'], 'msg' => $_POST['msg']];

    $file = 'contact.json';
    if (file_exists($file)) {
        $current = file_get_contents($file);
        $current .= json_encode($msg_json)."\n";
        file_put_contents($file, $current);    
    } else {
        $myfile = fopen($file, "w") or die("Unable to open file!");
        $txt = json_encode($msg_json)."\n";
        fwrite($myfile, $txt);
        fclose($myfile);    
    }
    echo json_encode(['status' => '200']);
?>