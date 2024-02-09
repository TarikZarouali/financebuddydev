<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <!-- favicon -->
  <link rel="icon" type="image/svg+xml" href="<?=URLROOT?>assets/img/favicon.svg">
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?=URLROOT?>assets/css/style.css">
  <script src="<?=URLROOT?>assets/js/color-theme.js"></script>
  <title>Sign Up | CMS template by CodyHouse</title>
</head>
<body>
  <div class="container max-width-xxxs margin-y-xl">
    <form id="registrationForm" onsubmit="signUp(event)">

    <div class="text-component text-center margin-bottom-md">
            <h1>Get started</h1>
            <p>Already have an account? <a href="<?= URLROOT ?>users/login/">Login</a></p>
        </div>
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

      <h1 class="sr-only">Sign Up</h1>
    
      <div class="margin-bottom-sm">
        <div class="grid gap-xs">
          <div class="col-6@md">
            <label class="form-label margin-bottom-xxxs" for="userFirstName">First name</label>
            <input class="form-control width-100%" type="text" name="userFirstName" id="userFirstName">
          </div>
    
          <div class="col-6@md">
            <label class="form-label margin-bottom-xxxs" for="userLastName">Last name</label>
            <input class="form-control width-100%" type="text" name="userLastName" id="userLastName">
          </div>
        </div>
      </div>
    
      <div class="margin-bottom-sm">
        <label class="form-label margin-bottom-xxxs" for="userEmail">Email</label>
        <input class="form-control width-100%" type="email" name="userEmail" id="userEmail" placeholder="email@myemail.com">
      </div>

      <div class="margin-bottom-sm">
        <label class="form-label margin-bottom-xxxs" for="userUserName">Username</label>
        <input class="form-control width-100%" type="text" name="userUserName" id="userUserName" placeholder="email@myemail.com">
      </div>
    
      <div class="margin-bottom-sm">
            <div class="password-strength flex flex-column-reverse gap-xxs js-password-strength">
                <div>
                    <!-- requirements list -->
                    <p class="sr-only">Password requirements:</p>

                    <ul class="text-sm">
                        <li class="password-strength__req js-password-strength__req" data-password-req="length:6">
                            <svg class="icon" viewBox="0 0 16 16" aria-hidden="true">
                                <g class="password-strength__icon-group" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-miterlimit="10" stroke-width="2">
                                    <line x1="-6" y1="8" x2="8" y2="8" />
                                    <line x1="8" y1="8" x2="22" y2="8" />
                                </g>
                            </svg>

                            <span>At least six characters</span>
                        </li>

                        <li class="password-strength__req js-password-strength__req" data-password-req="special">
                            <svg class="icon" viewBox="0 0 16 16" aria-hidden="true">
                                <g class="password-strength__icon-group" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-miterlimit="10" stroke-width="2">
                                    <line x1="-6" y1="8" x2="8" y2="8" />
                                    <line x1="8" y1="8" x2="22" y2="8" />
                                </g>
                            </svg>

                            <span>At least one special character</span>
                        </li>

                        <li class="password-strength__req js-password-strength__req" data-password-req="uppercase">
                            <svg class="icon" viewBox="0 0 16 16" aria-hidden="true">
                                <g class="password-strength__icon-group" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-miterlimit="10" stroke-width="2">
                                    <line x1="-6" y1="8" x2="8" y2="8" />
                                    <line x1="8" y1="8" x2="22" y2="8" />
                                </g>
                            </svg>

                            <span>At least one uppercase character</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <!-- password field + stregth level (value + meter) -->
                    <label class="form-label margin-bottom-xxs" for="userPassword">Password</label>

                    <div class="password js-password ">
                        <input
                            class="password__input form-control width-100% js-password-strength__input js-password__input"
                            type="password" name="userPassword" id="js-Password" placeholder="password">

                        <button class="password__btn flex flex-center js-password__btn js-tab-focus">
                            <span class="password__btn-label" aria-label="Show password" title="Show password"><svg
                                    class="icon block" viewBox="0 0 32 32">
                                    <g stroke-linecap="square" stroke-linejoin="miter" stroke-width="2"
                                        stroke="currentColor" fill="none">
                                        <path
                                            d="M1.409,17.182a1.936,1.936,0,0,1-.008-2.37C3.422,12.162,8.886,6,16,6c7.02,0,12.536,6.158,14.585,8.81a1.937,1.937,0,0,1,0,2.38C28.536,19.842,23.02,26,16,26S3.453,19.828,1.409,17.182Z"
                                            stroke-miterlimit="10"></path>
                                        <circle cx="16" cy="16" r="6" stroke-miterlimit="10"></circle>
                                    </g>
                                </svg></span>
                            <span class="password__btn-label" aria-label="Hide password" title="Hide password"><svg
                                    class="icon block" viewBox="0 0 32 32">
                                    <g stroke-linecap="square" stroke-linejoin="miter" stroke-width="2"
                                        stroke="currentColor" fill="none">
                                        <path data-cap="butt"
                                            d="M8.373,23.627a27.659,27.659,0,0,1-6.958-6.445,1.938,1.938,0,0,1-.008-2.37C3.428,12.162,8.892,6,16.006,6a14.545,14.545,0,0,1,7.626,2.368"
                                            stroke-miterlimit="10" stroke-linecap="butt"></path>
                                        <path
                                            d="M27,10.923a30.256,30.256,0,0,1,3.591,3.887,1.937,1.937,0,0,1,0,2.38C28.542,19.842,23.026,26,16.006,26A12.843,12.843,0,0,1,12,25.341"
                                            stroke-miterlimit="10"></path>
                                        <path data-cap="butt" d="M11.764,20.243a6,6,0,0,1,8.482-8.489"
                                            stroke-miterlimit="10" stroke-linecap="butt"></path>
                                        <path d="M21.923,15a6.005,6.005,0,0,1-5.917,7A6.061,6.061,0,0,1,15,21.916"
                                            stroke-miterlimit="10"></path>
                                        <line x1="2" y1="30" x2="30" y2="2" fill="none" stroke-miterlimit="10"></line>
                                    </g>
                                </svg></span>
                        </button>
                    </div>

                    <div class="margin-top-xxs js-password-strength__meter-wrapper">
                        <div class="grid gap-xxs text-sm items-center">
                            <div class="password-strength__meter col-6@xs bg-contrast-lower js-password-strength__meter"
                                min="0" max="4" value="0" aria-hidden="true"><span class="block height-100%"></span>
                            </div>

                            <p class="col-6@xs text-right@xs color-contrast-medium" aria-live="polite"
                                aria-atomic="true">
                                Password strength: <span class="color-contrast-high js-password-strength__value"></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="margin-bottom-md">
            <label class="form-label margin-bottom-xxxs" for="userConfirmPassword">Confirm password</label>
            <input class="form-control width-100%" type="password" name="userConfirmPassword" id="js-ConfirmPassword"
                placeholder="confirm password">
        </div>
    
    
      <div class="margin-bottom-sm">
        <button class="btn btn--primary btn--md width-100%">Join</button>
      </div>

    </form>
  </div>

<script src="<?=URLROOT?>public/js/passwordchecker.js"></script>
<script src="<?=URLROOT?>assets/js/scripts.js"></script>
<script src="<?=URLROOT?>public/js/app.js"> </script>


</body>
</html>