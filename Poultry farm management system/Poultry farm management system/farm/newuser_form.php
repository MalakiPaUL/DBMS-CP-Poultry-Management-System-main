<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(!empty($_POST["fullname"])) {
  $fullname= $_POST["fullname"];
  
  $sql ="SELECT UserName FROM tbladmin WHERE UserName=:fullname";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':fullname', $fullname, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<script>alert('Username already exists. try another one');</script>";
} else{
    if(isset($_POST['signup']))
    { 
        $fname=$_POST['fullname'];
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email=$_POST['emailid']; 
        $staffid=$_POST['staffid']; 
        $mobile=$_POST['mobileno'];
        $dignity=$_POST['dignity']; 
        $password=md5($_POST['password']); 
        $sql="INSERT INTO  tbladmin(Staffid,AdminName,UserName,FirstName,LastName,Email,MobileNumber,Password) VALUES(:staffid,:dignity,:fname,:firstname,:lastname,:email,:mobile,:password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fname',$fname,PDO::PARAM_STR);
        $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
        $query->bindParam('lastname',$lastname,PDO::PARAM_STR);
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        $query->bindParam(':staffid',$staffid,PDO::PARAM_STR);
        $query->bindParam(':dignity',$dignity,PDO::PARAM_STR);
        $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
        $query->bindParam(':password',$password,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
            echo "<script>alert('Registration successfull. Now you can login');</script>";
        }
        else 
        {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }
}
}

?>
<script>
    function checkAvailability() 
    {
        $("#loaderIcon").show();
        jQuery.ajax(
        {
            url: "check_availability.php",
            data:'emailid='+$("#emailid").val(),
            type: "POST",
            success:function(data)
            {
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
</script>

<script>
    function checkAvailability2() 
    {
        $("#loaderIcon").show();
        jQuery.ajax(
        {
            url: "check_availability.php",
            data:'fullname='+$("#fullname").val(),
            type: "POST",
            success:function(data)
            {
                $("#user-availability-status2").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
</script>
<script type="text/javascript">
    function valid()
    {
        if(document.signup.password.value!= document.signup.confirmpassword.value)
        {
            alert("Password and Confirm Password Field do not match  !!");
            document.signup.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script>
<div class="card-body">
    <div class="poultry-signup-wrap">
        <div class="poultry-card">
            <div class="poultry-header">
                <img src="companyimages/poultrylogo.png" alt="Poultry Farm Logo" class="poultry-logo">
                <div class="poultry-brand">
                    <h2 class="poultry-title">Create Staff Account</h2>
                    <p class="poultry-sub">Poultry Farm Management System &bull; Staff Registration</p>
                </div>
            </div>
            <form method="post" name="signup" onSubmit="return valid();" class="poultry-form">
                <div class="poultry-field">
                    <label for="dignity">Role / Permission</label>
                    <select class="poultry-select" name="dignity" id="dignity" required>
                        <option value="">Select permission</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>
                <div class="poultry-field">
                    <label for="staffid">Staff ID</label>
                    <input type="text" class="poultry-input" name="staffid" id="staffid" placeholder="e.g. STF-001" required="required">
                </div>
                <div class="poultry-field">
                    <label for="fullname">User Name</label>
                    <input type="text" class="poultry-input" name="fullname" id="fullname" placeholder="Enter user name" onBlur="checkAvailability2()" required="required">
                    <span id="user-availability-status2" style="font-size:12px;"></span>
                </div>
                <div class="poultry-field">
                    <label for="firstname">First Name</label>
                    <input type="text" class="poultry-input" name="firstname" id="firstname" placeholder="First name" required="required">
                </div>
                <div class="poultry-field">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="poultry-input" name="lastname" id="lastname" placeholder="Last name" required="required">
                </div>
                <div class="poultry-field">
                    <label for="mobileno">Mobile Number</label>
                    <input type="text" class="poultry-input" name="mobileno" id="mobileno" placeholder="Mobile number" required="required">
                </div>
                <div class="poultry-field">
                    <label for="emailid">Email Address</label>
                    <input type="email" class="poultry-input" name="emailid" id="emailid" placeholder="you@farm.com" onBlur="checkAvailability()" required="required">
                    <span id="user-availability-status" style="font-size:12px;"></span>
                </div>
                <div class="poultry-field">
                    <label for="password">Password</label>
                    <input type="password" class="poultry-input" name="password" id="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required="required">
                </div>
                <div class="poultry-field">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" class="poultry-input" name="confirmpassword" id="confirmpassword" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required="required">
                </div>
                <button type="submit" name="signup" id="submit" class="poultry-btn">Register Account</button>
            </form>
        </div>
    </div>
</div>