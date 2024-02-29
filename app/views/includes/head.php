<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        document.getElementsByTagName("html")[0].className += " js";
    </script>
    <!-- favicon -->
    <link rel="icon" type="image/svg+xml" href="<?= URLROOT ?>assets/img/favicon.svg">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= URLROOT ?>assets/css/style.css">
    <link rel="stylesheet" href="<?=URLROOT?>public/css/style.css">
    <script src="<?= URLROOT ?>assets/js/color-theme.js"></script>
    <title>Finance Buddy!</title>
</head>

<body>
    <!-- start mobile header -->
    <header class="position-sticky top-0 z-index-header bg shadow-xs padding-x-component padding-y-sm flex items-center justify-between hide@md">
        <a class="block size-32 hover:reduce-opacity" href="index.html">
            <svg class="block" viewBox="0 0 40 40">
                <circle fill="var(--color-contrast-higher)" cx="20" cy="20" r="20" />
                <path d="M12.64,20.564a6.437,6.437,0,0,0-4.4,1.388S10,24.2,12.133,24.475a6.486,6.486,0,0,0,3.625-.846S14.455,20.8,12.64,20.564Z" fill="var(--color-bg)" />
                <path d="M22.036,13.407a7.041,7.041,0,0,0-1.111-3.88s-3,1.562-3.152,3.54a6.978,6.978,0,0,0,1.739,4.688S21.851,15.73,22.036,13.407Z" fill="var(--color-bg)" />
                <path d="M29.048,26.433a7.624,7.624,0,0,0-.321-4.122c-1.052-2.448-4.326-3.784-4.326-3.784a7.973,7.973,0,0,0-.164,5.713A3.294,3.294,0,0,0,25.451,25.6,16.016,16.016,0,0,1,14.758,10.527v-1h-2v1A17.988,17.988,0,0,0,21.19,25.746a5.859,5.859,0,0,0-2.433-.151,8.093,8.093,0,0,0-4,2.352s2.6,2.883,4.846,2.49a7.889,7.889,0,0,0,4.627-3.153,17.885,17.885,0,0,0,6.527,1.243h1v-2h-1A16.094,16.094,0,0,1,29.048,26.433Z" fill="var(--color-bg)" />
            </svg>
        </a>

        <button class="btn btn--subtle" aria-controls="cms-main-sidebar">Menu</button>
    </header>
    <!-- end mobile header -->

    <div class="flex@md">
        <aside id="cms-main-sidebar" class="sidebar sidebar--static@md js-sidebar" data-static-class="position-relative z-index-2 bg-dark width-100% max-width-xxxxs flex flex-column">
            <div class="sidebar__panel flex-grow flex flex-column">
                <!-- start sidebar (mobile) header -->
                <header class="sidebar__header bg padding-y-sm padding-left-md padding-right-sm border-bottom z-index-2">
                    <h1 class="text-md text-truncate" id="sidebar-title">Menu</h1>

                    <button class="reset sidebar__close-btn js-sidebar__close-btn js-tab-focus">
                        <svg class="icon icon--xs" viewBox="0 0 16 16">
                            <title>Close panel</title>
                            <g stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                                <line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line>
                                <line x1="2.5" y1="2.5" x2="13.5" y2="13.5"></line>
                            </g>
                        </svg>
                    </button>
                </header>
                <!-- end sidebar (mobile) header -->

                <!-- start sidebar (desktop) header -->
                <header class="display@md padding-x-xs margin-bottom-lg">
                    <div class="flex items-center justify-between height-60 padding-right-xs padding-left-xxxs">
                        <a class="block size-40 hover:reduce-opacity" href="index.html">
                            <svg class="block" viewBox="0 0 40 40">
                                <circle fill="var(--color-contrast-higher)" cx="20" cy="20" r="20" />
                                <path d="M12.64,20.564a6.437,6.437,0,0,0-4.4,1.388S10,24.2,12.133,24.475a6.486,6.486,0,0,0,3.625-.846S14.455,20.8,12.64,20.564Z" fill="var(--color-bg)" />
                                <path d="M22.036,13.407a7.041,7.041,0,0,0-1.111-3.88s-3,1.562-3.152,3.54a6.978,6.978,0,0,0,1.739,4.688S21.851,15.73,22.036,13.407Z" fill="var(--color-bg)" />
                                <path d="M29.048,26.433a7.624,7.624,0,0,0-.321-4.122c-1.052-2.448-4.326-3.784-4.326-3.784a7.973,7.973,0,0,0-.164,5.713A3.294,3.294,0,0,0,25.451,25.6,16.016,16.016,0,0,1,14.758,10.527v-1h-2v1A17.988,17.988,0,0,0,21.19,25.746a5.859,5.859,0,0,0-2.433-.151,8.093,8.093,0,0,0-4,2.352s2.6,2.883,4.846,2.49a7.889,7.889,0,0,0,4.627-3.153,17.885,17.885,0,0,0,6.527,1.243h1v-2h-1A16.094,16.094,0,0,1,29.048,26.433Z" fill="var(--color-bg)" />
                            </svg>
                        </a>
                    </div>
                </header>
                <!-- end sidebar (desktop) header -->

                <!-- start sidenav content -->
                <div class="position-relative z-index-1">
                    <nav class="sidenav-v4 padding-x-xs padding-bottom-xs js-sidenav-v4">
                        <ul>
                            <li class="sidenav-v4__item">
                                <a class="sidenav-v4__link js-sidenav-v4__link" href="<?=URLROOT . 'user/overview/'?>">
                                    <svg class="sidenav-v4__icon icon" viewBox="0 0 20 20">
                                        <g fill="currentColor">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12v7H4v-7"></path>
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 10l9-9 9 9"></path>
                                            <path d="M10 14a2 2 0 0 1 2 2v2H8v-2a2 2 0 0 1 2-2z"></path>
                                        </g>
                                    </svg>

                                    <span>Overview</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- mobile search -->
                    <div class="padding-x-xs padding-bottom-sm hide@md">
                        <div class="padding-x-sm">
                            <div class="search-input search-input--icon-left text-md">
                                <input class="search-input__input form-control" type="search" name="search-input" id="search-input" placeholder="Search..." aria-label="Search">
                                <button class="search-input__btn">
                                    <svg class="icon" viewBox="0 0 20 20">
                                        <title>Submit</title>
                                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <circle cx="8" cy="8" r="6" />
                                            <line x1="12.242" y1="12.242" x2="18" y2="18" />
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- end mobile search -->
                </div>
                <!-- end sidenav content -->

                <!-- start sidenav footer -->
                
                <!-- end sidenav footer -->
            </div>
        </aside>

        <main class="position-relative z-index-1 flex-grow min-height-100vh position-sticky@md top-0@md height-100vh@md overflow-auto@md sidebar-loaded:show">

            <!-- start desktop main header -->
            <header class="position-sticky top-0 z-index-header bg bg-opacity-80% border-bottom border-alpha backdrop-blur-10 display@md">
                <div class="height-60 flex items-center justify-between padding-x-component">
                    <div class="search-input search-input--icon-left position-relative width-100% max-width-xxxxs autocomplete js-autocomplete" data-autocomplete-dropdown-visible-class="autocomplete--results-visible">
                        


                        <div class="autocomplete__loader position-absolute top-0 right-0 padding-right-xxs height-100% flex items-center" aria-hidden="true">
                            <div class="circle-loader circle-loader--v1">
                                <div class="circle-loader__circle"></div>
                            </div>
                        </div>

                        <div class="autocomplete__results js-autocomplete__results">
                            <ul id="autocomplete1" class="autocomplete__list js-autocomplete__list">
                                <li class="autocomplete__item js-autocomplete__item is-hidden">
                                    <a data-autocomplete-url class="text-decoration-none color-contrast-higher block padding-y-xs padding-x-sm autocomplete__link">
                                        <span class="block" data-autocomplete-label></span>
                                        <span class="block text-xs color-contrast-medium margin-top-xxxxs" data-autocomplete-category></span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <p class="sr-only" aria-live="polite" aria-atomic="true"><span class="js-autocomplete__aria-results">0</span> results found.</p>
                    </div>

                    <button class="reset user-menu-control" aria-controls="user-menu" aria-label="Toggle user menu">
                        <figure class="user-menu-control__img-wrapper radius-50%">
                        </figure>

                        <div class="margin-x-xs user-menu__meta">
                            <p class="user-menu__meta-title text-sm line-height-1 padding-y-xxxxs font-semibold color-contrast-higher text-truncate">
                                <?= $_SESSION['user']->userUserName ?></p>
                            <?php if ($_SESSION['user']->userType == 'admin') : ?>
                                <p class="text-xs color-contrast-medium line-height-1 padding-bottom-xxxxs">Admin</p>
                            <?php else : ?>
                                <p class="text-xs color-contrast-medium line-height-1 padding-bottom-xxxxs">User</p>
                            <?php endif; ?>
                        </div>

                        <svg class="icon icon--xxs" aria-hidden="true" viewBox="0 0 12 12">
                            <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>

                    <menu id="user-menu" class="menu js-menu">
                        <li role="menuitem">
                            <a class="menu__content js-menu__content" href="<?= URLROOT . 'user/logout' ?>">Logout</a>
                        </li>
                    </menu>
                </div>
            </header>
            <!-- end desktop main header -->


            <div class="toast toast--hidden toast--top-right js-toast" role="alert" aria-live="assertive" aria-atomic="true" id="toast-5">
                
            </div>