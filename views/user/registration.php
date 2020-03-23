<?php
require_once '../../models/database_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Here</title>
    <link rel="stylesheet" href="css/registrtion.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
  <?php
  $err_fname="";
  $fname="";
  $err_lname="";
  $lname="";
  $err_uname="";
  $uname="";
  $err_email="";
  $email="";
  $err_phone="";
  $phone="";
  $err_gender="";
  $gender="";
  $err_pass="";
  $pass="";
  $err_cpass="";
  $cpass="";
  $wrong_pass="";
  $err_birthdate="";
  $birthdate="";
  $has_err=false;
  $u_type="user";
  if(isset($_POST['submit']))
		{
			if(empty($_POST['fname']))
			{
        $err_fname="*First Name Required";
        $has_err=true;
			}
			else
			{			
				$fname=htmlspecialchars($_POST['fname']);
      }
      if(empty($_POST['lname']))
			{
        $err_lname="*Last Name Required";
        $has_err=true;
			}
			else
			{			
				$lname=htmlspecialchars($_POST['lname']);
      }
      if(empty($_POST['uname']))
      {
        $err_uname="*Username Required";
        $has_err=true;
      }
      else
      {
        $uname=htmlspecialchars($_POST['uname']);
      }
      if(empty($_POST['email']))
      {
        $err_email="*Email Required";
        $has_err=true;
      }
      else
      {
        $email=htmlspecialchars($_POST['email']);
      }
      if(empty($_POST['phone']))
      {
        $err_phone="*Phone Number Required";
        $has_err=true;
      }
      else
      {
        $phone=htmlspecialchars($_POST['phone']);
      }
      if(empty($_POST['gender']))
      {
        $err_gender="*Gender Required";
        $has_err=true;
      }
      else
      {
        $gender=$_POST['gender'];
      }
      if(empty($_POST['birthdate']))
      {
        $err_birthdate="*Birthdate is required";
        $has_err=true;
      }
      else
      {
        $birthdate=$_POST['birthdate'];
      }
      if(empty($_POST['pass']))
      {
        $err_pass="*Password Required";
        $has_err=true;
      }
      if(empty($_POST['cpass']))
      {
        $err_cpass="*Confirm Password Required";
        $has_err=true;
      }
      else
      {
        if($_POST["pass"] === $_POST["cpass"])
        {
          $pass=htmlspecialchars($_POST['pass']);
          $cpass=htmlspecialchars($_POST['cpass']);
        }
        else
        {
          $wrong_pass="*Password Doesn't Match";
          $has_err=true;
        }
      }
      if(!$has_err)
      {
      $query = "INSERT INTO users (fname, lname, uname, email, phone, gender, bdate, pass, utype) VALUES ('$fname', '$lname', '$uname', '$email', '$phone', '$gender', '$birthdate', '$pass', '$u_type')";
      $result=execute($query);
      if(!$result)
      {
        echo "Failed".mysql_error();
        
      }
      else
      {
        header("Location:Login.php");
      }
      }
    }
	?>
    <div class="">
      <div class="register p-l-55 p-r-55 p-t-65 p-b-50">
        <form action="" class="register-form" method="post">
          <span class="register-form-title">Register Here</span>
          <input
            class="register-input"
            type="text"
            name="fname"
            placeholder="First Name"
            value="<?php echo $fname; ?>"
          />
          <br />
          <span style="color:red"><?php echo $err_fname;?></span>

          <input
            class="register-input"
            type="text"
            name="lname"
            placeholder="Last Name"
            value="<?php echo $lname; ?>"
          /><br />
          <span style="color:red"><?php echo $err_lname;?></span>
          <input class="register-input" type="text" name="uname" placeholder="Username" value="<?php echo $uname;?>"><br>
            <span style="color:red"><?php echo $err_uname;?></span>

          <input
            class="register-input"
            type="email"
            name="email"
            placeholder="Email Address"
            value="<?php echo $email;?>"
          />
          <br />
          <span style="color:red"><?php echo $err_email?></span>

          <input
            class="register-input"
            type="text"
            name="phone"
            placeholder="Phone Number"
            value="<?php echo $phone; ?>"
          />
          <br />
          <span style="color:red"><?php echo $err_phone;?></span>
          <table>
            <tr>
            <td><input class="male-input" type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">
            <span class="gender-input">Male</span> 
            </td>
            <td><input class="female-input" type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female">
            <span class="gender-input">Female</span> <br>
            </td>
            </tr>
            <tr>
            <td><span style="color:red"><?php echo $err_gender;?></span></td>
            </tr>
            </table>
          <input
            class="register-input"
            type="date"
            name="birthdate"
            placeholder="Date Of Birth"
            value="<?php echo $birthdate; ?>"
          />
          <br />
          <span style="color:red"><?php echo $err_birthdate;?></span>

          <input
            class="register-input"
            type="password"
            name="pass"
            placeholder="Password"
            value="<?php echo $pass; ?>"
          />
          <span style="color:red"><?php echo $err_pass;?></span>

          <br />
          <input
            class="register-input"
            type="password"
            name="cpass"
            placeholder="Confirm Password"
            value="<?php echo $cpass; ?>"
          />
          <br />
          <span style="color:red"><?php echo $err_cpass;?></span>
            <span style="color:red"><?php echo $wrong_pass;?></span>
          <input class="register-form-btn" type="submit" name="submit" value="Sign up">
        </form>
      </div>
    </div>
  </body>
</html>