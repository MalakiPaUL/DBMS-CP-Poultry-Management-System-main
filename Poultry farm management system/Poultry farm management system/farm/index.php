
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/dbconnection.php');
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT * FROM tbladmin WHERE UserName=:username and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        foreach ($results as $result) 
        {
            $_SESSION['odmsaid']=$result->ID;
            $_SESSION['login']=$result->username;
            $_SESSION['names']=$result->FirstName;
            $_SESSION['permission']=$result->AdminName;
            $_SESSION['companyname']=$result->CompanyName;
            $get=$result->Status;
        }
        $aa= $_SESSION['odmsaid'];
        $sql="SELECT * from tbladmin  where ID=:aa";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aa',$aa,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
            foreach($results as $row)
            {            
                if($row->Status=="1")
                { 
                 echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";      
             } else
             { 
                echo "<script>
                alert('Your account was disabled Approach Admin');document.location ='index.php';
                </script>";
            }
        } 
    } 
} else{
    echo "<script>alert('Invalid Details');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body class="login-body">
  <div class="poultry-login-wrap">
    <!-- Decorative background chickens -->
    <div class="chicken-bg">
      <svg class="chicken c1" viewBox="0 0 64 64"><path d="M32 4c-5 0-9 3-10 7a1 1 0 0 0 0 1c2 4 6 4 10 4s8 0 10-4a1 1 0 0 0 0-1c-1-4-5-7-10-7z"/><path d="M22 14c-2 0-3 1-3 3v2c0 1 1 2 2 2h2c1 0 2-1 2-2v-2c0-2-1-3-3-3z"/><path d="M42 14c-2 0-3 1-3 3v2c0 1 1 2 2 2h2c1 0 2-1 2-2v-2c0-2-1-3-3-3z"/><path d="M30 24a8 8 0 0 1 8-8c4 0 7 2 8 6a1 1 0 0 0 0 2c-1 4-4 6-8 6s-7-2-8-6a1 1 0 0 0 0-2c-1-4 2-6 8-2z"/></svg>
      <svg class="chicken c2" viewBox="0 0 64 64"><path d="M32 4c-5 0-9 3-10 7a1 1 0 0 0 0 1c2 4 6 4 10 4s8 0 10-4a1 1 0 0 0 0-1c-1-4-5-7-10-7z"/><path d="M22 14c-2 0-3 1-3 3v2c0 1 1 2 2 2h2c1 0 2-1 2-2v-2c0-2-1-3-3-3z"/><path d="M42 14c-2 0-3 1-3 3v2c0 1 1 2 2 2h2c1 0 2-1 2-2v-2c0-2-1-3-3-3z"/><path d="M30 24a8 8 0 0 1 8-8c4 0 7 2 8 6a1 1 0 0 0 0 2c-1 4-4 6-8 6s-7-2-8-6a1 1 0 0 0 0-2c-1-4 2-6 8-2z"/></svg>
      <svg class="chicken c3" viewBox="0 0 64 64"><path d="M32 4c-5 0-9 3-10 7a1 1 0 0 0 0 1c2 4 6 4 10 4s8 0 10-4a1 1 0 0 0 0-1c-1-4-5-7-10-7z"/><path d="M22 14c-2 0-3 1-3 3v2c0 1 1 2 2 2h2c1 0 2-1 2-2v-2c0-2-1-3-3-3z"/><path d="M42 14c-2 0-3 1-3 3v2c0 1 1 2 2 2h2c1 0 2-1 2-2v-2c0-2-1-3-3-3z"/><path d="M30 24a8 8 0 0 1 8-8c4 0 7 2 8 6a1 1 0 0 0 0 2c-1 4-4 6-8 6s-7-2-8-6a1 1 0 0 0 0-2c-1-4 2-6 8-2z"/></svg>
      <svg class="chicken c4" viewBox="0 0 64 64"><path d="M32 4c-5 0-9 3-10 7a1 1 0 0 0 0 1c2 4 6 4 10 4s8 0 10-4a1 1 0 0 0 0-1c-1-4-5-7-10-7z"/><path d="M22 14c-2 0-3 1-3 3v2c0 1 1 2 2 2h2c1 0 2-1 2-2v-2c0-2-1-3-3-3z"/><path d="M42 14c-2 0-3 1-3 3v2c0 1 1 2 2 2h2c1 0 2-1 2-2v-2c0-2-1-3-3-3z"/><path d="M30 24a8 8 0 0 1 8-8c4 0 7 2 8 6a1 1 0 0 0 0 2c-1 4-4 6-8 6s-7-2-8-6a1 1 0 0 0 0-2c-1-4 2-6 8-2z"/></svg>
      <svg class="chicken c5" viewBox="0 0 64 64"><path d="M32 4c-5 0-9 3-10 7a1 1 0 0 0 0 1c2 4 6 4 10 4s8 0 10-4a1 1 0 0 0 0-1c-1-4-5-7-10-7z"/><path d="M22 14c-2 0-3 1-3 3v2c0 1 1 2 2 2h2c1 0 2-1 2-2v-2c0-2-1-3-3-3z"/><path d="M42 14c-2 0-3 1-3 3v2c0 1 1 2 2 2h2c1 0 2-1 2-2v-2c0-2-1-3-3-3z"/><path d="M30 24a8 8 0 0 1 8-8c4 0 7 2 8 6a1 1 0 0 0 0 2c-1 4-4 6-8 6s-7-2-8-6a1 1 0 0 0 0-2c-1-4 2-6 8-2z"/></svg>
    </div>
    <!-- Left: Farm branding panel -->
    <div class="poultry-panel">
      <div class="deck">
        <div class="farm-badge">
          <svg class="icon icon-lg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 10h.01M15 10h.01M12 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/></svg>
        </div>
        <h1 class="farm-title">Poultry Farm</h1>
        <h2 class="farm-subtitle">Management System</h2>
        <p class="farm-tagline">Manage your flock, track production, and grow your farm with confidence.</p>
        <div class="decor-row">
          <svg class="icon icon-sm" viewBox="0 0 24 24" fill="#e9c46a"><circle cx="12" cy="12" r="3"/></svg>
          <svg class="icon icon-sm" viewBox="0 0 24 24" fill="#e9c46a"><circle cx="12" cy="12" r="3"/></svg>
          <svg class="icon icon-sm" viewBox="0 0 24 24" fill="#e9c46a"><circle cx="12" cy="12" r="3"/></svg>
        </div>
      </div>
    </div>

    <!-- Right: Sign-in card -->
    <div class="auth-card">
      <div class="card-header">
        <div class="brand-mark">
          <svg class="icon icon-md" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 10h.01M15 10h.01M12 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/></svg>
        </div>
        <h2>Welcome Back</h2>
        <p>Sign in to your farm account</p>
      </div>
      <form role="form" method="post" enctype="multipart/form-data" class="auth-form">  
        <div class="input-box mb-3">
          <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Username" required>
        </div>
        <div class="input-box mb-4">
          <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
        </div>
        <div class="d-grid mt-4">
          <button name="login" class="btn btn-lg btn-gradient-primary font-weight-medium">SIGN IN</button>
        </div>
        <div class="text-center mt-4">
          <a href="forgot_password.php" class="text-link">Forgot Password?</a>
        </div>
      </form>
      <div class="card-footer">
        <p>© Poultry Farm Management System</p>
      </div>
    </div>
  </div>

  <?php @include("includes/foot.php");?>
  <style>
    /* ===== Poultry Farm Login Theme ===== */
    :root {
      --pf-green: #2d5a27;
      --pf-green-dark: #1e3d1b;
      --pf-green-light: #4a7c59;
      --pf-gold: #e9c46a;
      --pf-cream: #fdfaf0;
      --pf-white: #ffffff;
      --pf-text: #2d3436;
      --pf-text-muted: #6c757d;
      --pf-border: #e3e8e7;
      --pf-shadow: 0 16px 48px rgba(45, 90, 39, 0.16);
      --pf-radius: 16px;
    }

    * { box-sizing: border-box; }

    body.login-body {
      margin: 0;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
      background: var(--pf-cream);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* Container */
    .poultry-login-wrap {
      display: flex;
      width: 100%;
      max-width: 1080px;
      height: 86vh;
      max-height: 700px;
      background: var(--pf-white);
      border-radius: var(--pf-radius);
      overflow: hidden;
      box-shadow: var(--pf-shadow);
      border: 1px solid rgba(45, 90, 39, 0.08);
      position: relative;
    }

    /* Background chickens */
    .chicken-bg {
      position: absolute;
      inset: 0;
      pointer-events: none;
      z-index: 0;
      overflow: hidden;
    }

    .chicken {
      position: absolute;
      opacity: 0.08;
      filter: drop-shadow(0 2px 4px rgba(0,0,0,0.15));
      mix-blend-mode: multiply;
    }

    .c1 { top: 10%; left: 5%; width: 44px; height: 44px; animation: float 6s ease-in-out infinite; }
    .c2 { top: 5%; right: 12%; width: 38px; height: 38px; animation: float 8s ease-in-out infinite reverse; }
    .c3 { bottom: 15%; left: 8%; width: 50px; height: 50px; animation: float 7s ease-in-out infinite; }
    .c4 { bottom: 8%; right: 10%; width: 42px; height: 42px; animation: float 9s ease-in-out infinite reverse; }
    .c5 { top: 35%; left: 50%; width: 34px; height: 34px; transform: translateX(-50%); animation: float 5.5s ease-in-out infinite; }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-14px); }
    }

    /* Left farm panel */
    .poultry-panel {
      flex: 0 0 40%;
      background: linear-gradient(135deg, var(--pf-green) 0%, var(--pf-green-dark) 100%);
      color: var(--pf-white);
      padding: 48px 42px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
      border-right: 1px solid rgba(255,255,255,0.12);
    }

    .poultry-panel::before {
      content: "";
      position: absolute;
      top: -80px; left: -80px;
      width: 260px; height: 260px;
      background: radial-gradient(circle, rgba(233,196,106,0.18) 0%, transparent 70%);
      z-index: 0;
      pointer-events: none;
    }

    .poultry-panel .deck {
      position: relative;
      z-index: 1;
      max-width: 320px;
    }

    .farm-badge {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 60px; height: 60px;
      background: rgba(255,255,255,0.14);
      border-radius: 16px;
      border: 2px solid rgba(255,255,255,0.22);
      margin-bottom: 20px;
    }

    .icon-lg { width: 28px; height: 28px; color: var(--pf-gold); }
    .icon-md { width: 30px; height: 30px; color: var(--pf-gold); }
    .icon-sm { width: 20px; height: 20px; }

    .farm-title {
      font-size: 36px;
      font-weight: 800;
      margin: 0 0 10px 0;
      letter-spacing: -0.5px;
      color: var(--pf-white);
    }

    .farm-subtitle {
      font-size: 20px;
      font-weight: 600;
      margin: 0 0 18px 0;
      color: var(--pf-gold);
    }

    .farm-tagline {
      font-size: 15px;
      line-height: 1.7;
      margin: 0 0 32px 0;
      color: rgba(255,255,255,0.88);
    }

    .decor-row {
      display: flex;
      gap: 10px;
      justify-content: center;
      margin-top: 8px;
    }

    /* Right auth card */
    .auth-card {
      flex: 1;
      padding: 52px 48px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: var(--pf-white);
      position: relative;
    }

    .card-header {
      text-align: center;
      margin-bottom: 38px;
    }

    .brand-mark {
      width: 56px; height: 56px;
      background: linear-gradient(135deg, var(--pf-green), var(--pf-green-light));
      border-radius: 14px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      margin-bottom: 16px;
      box-shadow: 0 8px 20px rgba(45, 90, 39, 0.22);
      border: 1px solid rgba(255,255,255,0.3);
    }

    .card-header h2 {
      margin: 0 0 10px 0;
      font-size: 26px;
      font-weight: 700;
      color: var(--pf-text);
    }

    .card-header p {
      margin: 0;
      font-size: 15px;
      color: var(--pf-text-muted);
    }

    /* Form inputs with icons + borders */
    .input-box {
      position: relative;
      margin-bottom: 0;
    }

    .input-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      width: 20px; height: 20px;
      color: var(--pf-text-muted);
      pointer-events: none;
      z-index: 2;
    }

    .form-control {
      width: 100%;
      padding: 16px 18px 16px 52px;
      font-size: 15px;
      border: 2px solid var(--pf-border);
      border-radius: 12px;
      background: #fbfdfb;
      color: var(--pf-text);
      transition: all 0.2s ease;
    }

    .form-control::placeholder {
      color: #adb5bd;
    }

    .form-control:focus {
      outline: none;
      border-color: var(--pf-green);
      background: var(--pf-white);
      box-shadow: 0 0 0 5px rgba(45, 90, 39, 0.10);
    }

    .input-box:focus-within .input-icon {
      color: var(--pf-green);
    }

    /* Button */
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      padding: 16px;
      font-size: 16px;
      font-weight: 700;
      border: none;
      border-radius: 12px;
      color: var(--pf-white);
      cursor: pointer;
      transition: all 0.2s ease;
      text-decoration: none;
    }

    .btn-gradient-primary {
      background: linear-gradient(135deg, var(--pf-green) 0%, var(--pf-green-light) 100%);
    }

    .btn-gradient-primary:hover {
      background: linear-gradient(135deg, var(--pf-green-dark) 0%, var(--pf-green) 100%);
      transform: translateY(-1px);
      box-shadow: 0 10px 28px rgba(45, 90, 39, 0.3);
    }

    .btn-gradient-primary:active {
      transform: translateY(0);
    }

    .d-grid {
      display: grid;
    }

    .text-link {
      color: var(--pf-green);
      text-decoration: none;
      font-size: 14px;
      font-weight: 600;
    }

    .text-link:hover {
      text-decoration: underline;
      color: var(--pf-green-dark);
    }

    .card-footer {
      margin-top: 34px;
      padding-top: 26px;
      border-top: 1px solid var(--pf-border);
      text-align: center;
    }

    .card-footer p {
      margin: 0;
      font-size: 13px;
      color: var(--pf-text-muted);
    }

    /* Responsive */
    @media (max-width: 900px) {
      .poultry-login-wrap {
        max-width: 94vw;
        height: auto;
        max-height: 94vh;
        flex-direction: column;
      }
      .poultry-panel {
        flex: none;
        height: 40vh;
        min-height: 280px;
        padding: 36px 30px;
        border-right: none;
        border-bottom: 1px solid rgba(255,255,255,0.12);
      }
      .poultry-panel .deck {
        max-width: 100%;
        text-align: center;
      }
      .decor-row { justify-content: center; }
      .auth-card {
        padding: 44px 34px;
        justify-content: flex-start;
      }
      .farm-title { font-size: 28px; }
      .farm-subtitle { font-size: 18px; }
    }

    @media (max-width: 480px) {
      body.login-body { min-height: 100vh; align-items: stretch; }
      .poultry-login-wrap {
        border-radius: 0;
        height: 100vh;
      }
      .poultry-panel { height: 32vh; padding: 30px 24px; }
      .auth-card { padding: 40px 24px; }
      .farm-badge { width: 50px; height: 50px; }
      .icon-lg { width: 24px; height: 24px; }
      .farm-title { font-size: 24px; }
      .card-header h2 { font-size: 22px; }
    }
  </style>
</body>
</html>
