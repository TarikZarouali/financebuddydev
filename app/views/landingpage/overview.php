<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/svg+xml" href="assets/img/favicon.svg">
  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <!-- end - Google font -->
  <script src="assets/js/color-theme.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>FinanceBuddy</title>
</head>

<body>
  <header class="f-header hide-nav hide-navFc--fixed js-hide-nav js-hide-nav--main js-f-header">
    <div class="f-header__mobile-content container max-width-lg">
      <a href="#0" class="f-header__logo">
        <svg width="40" height="40" viewBox="0 0 40 40">
          <title>Go to page top</title>
          <path d="M40,0H0V40H40Z" fill="var(--color-primary)" />
          <path d="M31,9H24V24h7Z" fill="#fff" />
          <path d="M16,9H9V31H24V24H16Z" fill="#fff" />
        </svg>
      </a>

      <button class="reset anim-menu-btn js-anim-menu-btn js-tab-focus f-header__nav-control" aria-label="Toggle menu">
        <i class="anim-menu-btn__icon anim-menu-btn__icon--close" aria-hidden="true"></i>
      </button>
    </div>

    <div class="f-header__nav" role="navigation">
      <div class="f-header__nav-grid container max-width-lg">
        <div class="f-header__nav-logo-wrapper margin-right-lg@md">
          <a href="#0" class="f-header__logo">
            <svg width="40" height="40" viewBox="0 0 40 40">
              <title>Go to page top</title>
              <path d="M40,0H0V40H40Z" fill="var(--color-primary)" />
              <path d="M31,9H24V24h7Z" fill="#fff" />
              <path d="M16,9H9V31H24V24H16Z" fill="#fff" />
            </svg>
          </a>
        </div>

        <ul class="f-header__list js-f-header__list">

        </ul>

        <ul class="f-header__list margin-left-auto@md">
          <li class="f-header__item"><a href="<?= URLROOT ?>user/login/" class="f-header__link">Login</a>
          </li>
          <li class="f-header__item"><a href="<?= URLROOT ?>user/register/" class="f-header__btn btn btn--primary">Registr now!</a></li>
        </ul>
      </div>
    </div>
  </header>

  <section class="position-relative z-index-1 padding-top-header">
    <div class="container max-width-adaptive-lg padding-y-xl position-relative z-index-2">
      <div class="grid gap-lg items-center@md">
        <div class="col-6@md">
          <div class="text-component margin-bottom-sm">
            <h1>Manage your finances with Finance Buddy!</h1>
            <p class="opacity-60% line-height-lg">The buddy we all need.</p>
          </div>
          <ul class="flex flex-wrap gap-md items-center opacity-30%">
          </ul>
        </div>
        <div class="col-6@md">
          <figure class="td-card js-td-card">
            <div class="inner-glow-top shadow-md radius-lg overflow-hidden backdrop-blur-10">
              <img class="block width-100% dark:display" src="assets/img/landingpage.png" alt="Image description">
            </div>
          </figure>
          </a>
        </div>
      </div>
    </div>

    <figure class="bg-decoration-v4 z-index-1" aria-hidden="true">
      <svg class="bg-decoration-v4__svg top-0 left-50% -translate-x-50%" viewBox="0 0 1440 700">
        <defs>
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient" x1="109" y1="399" x2="109" y2="181" gradientTransform="matrix(1, 0, 0, -1, 0, 700)" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="var(--color-contrast-higher)" />
            <stop offset="1" stop-color="var(--color-contrast-higher)" stop-opacity="0" />
          </linearGradient>
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-2" x1="543.5" y1="181" x2="543.5" y2="126" xlink:href="#bg-decoration-v4-fx-1-linear-gradient" />
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-3" x1="2247" y1="-486.5" x2="2302" y2="-486.5" gradientTransform="matrix(-1, 0, 0, 1, 3086, 950)" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="var(--color-contrast-higher)" stop-opacity="0.08" />
            <stop offset="1" stop-color="var(--color-contrast-higher)" stop-opacity="0" />
          </linearGradient>
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-4" x1="54.5" y1="290" x2="54.5" xlink:href="#bg-decoration-v4-fx-1-linear-gradient" />
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-5" x1="949.002" y1="318.628" x2="893.998" y2="318.372" gradientTransform="matrix(1, 0, 0, -1, 0, 700)" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="var(--color-contrast-higher)" stop-opacity="0" />
            <stop offset="1" stop-color="var(--color-contrast-higher)" stop-opacity="0.2" />
          </linearGradient>
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-6" x1="96.001" y1="289.888" x2="-0.001" y2="289.112" xlink:href="#bg-decoration-v4-fx-1-linear-gradient-5" />
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-7" x1="1222" y1="700" x2="1222" y2="264" gradientTransform="matrix(1, 0, 0, -1, 0, 700)" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="var(--color-primary)" stop-opacity="0.07" />
            <stop offset="1" stop-color="var(--color-primary)" stop-opacity="0" />
          </linearGradient>
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-8" x1="1440" y1="373" x2="1222" y2="373" gradientTransform="matrix(1, 0, 0, -1, 0, 700)" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="var(--color-primary)" stop-opacity="0.15" />
            <stop offset="1" stop-color="var(--color-primary)" stop-opacity="0.04" />
          </linearGradient>
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-9" x1="1059" y1="672.5" x2="1004" y2="672.5" gradientTransform="matrix(1, 0, 0, -1, 0, 700)" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="var(--color-primary)" />
            <stop offset="1" stop-color="var(--color-primary)" stop-opacity="0" />
          </linearGradient>
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-10" x1="2205.5" y1="961" x2="2205.5" y2="852" gradientTransform="matrix(0, -1, -1, 0, 2074, 2260)" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="var(--color-primary)" stop-opacity="0.03" />
            <stop offset="1" stop-color="var(--color-primary)" stop-opacity="0" />
          </linearGradient>
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-11" x1="1059.002" y1="645.627" x2="1003.998" y2="645.373" gradientTransform="matrix(1, 0, 0, -1, 0, 700)" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="var(--color-primary)" stop-opacity="0" />
            <stop offset="0.542" stop-color="var(--color-primary)" stop-opacity="0.2" />
          </linearGradient>
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-12" x1="1414.983" y1="483.067" x2="1222.017" y2="479.933" xlink:href="#bg-decoration-v4-fx-1-linear-gradient-11" />
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-13" x1="676" y1="536" x2="894" y2="536" gradientTransform="matrix(1, 0, 0, -1, 0, 700)" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="var(--color-accent)" stop-opacity="0.1" />
            <stop offset="1" stop-color="var(--color-accent)" stop-opacity="0.01" />
          </linearGradient>
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-14" x1="866.5" y1="427" x2="866.5" y2="372" gradientTransform="matrix(1, 0, 0, -1, 0, 700)" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="var(--color-accent)" stop-opacity="0.1" />
            <stop offset="1" stop-color="var(--color-accent)" stop-opacity="0" />
          </linearGradient>
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-15" x1="801.001" y1="563.896" x2="703.999" y2="563.104" gradientTransform="matrix(1, 0, 0, -1, 0, 700)" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="var(--color-accent)" stop-opacity="0" />
            <stop offset="1" stop-color="var(--color-accent)" stop-opacity="0.3" />
          </linearGradient>
          <linearGradient id="bg-decoration-v4-fx-1-linear-gradient-16" x1="894.002" y1="644.627" x2="838.998" y2="644.373" xlink:href="#bg-decoration-v4-fx-1-linear-gradient-15" />
        </defs>
        <path d="M0,301H198a20,20,0,0,1,20,20V519H0Z" opacity="0.03" fill="url(#bg-decoration-v4-fx-1-linear-gradient)" style="isolation:isolate" />
        <rect x="516" y="519" width="55" height="55" opacity="0.03" fill="url(#bg-decoration-v4-fx-1-linear-gradient-2)" style="isolation:isolate" />
        <rect x="839" y="436" width="55" height="55" fill="var(--color-contrast-higher)" opacity="0.03" style="isolation:isolate" />
        <rect x="784" y="436" width="55" height="55" fill="url(#bg-decoration-v4-fx-1-linear-gradient-3)" />
        <rect x="894" y="436" width="55" height="55" fill="var(--color-contrast-higher)" opacity="0.03" style="isolation:isolate" />
        <rect x="894" y="381" width="55" height="55" fill="var(--color-contrast-higher)" opacity="0.03" style="isolation:isolate" />
        <rect x="894" y="436" width="28" height="28" fill="var(--color-contrast-higher)" opacity="0.05" style="isolation:isolate" />
        <rect x="516" y="519" width="28" height="28" fill="var(--color-contrast-higher)" opacity="0.05" style="isolation:isolate" />
        <path d="M99,410a10,10,0,0,1,10,10v99H0V410Z" opacity="0.05" fill="url(#bg-decoration-v4-fx-1-linear-gradient-4)" style="isolation:isolate" />
        <rect x="894" y="381" width="55" height="1" fill="url(#bg-decoration-v4-fx-1-linear-gradient-5)" />
        <rect y="410" width="96" height="1" fill="url(#bg-decoration-v4-fx-1-linear-gradient-6)" />
        <rect x="1004" width="436" height="436" fill="url(#bg-decoration-v4-fx-1-linear-gradient-7)" />
        <rect x="1004" width="109" height="109" fill="var(--color-primary)" opacity="0.03" style="isolation:isolate" />
        <path d="M1420,218a20,20,0,0,1,20,20V436H1222V218Z" fill="url(#bg-decoration-v4-fx-1-linear-gradient-8)" />
        <path d="M1004,109h109v99a10,10,0,0,1-10,10h-99Z" fill="var(--color-primary)" opacity="0.03" style="isolation:isolate" />
        <rect x="1331" y="327" width="109" height="109" fill="var(--color-primary)" opacity="0.06" style="isolation:isolate" />
        <rect x="1004" width="55" height="55" opacity="0.05" fill="url(#bg-decoration-v4-fx-1-linear-gradient-9)" style="isolation:isolate" />
        <rect x="1412" y="408" width="28" height="28" fill="var(--color-primary)" opacity="0.2" style="isolation:isolate" />
        <rect x="1113" width="109" height="109" fill="url(#bg-decoration-v4-fx-1-linear-gradient-10)" />
        <path d="M1167,109V54h55v55Z" fill="var(--color-primary)" opacity="0.05" style="isolation:isolate" />
        <rect x="1004" width="28" height="28" fill="var(--color-primary)" opacity="0.05" style="isolation:isolate" />
        <rect x="1059" y="55" width="28" height="28" fill="var(--color-primary)" opacity="0.05" style="isolation:isolate" />
        <rect x="1004" y="54" width="55" height="1" fill="url(#bg-decoration-v4-fx-1-linear-gradient-11)" />
        <rect x="1222" y="218" width="193" height="1" fill="url(#bg-decoration-v4-fx-1-linear-gradient-12)" />
        <path d="M676,75a20,20,0,0,1,20-20H894V273H676Z" fill="url(#bg-decoration-v4-fx-1-linear-gradient-13)" />
        <path d="M704,136h99a10,10,0,0,1,10,10v99H704Z" fill="var(--color-accent)" opacity="0.07" style="isolation:isolate" />
        <rect x="839" y="273" width="55" height="55" fill="url(#bg-decoration-v4-fx-1-linear-gradient-14)" />
        <rect x="839" y="55" width="55" height="55" fill="var(--color-accent)" opacity="0.07" style="isolation:isolate" />
        <rect x="704" y="190" width="55" height="55" fill="var(--color-accent)" opacity="0.1" style="isolation:isolate" />
        <rect x="676" y="245" width="28" height="28" fill="var(--color-accent)" opacity="0.17" style="isolation:isolate" />
        <rect x="704" y="136" width="97" height="1" fill="url(#bg-decoration-v4-fx-1-linear-gradient-15)" />
        <rect x="839" y="55" width="55" height="1" fill="url(#bg-decoration-v4-fx-1-linear-gradient-16)" />
      </svg>
    </figure>
  </section>

  <section id="product" class="position-relative z-index-1 padding-top-xl padding-bottom-lg">
    <div class="container max-width-sm margin-bottom-xl">
      <h1 class="text-center">Benefits with Finance Buddy</h1>
    </div>

    <div class="container max-width-adaptive-lg">
      <ul class="grid gap-lg">
        <li class="col-6@sm col-3@md">
          <figure class="icon-feature margin-x-auto margin-bottom-md">
            <svg class="icon icon--md color-accent" viewBox="0 0 24 24">
              <g fill="currentColor">
                <path d="M24,8H0V2c0-0.552,0.448-1,1-1h22c0.552,0,1,0.448,1,1V8z"></path>
                <path opacity="0.5" d="M7,23H1c-0.552,0-1-0.448-1-1V10h7V23z"></path>
                <path opacity="0.5" d="M23,23H9V10h15v12C24,22.552,23.552,23,23,23z"></path>
              </g>
            </svg>
          </figure>

          <div class="text-component line-height-lg text-center">
            <h4>Infinite accounts</h4>
            <p class="color-contrast-low">Add an infinite amount of
              accounts to manage your finances wether it's personal or business related</p>
          </div>
        </li>

        <li class="col-6@sm col-3@md">
          <figure class="icon-feature margin-x-auto margin-bottom-md">
            <svg class="icon icon--md color-accent" viewBox="0 0 24 24">
              <g fill="currentColor">
                <path d="M10,14H2c-0.552,0-1-0.448-1-1V1c0-0.552,0.448-1,1-1h8c0.552,0,1,0.448,1,1v12C11,13.552,10.552,14,10,14z">
                </path>
                <path opacity="0.5" d="M10,24H2c-0.552,0-1-0.448-1-1v-6c0-0.552,0.448-1,1-1h8c0.552,0,1,0.448,1,1v6 C11,23.552,10.552,24,10,24z">
                </path>
                <path opacity="0.5" d="M22,8h-8c-0.552,0-1-0.448-1-1V1c0-0.552,0.448-1,1-1h8c0.552,0,1,0.448,1,1v6 C23,7.552,22.552,8,22,8z">
                </path>
                <path d="M22,24h-8c-0.552,0-1-0.448-1-1V11c0-0.552,0.448-1,1-1h8c0.552,0,1,0.448,1,1v12C23,23.552,22.552,24,22,24 z">
                </path>
              </g>
            </svg>
          </figure>

          <div class="text-component line-height-lg text-center">
            <h4>User friendly</h4>
            <p class="color-contrast-low">We care about our users experience and make it easier to access the things you want and need.</p>
          </div>
        </li>

        <li class="col-6@sm col-3@md">
          <figure class="icon-feature margin-x-auto margin-bottom-md">
            <svg class="icon icon--md color-accent" viewBox="0 0 24 24">
              <g fill="currentColor">
                <path d="M19,14c-2.757,0-5-2.243-5-5s2.243-5,5-5s5,2.243,5,5S21.757,14,19,14z"></path>
                <path opacity="0.5" d="M12.187,10.055c-1.737,0.602-3.482,1.974-4.674,4.023c-0.861-4.772-2.868-8.11-6.009-9.942 L0.496,5.864C4.148,7.994,6,12.75,6,20h2c0-4.407,2.432-7.221,4.841-8.056L12.187,10.055z">
                </path>
              </g>
            </svg>
          </figure>

          <div class="text-component line-height-lg text-center">
            <h4>Saving goals</h4>
            <p class="color-contrast-low">You will be able to add a saving goal on each account to help you out. There will also be a progress bar to encourage you with reaching you're desired goal</p>

          </div>
        </li>

        <li class="col-6@sm col-3@md">
          <figure class="icon-feature margin-x-auto margin-bottom-md">
            <svg class="icon icon--md color-accent" viewBox="0 0 24 24">
              <g fill="currentColor">
                <path d="M6.5,11h11c3,0,5.5-2.5,5.5-5.5S20.5,0,17.5,0h-11C3.5,0,1,2.5,1,5.5S3.5,11,6.5,11z M6.5,2 C8.4,2,10,3.6,10,5.5S8.4,9,6.5,9S3,7.4,3,5.5S4.6,2,6.5,2z">
                </path>
                <path opacity="0.5" d="M17.5,13h-11c-3,0-5.5,2.5-5.5,5.5S3.5,24,6.5,24h11c3,0,5.5-2.5,5.5-5.5S20.5,13,17.5,13z M17.5,22c-1.9,0-3.5-1.6-3.5-3.5s1.6-3.5,3.5-3.5s3.5,1.6,3.5,3.5S19.4,22,17.5,22z">
                </path>
              </g>
            </svg>
          </figure>

          <div class="text-component line-height-lg text-center">
            <h4>Budgets</h4>
            <p class="color-contrast-low">While you are saving it will help alot to have budgets for each category expense! This will be shown with diagrams to give you a clear look of how much of the budget you have left.</p>

          </div>
        </li>
      </ul>
    </div>
  </section>

  <footer class="footer-v3 padding-y-lg">
    <div class="footer-v3__container container max-width-lg">
      <div class="footer-v3__logo">
        <svg width="40" height="40" viewBox="0 0 40 40">
          <title>Go to page top</title>
          <path d="M40,0H0V40H40Z" fill="var(--color-primary)" />
          <path d="M31,9H24V24h7Z" fill="#fff" />
          <path d="M16,9H9V31H24V24H16Z" fill="#fff" />
        </svg>
      </div>

      <nav class="footer-v5__nav">
      </nav>

      <div class="footer-v3__socials">
        <a href="#0">
          <svg class="icon" viewBox="0 0 16 16">
            <title>Follow us on Twitter</title>
            <g>
              <path d="M16,3c-0.6,0.3-1.2,0.4-1.9,0.5c0.7-0.4,1.2-1,1.4-1.8c-0.6,0.4-1.3,0.6-2.1,0.8c-0.6-0.6-1.5-1-2.4-1 C9.3,1.5,7.8,3,7.8,4.8c0,0.3,0,0.5,0.1,0.7C5.2,5.4,2.7,4.1,1.1,2.1c-0.3,0.5-0.4,1-0.4,1.7c0,1.1,0.6,2.1,1.5,2.7 c-0.5,0-1-0.2-1.5-0.4c0,0,0,0,0,0c0,1.6,1.1,2.9,2.6,3.2C3,9.4,2.7,9.4,2.4,9.4c-0.2,0-0.4,0-0.6-0.1c0.4,1.3,1.6,2.3,3.1,2.3 c-1.1,0.9-2.5,1.4-4.1,1.4c-0.3,0-0.5,0-0.8,0c1.5,0.9,3.2,1.5,5,1.5c6,0,9.3-5,9.3-9.3c0-0.1,0-0.3,0-0.4C15,4.3,15.6,3.7,16,3z">
              </path>
            </g>
          </svg>
        </a>

        <a href="#0">
          <svg class="icon" viewBox="0 0 16 16">
            <title>Follow us on Youtube</title>
            <g>
              <path d="M15.8,4.8c-0.2-1.3-0.8-2.2-2.2-2.4C11.4,2,8,2,8,2S4.6,2,2.4,2.4C1,2.6,0.3,3.5,0.2,4.8C0,6.1,0,8,0,8 s0,1.9,0.2,3.2c0.2,1.3,0.8,2.2,2.2,2.4C4.6,14,8,14,8,14s3.4,0,5.6-0.4c1.4-0.3,2-1.1,2.2-2.4C16,9.9,16,8,16,8S16,6.1,15.8,4.8z M6,11V5l5,3L6,11z">
              </path>
            </g>
          </svg>
        </a>

        <a href="#0">
          <svg class="icon" viewBox="0 0 16 16">
            <title>Follow us on Github</title>
            <g>
              <path d="M8,0.2c-4.4,0-8,3.6-8,8c0,3.5,2.3,6.5,5.5,7.6 C5.9,15.9,6,15.6,6,15.4c0-0.2,0-0.7,0-1.4C3.8,14.5,3.3,13,3.3,13c-0.4-0.9-0.9-1.2-0.9-1.2c-0.7-0.5,0.1-0.5,0.1-0.5 c0.8,0.1,1.2,0.8,1.2,0.8C4.4,13.4,5.6,13,6,12.8c0.1-0.5,0.3-0.9,0.5-1.1c-1.8-0.2-3.6-0.9-3.6-4c0-0.9,0.3-1.6,0.8-2.1 c-0.1-0.2-0.4-1,0.1-2.1c0,0,0.7-0.2,2.2,0.8c0.6-0.2,1.3-0.3,2-0.3c0.7,0,1.4,0.1,2,0.3c1.5-1,2.2-0.8,2.2-0.8 c0.4,1.1,0.2,1.9,0.1,2.1c0.5,0.6,0.8,1.3,0.8,2.1c0,3.1-1.9,3.7-3.7,3.9C9.7,12,10,12.5,10,13.2c0,1.1,0,1.9,0,2.2 c0,0.2,0.1,0.5,0.6,0.4c3.2-1.1,5.5-4.1,5.5-7.6C16,3.8,12.4,0.2,8,0.2z">
              </path>
            </g>
          </svg>
        </a>
      </div>
    </div>
  </footer>

  <div class="modal modal--is-loading flex flex-center bg-black bg-opacity-90% padding-x-md js-modal" id="modal-video-1" data-modal-first-focus=".modal__close-btn">
    <div class="modal__content width-100% max-width-md max-height-100% overflow-auto shadow-md" role="alertdialog" aria-labelledby="modal-video-title-1" aria-describedby="">
      <p class="sr-only" id="modal-video-title-1">A video is being shown</p>

      <figure class="aspect-ratio-16:9">
        <iframe src="" class="js-modal-video__media" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      </figure>
    </div>

    <div class="modal__loader" aria-hidden="true">
      <svg class="icon icon--lg color-bg icon--is-spinning" viewBox="0 0 48 48">
        <path d="M24,48A24,24,0,1,1,48,24,24.027,24.027,0,0,1,24,48ZM24,4A20,20,0,1,0,44,24,20.023,20.023,0,0,0,24,4Z" opacity="0.4"></path>
        <path d="M48,24H44A20.023,20.023,0,0,0,24,4V0A24.028,24.028,0,0,1,48,24Z"></path>
      </svg>
    </div>

    <button class="reset modal__close-btn modal__close-btn--outer js-modal__close js-tab-focus">
      <svg class="icon icon--sm" viewBox="0 0 24 24">
        <title>Close modal window</title>
        <g fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="3" y1="3" x2="21" y2="21" />
          <line x1="21" y1="3" x2="3" y2="21" />
        </g>
      </svg>
    </button>
  </div>
  <script src="assets/js/scripts.js"></script>
</body>

</html>