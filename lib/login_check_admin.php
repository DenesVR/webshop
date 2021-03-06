<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//$public_access = true;
require_once "autoload.php";

$_SESSION['admin'] = LoginCheck();

if ( $_SESSION['admin'] )
{
    //$_SESSION['admin'] = $admin;
    $_SESSION['msgs'][] = "Welkom, " . $_SESSION['admin']['admin_naam'];
    header("Location: ../admin.php");
}
else
{
    unset( $_SESSION['admin'] );
    //GoToNoAccess();
    //header("Location: ../admin.php");

    echo 'Lukt niet';
}

function LoginCheck()
{
    if ( $_SERVER['REQUEST_METHOD'] == "POST" )
    {
        //controle CSRF token
        //if ( ! key_exists("csrf", $_POST)) die("Missing CSRF");
        //if ( ! hash_equals( $_POST['csrf'], $_SESSION['lastest_csrf'] ) ) die("Problem with CSRF");

        //$_SESSION['lastest_csrf'] = "";

        //sanitization
        $_POST = StripSpaces($_POST);
        $_POST = ConvertSpecialChars($_POST);

        //validation
        $sending_form_uri = $_SERVER['HTTP_REFERER'];

        //Validaties voor het loginformulier
        if ( true )
        {
            if ( ! key_exists("admin_email", $_POST ) OR strlen($_POST['admin_email']) < 5 )
            {
                $_SESSION['errors']['admin_wachtwoord'] = "Het wachtwoord is niet correct ingevuld";
            }
            if ( ! key_exists("admin_wachtwoord", $_POST ) OR strlen($_POST['admin_wachtwoord']) < 8 )
            {
                $_SESSION['errors']['admin_wachtwoord'] = "Het wachtwoord is niet correct ingevuld";
            }
        }

        //terugkeren naar afzender als er een fout is
        if ( key_exists("errors" , $_SESSION ) AND count($_SESSION['errors']) > 0 )
        {
            $_SESSION['OLD_POST'] = $_POST;
            header( "Location: " . $sending_form_uri ); exit();
        }

        //search user in database
        $email = $_POST['admin_email'];
        $ww = $_POST['admin_wachtwoord'];

        $sql = "SELECT * FROM admin WHERE admin_email='$email' ";
        $data = GetData($sql);

        if ( count($data) > 0 )
        {
            foreach ( $data as $row )
            {
                if ( password_verify( $ww, $row['admin_wachtwoord'] ) ) return $row;
            }
        }

        return null;
    }
}
