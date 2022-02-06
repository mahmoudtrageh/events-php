<!-- main in all pages -->

<?php

session_start();

require_once ('modules/Database.php');

$db = new Database();

require_once ('functions.php');

if (isset($_SESSION['usermail']))
{ ?>


<?php

    $id = $_POST['myid'];

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $reginfo = $_POST['reginfo'];

    $regmail = $_POST['regmail'];

    $events_status = $_SESSION['status'];
    $phone_num = $_POST['vodNumber'];
    $reg_code = 'ev' . generateRandomString();

    if (isset($_POST['action']))
    {

        $db->query("SELECT id FROM users");
        $rowreg = $db->single();
        $countreg = $db->rowCount();

        if ($countreg > 0)
        {

            // register session with username
            $_SESSION['id'] = $rowreg->id;

        }

        $regby = $_SESSION['ID'];

        $db->query(" INSERT INTO users_registered (firstname, lastname, regmail, reginfo, regby, events_status, events_id, reg_status, phone_num, reg_code ) VALUES ('$firstname', '$lastname', '$regmail', '$reginfo', '$regby', '$events_status', '$id', 0, '$phone_num', '$reg_code')");
        $db->execute();
        header('location:event-details.php?id=' . $id . '');

       
    }

?>

    
<?php
}
else
{
    header('location:index.php');
}

?>
