
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <!-- favicon -->
  <link rel="icon" type="image/svg+xml" href="assets/img/favicon.svg">
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= URLROOT; ?>assets/css/style.css">
  <script src="assets/js/color-theme.js"></script>
  <title>Login | CMS template by CodyHouse</title>
</head>
<body>

  <div class="container max-width-xxxs margin-y-xl">
  <form id="loginform" onsubmit="signIn(event)">
      <div class="text-center margin-bottom-md">
        <a class="inline-block size-50 hover:reduce-opacity" href="index.html">
          <svg class="block" viewBox="0 0 40 40">
            <circle fill="var(--color-contrast-higher)" cx="20" cy="20" r="20"/>
            <path d="M12.64,20.564a6.437,6.437,0,0,0-4.4,1.388S10,24.2,12.133,24.475a6.486,6.486,0,0,0,3.625-.846S14.455,20.8,12.64,20.564Z" fill="var(--color-bg)"/>
            <path d="M22.036,13.407a7.041,7.041,0,0,0-1.111-3.88s-3,1.562-3.152,3.54a6.978,6.978,0,0,0,1.739,4.688S21.851,15.73,22.036,13.407Z" fill="var(--color-bg)"/>
            <path d="M29.048,26.433a7.624,7.624,0,0,0-.321-4.122c-1.052-2.448-4.326-3.784-4.326-3.784a7.973,7.973,0,0,0-.164,5.713A3.294,3.294,0,0,0,25.451,25.6,16.016,16.016,0,0,1,14.758,10.527v-1h-2v1A17.988,17.988,0,0,0,21.19,25.746a5.859,5.859,0,0,0-2.433-.151,8.093,8.093,0,0,0-4,2.352s2.6,2.883,4.846,2.49a7.889,7.889,0,0,0,4.627-3.153,17.885,17.885,0,0,0,6.527,1.243h1v-2h-1A16.094,16.094,0,0,1,29.048,26.433Z" fill="var(--color-bg)"/>
          </svg>
        </a>
      </div>

      <h1 class="sr-only">Log in</h1>
      <input type="hidden" name="loginFailed">

      <div class="margin-bottom-sm">
        <label class="form-label margin-bottom-xxxs" for="userUserName">Username</label>
        <input class="form-control width-100%" type="text" name="userUserName" id="userUserName">
      </div>
    
      <div class="margin-bottom-sm">
        <div class="flex justify-between margin-bottom-xxxs">
          <label class="form-label" for="userPassword">Password</label> 
        </div>
    
        <input class="form-control width-100%" type="password" name="userPassword" id="userPassword">
      </div>
    
      <div class="margin-bottom-sm">
        <button class="btn btn--primary btn--md width-100%">Login</button>
      </div>
    
      <div class="text-center">
        <p class="text-sm color-contrast-medium">Don't have an account? <a class="color-contrast-higher" href="<?=URLROOT?>user/register/">Get started</a></p>
      </div>
    </form>
  </div>

  <div class="toast toast--hidden toast--top-right js-toast" role="alert" aria-live="assertive" aria-atomic="true" id="toast-5">
                
                </div>
<script src="<?=URLROOT?>assets/js/scripts.js"></script>
<script src="<?= URLROOT; ?>public/js/app.js"> </script>

</body>
</html>

