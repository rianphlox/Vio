

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Login - Directorate Of Road Traffic Services (DRTS)</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link href="./assets/demo/demo.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f4f3ef;
    }

    .login-container {
      margin-top: 10%;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center login-container">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">Login</h3>
          </div>
          <div class="card-body">
            <form method="POST" id="form">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
              </div>
              <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include './inc/scripts.php' ?>
  <script>
    const form = document.querySelector('#form')
    form.addEventListener('submit', e => {
      e.preventDefault();
      fetch('req/login.php', {
        method: "POST",
        body: new FormData(form)
      })
      .then(res => res.json())
      .then(data => {
        demo.showNotification('top', 'right', data.msgClass, data.msg, data.icon);
        form.reset();

        if (data.msgClass == 'success') {
          setTimeout(() => {
            location.href = "tac_solar";
          }, 2000);
        }
      })
    })
  </script>
  
</body>

</html>
