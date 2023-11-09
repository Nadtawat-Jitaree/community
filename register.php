<?php 
  session_start();

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก | PUANJ</title>
</head>
<body>
<section class="vh-10" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src=""
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="db/register_db.php" method="POST">

                  <div class="d-flex align-items-center mb-1 pb-1">
                    <span class="h1 fw-bold mb-0">PUANJ</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">สมัครสมาชิกบัญชีของคุณ</h5>
                  <?php
                    if(isset($_SESSION['error'])){
                      echo "<div class='alert alert-danger'>";
                      echo $_SESSION['error'];
                      unset($_SESSION['error']);
                      echo "</div>";
                    }else if(isset($_SESSION['success'])){
                      echo "<div class='alert alert-success'>";
                      echo $_SESSION['success'];
                      unset($_SESSION['success']);
                      echo "</div>";
                    }
                  ?>

                  <div class="form-outline mb-2">
                    <input type="text" id="form2Example17" class="form-control form-control-lg" name="username" />
                    <label class="form-label" for="form2Example17">Username</label>
                  </div>

                  <div class="form-outline mb-2">
                    <input type="email" id="form2Example17" class="form-control form-control-lg" name="email" />
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div class="form-outline mb-2">
                    <input type="password" id="form2Example27" class="form-control form-control-lg" name="password" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="form-outline mb-2">
                    <input type="password" id="form2Example27" class="form-control form-control-lg" name="c_password" />
                    <label class="form-label" for="form2Example27">Password Confirm</label>
                  </div>

                  <div class="pt-1 mb-2">
                    <input class="btn btn-dark btn-lg btn-block" type="submit" name="submit" value="สมัครสมาชิก">
                  </div>
                  <p class="mb-0 pb-lg-2" style="color: #393f81;">คุณมีบัญชีผู้ใช้แล้วใช่ไหม? <a href="login.php"
                      style="color: #393f81;">เข้าสู่ระบบ</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>