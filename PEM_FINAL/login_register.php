<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/loginstyle.css" />
    <title>Pet Smart Manager Sign in</title>
    <link rel="icon" href="img/logo.png" type="image/icon" />
    <script
    src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
  ></script>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <!--1st container-->
        <div class="signin-signup">
          <!-- SIGN IN FORM-->
          <form action="signin.php" method="post" class="sign-in-form" enctype="multipart/form-data">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input
                type="text"
                autocomplete="off"
                name="username"
                id="username"
                size="25"
                placeholder="Username"
                required
              />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input
                type="password"
                autocomplete="off"
                name="password"
                id="password"
                size="25"
                placeholder="Password"
                class="password"
                required
              />
                <span onclick="togglePass()"><i class="fa fa-eye-slash" style="margin-left: -30px; cursor: pointer;"></i></span>
            </div>
            <input type="submit" name="submit" value="Log in" class="btn solid" title="Log in"
            />
            <input type="reset" name="cancel" value="Cancel" class="btn solid" title="Cancel" />
          </form>
          <!-- SIGN UP FORM-->
          <form method="post" action="signup.php" enctype="multipart/form-data" class="sign-up-form">
            <h2 class="title">Create an account</h2>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="firstname_lastname" autocomplete="off" required/>
            </div>
            <div class="input-field">
                <i class="fas fa-birthday-cake"></i>
                <input type="date" name="birthday" autocomplete="off"required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder=" Email" autocomplete="off"required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input
                type="password"
                name="password"
                autocomplete="off"
                placeholder="Password"
                class="password"
                required
              />
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input
                type="password"
                name="password2"
                autocomplete="off"
                placeholder="Re-type your pass"
                class="password2"
                required
              />
            </div>
            <!--
            <div class = "text" >Upload Profile Picture</div>
            <input type="file" name="the_file" id="fileToUpload">-->
            <input type="submit" name="submit" class="btn" value="Sign up" />
            <input type="reset" name="cancel" value="Cancel" class="btn solid" title="Cancel" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <!--2nd container-->
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>Create an account and register your pet's journey!</p>
            <button class="btn transparent" id="sign-up-btn">Sign up</button>
          </div>
          <img src="img/pet.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>Log in and visualize your pet's evolution!</p>
            <button class="btn transparent" id="sign-in-btn">Sign in</button>
          </div>
          <img src="img/dog_walking.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
