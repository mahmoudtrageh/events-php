<?php

ob_start();
session_start();

 if(isset($_SESSION['usermail'])) {
    header('location:index.php');
} 

require_once('../modules/Database.php'); 
$db = new Database();

if(isset($_POST['resetPassword'])) {
    $name = $_GET['name'];
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);
    if($password == $confirmPassword) {
//        $password = password_hash($password, PASSWORD_DEFAULT);
         $db->query("UPDATE users SET password = :password WHERE usermail = :usermail");
         $db->bind(':password', $password);
         $db->bind(':usermail', $name);
         $db->execute();
                $count1 = $db ->rowCount();
                if ($count1 > 0) {
                    $success_message = "تم تغيير الباسورد بنجاح.<br> سوف يتم توجيهك لصفحة تسجيل الدخول الآن";
                    header("Refresh:3; url=http://localhost/realstate/");
                    } else {
                    $error_message= "فشل : <br> لم يتم التحديث";
                }
    } else {
        $error_message = "الباسورد غير متطابق";
    }
}

$page_title = 'كلمة المرور';
include ('./header.php');
	
?>


<div class="container">
    
        <h2 class="event-det text-center">رقم سري جديد</h2>

  <form name="resetPassword" class="login-form text-right mt-5" method="POST">

      <?php if(!empty($success_message)) { ?>
        <div class="success_message"><?php echo $success_message ?></div>
      <?php } ?>
      
       <?php if(!empty($error_message)) { ?>
        <div class="error_message"><?php echo $error_message ?></div>
      <?php } ?>
      
    <div class="input-container">
    <input type="password" id="pass" name="password" class="form-control text-right" autocomplete="new-password" onblur="this.placeholder=' الرقم السري الجديد'" placeholder="الرقم السري الجديد" onfocus="this.placeholder=''" required/>
    </div>
      
      <div class="input-container">
    <input type="password" id="pasconfirmPassword" name="confirmPassword" class="form-control text-right" autocomplete="new-password" onblur="this.placeholder='الرقم السري الجديد'" placeholder="الرقم السري الجديد" onfocus="this.placeholder=''" required/>
    </div>
            
      
      <button name="resetPassword" class="btn btn-success" style='width:50%;' type="submit">أرسل</button>
    
  </form>
</div>

<?php include ('./footer.php'); ?>
