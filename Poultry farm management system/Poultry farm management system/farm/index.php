
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/dbconnection.php');
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT * FROM tbladmin WHERE UserName='$username' and Password='$password'";
    $query=mysqli_query($con,$sql);
    if(mysqli_num_rows($query) > 0)
    {
        $result=mysqli_fetch_object($query);
        $_SESSION['odmsaid']=$result->ID;
        $_SESSION['login']=$result->UserName;
        $_SESSION['names']=$result->FirstName;
        $_SESSION['permission']=$result->AdminName;
        $_SESSION['companyname']=$result->CompanyName;
        $get=$result->Status;
        $aa=$_SESSION['odmsaid'];
        $sql2="SELECT * from tbladmin where ID='$aa'";
        $query2=mysqli_query($con,$sql2);
        if(mysqli_num_rows($query2) > 0)
        {
            $row=mysqli_fetch_object($query2);
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
    else
    {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body class="login-body">
  <div class="pf-login-wrap">
    <!-- Decorative background chickens & eggs -->
    <div class="pf-decor">
      <svg class="pf-decor-chicken c1" viewBox="0 0 64 64">
        <path fill="#1d4a2c" d="M32 4c-5 0-9 3-10 7a1 1 0 0 0 0 1c2 4 6 4 10 4s8 0 10-4a1 1 0 0 0 0-1c-1-4-5-7-10-7z"/>
        <circle cx="22" cy="14" r="2" fill="#c9a227"/>
        <circle cx="42" cy="14" r="2" fill="#c9a227"/>
        <path fill="#c9a227" d="M30 24a8 8 0 0 1 8-8c4 0 7 2 8 6a1 1 0 0 0 0 2c-1 4-4 6-8 6s-7-2-8-6a1 1 0 0 0 0-2c-1-4 2-6 8-2z"/>
      </svg>
      <svg class="pf-decor-chicken c2" viewBox="0 0 64 64">
        <path fill="#1d4a2c" d="M32 4c-5 0-9 3-10 7a1 1 0 0 0 0 1c2 4 6 4 10 4s8 0 10-4a1 1 0 0 0 0-1c-1-4-5-7-10-7z"/>
        <circle cx="22" cy="14" r="2" fill="#c9a227"/>
        <circle cx="42" cy="14" r="2" fill="#c9a227"/>
        <path fill="#c9a227" d="M30 24a8 8 0 0 1 8-8c4 0 7 2 8 6a1 1 0 0 0 0 2c-1 4-4 6-8 6s-7-2-8-6a1 1 0 0 0 0-2c-1-4 2-6 8-2z"/>
      </svg>
      <svg class="pf-decor-egg e1" viewBox="0 0 32 32">
        <path fill="#fdf3d4" stroke="#e0c97a" stroke-width="1.5" d="M16 2c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9z"/>
        <path fill="#c9a227" d="M16 6a1 1 0 1 1 0 2a1 1 0 0 1 0-2z"/>
      </svg>
      <svg class="pf-decor-egg e2" viewBox="0 0 32 32">
        <path fill="#fdf3d4" stroke="#e0c97a" stroke-width="1.5" d="M16 2c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9z"/>
        <path fill="#c9a227" d="M16 6a1 1 0 1 1 0 2a1 1 0 0 1 0-2z"/>
      </svg>
      <svg class="pf-decor-egg e3" viewBox="0 0 32 32">
        <path fill="#fdf3d4" stroke="#e0c97a" stroke-width="1.5" d="M16 2c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9z"/>
        <path fill="#c9a227" d="M16 6a1 1 0 1 1 0 2a1 1 0 0 1 0-2z"/>
      </svg>
      <svg class="pf-decor-chicken c3" viewBox="0 0 64 64">
        <path fill="#1d4a2c" d="M32 4c-5 0-9 3-10 7a1 1 0 0 0 0 1c2 4 6 4 10 4s8 0 10-4a1 1 0 0 0 0-1c-1-4-5-7-10-7z"/>
        <circle cx="22" cy="14" r="2" fill="#c9a227"/>
        <circle cx="42" cy="14" r="2" fill="#c9a227"/>
        <path fill="#c9a227" d="M30 24a8 8 0 0 1 8-8c4 0 7 2 8 6a1 1 0 0 0 0 2c-1 4-4 6-8 6s-7-2-8-6a1 1 0 0 0 0-2c-1-4 2-6 8-2z"/>
      </svg>
    </div>

    <!-- Left: Farm branding panel with commercial icons -->
    <div class="pf-brand-panel">
      <div class="pf-brand-deck">
        <div class="pf-brand-mark">
          <svg class="pf-chicken-icon" viewBox="0 0 32 32" fill="#c9a227">
            <circle cx="16" cy="10" r="3"/>
            <path d="M12 16c-2 0-3 1-3 3v2c0 1 1 2 2 2h2c1 0 2-1 2-2v-2c0-2-1-3-3-3z"/>
            <path d="M20 16c-2 0-3 1-3 3v2c0 1 1 2 2 2h2c1 0 2-1 2-2v-2c0-2-1-3-3-3z"/>
            <path d="M14 22a6 6 0 0 1 6-6c3 0 5 1.5 6 4a1 1 0 0 0 0 2c-1 3-4 4-6 4s-5-1-6-4a1 1 0 0 0 0-2c-1-2.5 3-4 6-2z"/>
            <path fill="#1d4a2c" d="M16 8a1 1 0 1 1 0-2a1 1 0 0 1 0 2zM12 14a1 1 0 1 1 0-2a1 1 0 0 1 0 2zM20 14a1 1 0 1 1 0-2a1 1 0 0 1 0 2z"/>
          </svg>
          <span class="pf-mark-label">Fresh Eggs</span>
        </div>
        <h1 class="pf-brand-title">Poultry<span class="pf-brand-accent">Farm</span></h1>
        <p class="pf-brand-tagline">Commercial poultry management &amp; production system.</p>

        <!-- Poultry themed icons -->
        <div class="pf-biz-icons">
          <div class="pf-biz-item">
            <svg class="pf-biz-icon" viewBox="0 0 24 24" fill="#c9a227" stroke="rgba(255,255,255,0.4)" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="2"/>
              <path d="M16 16c-2 0-4-1-4-4s2-4 4-4 4 1 4 4-2 4-4 4zM8 16c-2 0-4-1-4-4s2-4 4-4 4 1 4 4-2 4-4 4z"/>
            </svg>
            <span class="pf-biz-label">Fresh Eggs</span>
          </div>
          <div class="pf-biz-item">
            <svg class="pf-biz-icon" viewBox="0 0 24 24" fill="#c9a227" stroke="rgba(255,255,255,0.4)" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="8" r="2"/>
              <path d="M8 16a4 4 0 0 0 4 4h4a4 4 0 0 0 4-4M12 8c-3 0-5 2-5 5v2M12 8c3 0 5 2 5 5v2"/>
            </svg>
            <span class="pf-biz-label">Flock</span>
          </div>
          <div class="pf-biz-item">
            <svg class="pf-biz-icon" viewBox="0 0 24 24" fill="#c9a227" stroke="rgba(255,255,255,0.4)" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
              <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
              <circle cx="9" cy="7" r="4"/>
              <path d="M23 21v-2a4 4 0 0 0-3-3.47"/>
            </svg>
            <span class="pf-biz-label">Egg Sales</span>
          </div>
        </div>

        <div class="pf-divider"></div>
        <ul class="pf-features">
          <li><span class="pf-check">🥚</span> Flock &amp; egg production tracking</li>
          <li><span class="pf-check">🐔</span> Sales &amp; invoice management</li>
          <li><span class="pf-check">🥚</span> User roles &amp; permissions</li>
        </ul>
      </div>
    </div>

    <!-- Right: Sign-in card -->
    <div class="pf-auth-card">
      <div class="pf-card-header">
        <div class="pf-nest">
          <svg class="pf-nest-svg" viewBox="0 0 24 24" fill="none" stroke="#c9a227" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 13a9 9 0 0 1 9 9h6a9 9 0 0 1 9-9"/>
            <path d="M12 15s-1 2-2 2s-2-1-2-2"/>
            <circle cx="9" cy="13" r="1" fill="#c9a227"/>
            <circle cx="15" cy="13" r="1" fill="#c9a227"/>
          </svg>
        </div>
        <h2>Sign In</h2>
        <p>Access your farm management account</p>
      </div>
      <form role="form" method="post" enctype="multipart/form-data" class="pf-auth-form">  
        <div class="pf-field">
          <label class="pf-label">Username</label>
          <div class="pf-input-wrapper">
            <svg class="pf-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <input type="text" class="pf-input" name="username" placeholder="Enter your username" required>
          </div>
        </div>
        <div class="pf-field">
          <label class="pf-label">Password</label>
          <div class="pf-input-wrapper">
            <svg class="pf-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            <input type="password" class="pf-input" name="password" placeholder="Enter your password" required>
          </div>
        </div>
        <div class="pf-footer-actions">
          <button name="login" class="pf-btn">Sign In</button>
        </div>
        <div class="pf-footer-links">
          <a href="forgot_password.php" class="pf-link">Forgot password?</a>
        </div>
      </form>
      <div class="pf-card-footer">
        <p>© <span id="pf-year"></span> Poultry Farm Management System</p>
      </div>
    </div>
  </div>

  <?php @include("includes/foot.php");?>
  <style>
    /* ===== Poultry Farm Login Theme — Commercial + Live Effects ===== */
    :root {
      --pf-green: #1d4a2c;
      --pf-green-dark: #14371f;
      --pf-green-light: #2e6b3f;
      --pf-gold: #c9a227;
      --pf-cream: #f7f4ed;
      --pf-white: #ffffff;
      --pf-text: #212b26;
      --pf-text-muted: #6b7a72;
      --pf-border: #d9dfd6;
      --pf-shadow: 0 20px 50px rgba(29, 74, 44, 0.12);
      --pf-radius: 14px;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body.login-body {
      font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
      background: var(--pf-cream);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--pf-text);
      line-height: 1.5;
    }

    /* Layout */
    .pf-login-wrap {
      display: flex;
      width: 100%;
      max-width: 1120px;
      height: 90vh;
      max-height: 760px;
      background: var(--pf-white);
      border-radius: var(--pf-radius);
      overflow: hidden;
      box-shadow: var(--pf-shadow);
      border: 1px solid rgba(29, 74, 44, 0.06);
      position: relative;
    }

    /* Decorative chickens & eggs background */
    .pf-decor {
      position: absolute;
      inset: 0;
      pointer-events: none;
      z-index: 0;
      overflow: hidden;
    }

    .pf-decor-chicken {
      position: absolute;
      opacity: 0.06;
      filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
      mix-blend-mode: multiply;
    }

    .pf-decor-egg {
      position: absolute;
      opacity: 0.05;
    }

    .c1 { top: 12%; left: 6%; width: 52px; height: 52px; animation: pf-float 7s ease-in-out infinite; }
    .c2 { top: 4%; right: 14%; width: 44px; height: 44px; animation: pf-float 9s ease-in-out infinite reverse; }
    .c3 { bottom: 16%; left: 10%; width: 60px; height: 60px; animation: pf-float 8s ease-in-out infinite; }

    .e1 { bottom: 10%; right: 18%; width: 26px; height: 26px; animation: pf-float 6s ease-in-out infinite reverse; }
    .e2 { top: 20%; left: 16%; width: 22px; height: 22px; animation: pf-float 5s ease-in-out infinite; }
    .e3 { bottom: 6%; right: 6%; width: 28px; height: 28px; animation: pf-float 7.5s ease-in-out infinite reverse; }

    @keyframes pf-float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-16px); }
    }

    /* Left brand panel */
    .pf-brand-panel {
      flex: 0 0 44%;
      background: linear-gradient(135deg, var(--pf-green) 0%, var(--pf-green-dark) 100%);
      color: var(--pf-white);
      padding: 56px 48px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
      z-index: 1;
    }

    .pf-brand-panel::before {
      content: "";
      position: absolute;
      top: -60px; left: -60px;
      width: 220px; height: 220px;
      background: radial-gradient(circle, rgba(201,162,39,0.14) 0%, transparent 70%);
      z-index: 0;
      pointer-events: none;
    }

    .pf-brand-deck {
      position: relative;
      z-index: 2;
      max-width: 330px;
    }

    .pf-brand-mark {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: rgba(201,162,39,0.15);
      border: 1px solid rgba(201,162,39,0.35);
      border-radius: 14px;
      padding: 10px 14px;
      margin-bottom: 24px;
      animation: pf-bounce 3s ease-in-out infinite;
    }

    .pf-chicken-icon { width: 26px; height: 26px; }
    .pf-mark-label {
      font-size: 13px;
      font-weight: 700;
      color: var(--pf-gold);
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }

    .pf-brand-title {
      font-size: 34px;
      font-weight: 800;
      margin: 0 0 8px 0;
      letter-spacing: -0.5px;
    }

    .pf-brand-accent {
      color: var(--pf-gold);
    }

    .pf-brand-tagline {
      font-size: 15px;
      margin: 0 0 30px 0;
      color: rgba(255,255,255,0.82);
      line-height: 1.6;
    }

    /* Business commercial icons row */
    .pf-biz-icons {
      display: flex;
      justify-content: space-between;
      margin: 24px 0 26px 0;
      opacity: 0.7;
    }

    .pf-biz-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px;
      cursor: default;
    }

    .pf-biz-icon {
      width: 22px; height: 22px;
      filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
    }

    .pf-biz-label {
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 0.3px;
      color: rgba(255,255,255,0.75);
    }

    @keyframes pf-bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-8px); }
    }

    .pf-divider {
      height: 1px;
      background: rgba(255,255,255,0.18);
      margin: 26px 0;
    }

    .pf-features {
      list-style: none;
    }

    .pf-features li {
      display: flex;
      align-items: center;
      font-size: 14px;
      color: rgba(255,255,255,0.88);
      margin-bottom: 12px;
    }

    .pf-check {
      margin-right: 10px;
      font-size: 16px;
      flex-shrink: 0;
    }

    /* Right auth card */
    .pf-auth-card {
      flex: 1;
      padding: 56px 52px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: var(--pf-white);
      position: relative;
      overflow: hidden;
    }

    .pf-auth-card::before {
      content: "";
      position: absolute;
      top: -50%; left: -50%;
      width: 200%; height: 200%;
      background: radial-gradient(circle at 30% 30%, rgba(29,74,44,0.04) 0%, transparent 40%);
      pointer-events: none;
      z-index: 0;
    }

    .pf-card-header {
      text-align: center;
      margin-bottom: 40px;
      position: relative;
      z-index: 1;
    }

    .pf-nest {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 50px; height: 50px;
      background: linear-gradient(135deg, var(--pf-green), var(--pf-green-light));
      border-radius: 12px;
      margin-bottom: 16px;
      box-shadow: 0 8px 24px rgba(29, 74, 44, 0.25);
      border: 1px solid rgba(255,255,255,0.3);
      animation: pf-bounce 4s ease-in-out infinite;
    }

    .pf-nest-svg { width: 26px; height: 26px; }

    .pf-card-header h2 {
      margin: 0 0 10px 0;
      font-size: 27px;
      font-weight: 700;
      color: var(--pf-text);
    }

    .pf-card-header p {
      margin: 0;
      font-size: 15px;
      color: var(--pf-text-muted);
    }

    /* Form */
    .pf-auth-form {
      display: flex;
      flex-direction: column;
      gap: 20px;
      position: relative;
      z-index: 1;
    }

    .pf-field {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .pf-label {
      font-size: 13.5px;
      font-weight: 600;
      color: var(--pf-text);
      letter-spacing: 0.2px;
    }

    .pf-input-wrapper {
      position: relative;
    }

    .pf-input-wrapper::before {
      content: "";
      position: absolute;
      left: 0; top: 0; right: 0; bottom: 0;
      border-radius: 10px;
      background: linear-gradient(90deg, transparent, rgba(29,74,44,0.06), transparent);
      opacity: 0;
      transition: opacity 0.3s ease;
      pointer-events: none;
      z-index: 1;
    }

    .pf-input-wrapper:focus-within::before {
      opacity: 1;
    }

    .pf-input-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      width: 18px; height: 18px;
      color: var(--pf-text-muted);
      pointer-events: none;
      z-index: 2;
      transition: all 0.2s ease;
    }

    .pf-input {
      width: 100%;
      padding: 15px 18px 15px 50px;
      font-size: 15px;
      border: 2px solid var(--pf-border);
      border-radius: 10px;
      background: #fbfcfb;
      color: var(--pf-text);
      transition: all 0.2s ease;
      outline: none;
      position: relative;
      z-index: 3;
    }

    .pf-input::placeholder {
      color: #b9c4bd;
    }

    .pf-input:focus {
      border-color: var(--pf-green);
      background: var(--pf-white);
      box-shadow: 0 0 0 5px rgba(29, 74, 44, 0.08);
      transform: translateY(-1px);
    }

    .pf-input-wrapper:focus-within .pf-input-icon {
      color: var(--pf-green);
      transform: translateY(-50%) scale(1.1);
    }

    /* Button */
    .pf-footer-actions {
      margin-top: 8px;
      position: relative;
      z-index: 1;
    }

    .pf-btn {
      width: 100%;
      padding: 16px;
      font-size: 15.5px;
      font-weight: 700;
      background: linear-gradient(135deg, #e2e5e0 0%, #cfd4cf 100%);
      color: var(--pf-green-dark);
      border: 1px solid #b9c2ba;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.2s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    .pf-btn::before {
      content: "";
      position: absolute;
      top: 0; left: -100%; width: 100%; height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.6), transparent);
      transition: 0.5s;
    }

    .pf-btn:hover::before {
      left: 100%;
    }

    .pf-btn:hover {
      background: linear-gradient(135deg, #cfd4cf 0%, #b9c2ba 100%);
      transform: translateY(-2px);
      box-shadow: 0 12px 32px rgba(29, 74, 44, 0.14);
      color: var(--pf-green-dark);
      border-color: #9fa8a0;
    }

    .pf-btn:active {
      transform: translateY(0);
      box-shadow: 0 6px 18px rgba(29, 74, 44, 0.12);
    }

    /* Links */
    .pf-footer-links {
      margin-top: 24px;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    .pf-link {
      color: var(--pf-green);
      text-decoration: none;
      font-size: 14px;
      font-weight: 600;
      transition: all 0.2s ease;
    }

    .pf-link:hover {
      text-decoration: underline;
      color: var(--pf-green-dark);
      transform: translateX(3px);
    }

    /* Footer */
    .pf-card-footer {
      margin-top: 32px;
      padding-top: 24px;
      border-top: 1px solid var(--pf-border);
      text-align: center;
      position: relative;
      z-index: 1;
    }

    .pf-card-footer p {
      margin: 0;
      font-size: 12.5px;
      color: var(--pf-text-muted);
    }

    /* Responsive */
    @media (max-width: 900px) {
      .pf-login-wrap {
        max-width: 94vw;
        height: auto;
        max-height: 94vh;
        flex-direction: column;
      }
      .pf-brand-panel {
        flex: none;
        height: 42vh;
        min-height: 300px;
        padding: 40px 32px;
        border-right: none;
        border-bottom: 1px solid rgba(255,255,255,0.12);
      }
      .pf-brand-deck { max-width: 100%; text-align: center; }
      .pf-biz-icons { justify-content: center; gap: 20px; }
      .pf-auth-card {
        padding: 48px 36px;
        justify-content: flex-start;
      }
      .pf-brand-title { font-size: 28px; }
      .pf-decor { display: none; }
    }

    @media (max-width: 480px) {
      body.login-body { min-height: 100vh; align-items: stretch; }
      .pf-login-wrap { border-radius: 0; height: 100vh; }
      .pf-brand-panel { height: 32vh; padding: 32px 24px; }
      .pf-auth-card { padding: 44px 24px; }
      .pf-brand-title { font-size: 24px; }
      .pf-card-header h2 { font-size: 24px; }
    }
  </style>
<script>
  document.getElementById('pf-year').textContent = new Date().getFullYear();
</script>
</body>
</html>
