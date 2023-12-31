<style>
  @import url('https://fonts.googleapis.com/css2?family=Itim&display=swap');
  *{
    font-family: 'Itim', cursive;
  }
  body{
    background-color: #DADDE1!important;
  }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">PUANJ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="post.php">โพสต์</a>
        </li>
        <li class="nav-item">
          <?php 
            require('./db/db.php');
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM friends WHERE username='$username' AND verify='รอรับคำขอ'";
            $query = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($query);
          ?>
          <a class="nav-link" href="friends_verify.php">คำขอเป็นเพื่อน<span style="color: orange;">[<?php echo $num?>]</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ตั้งค่า
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">โปรไฟล์</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="setting.php">ตั้งค่าข้อมูลส่วนตัว</a></li>
            <li><a class="dropdown-item" href="#">เปลี่ยนรหัสผ่าน</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <?php 
            require('./db/db.php');
            $username=$_SESSION['username'];
            $sql = "SELECT * FROM users WHERE username='$username'";
            $query = mysqli_query($conn,$sql);
            $rows=mysqli_fetch_assoc($query);
            $role=$rows['role'];
          ?>
          <a href="profile.php" class="nav-link" aria-disabled="true"><?php echo $_SESSION['username']." "."[$role]"?></a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <a href="db/logout.php" class="btn btn-danger m-1">Logout</a>
    </div>
  </div>
</nav>