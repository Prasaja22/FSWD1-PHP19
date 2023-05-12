<!DOCTYPE html>

<?php
    include("../databases/koneksi.php");

    session_start();

    
    if(isset($_POST['login'])){

        $inptEmail = $_SESSION['email'] = $_POST['email'];
        $inptPass = $_SESSION['password'] = $_POST['password'];
        
        $query = "SELECT * FROM users WHERE email='$inptEmail' AND password='$inptPass'";;
        $result = mysqli_query($conn, $query);
        
        if($result->num_rows > 0){

            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $row['email'];
            echo "
            <script>
              alert('Berhasil Login selamat datang $_SESSION[email]');
              document.location.href = '../index.php';
            </script>
          ";
        } else {
            echo "
            <script>
              alert('Email atau password salah');
              document.location.href = 'login.php';
            </script>
          ";
        }
    }


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-start">

            <h3 class="mb-5 text-center">Sign in</h3>
            <form action="" method="post" >
                <div class="form-outline mb-4">
                    <label class="form-label" for="typeEmailX-2">Email</label>
                  <input type="email" value="<?php echo @$_SESSION['email'] ?>" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                </div>
    
                <div class="form-outline mb-4">
                    <label class="form-label" for="typePasswordX-2">Password</label>
                  <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                </div>
    
                <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
 

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>


</html>
