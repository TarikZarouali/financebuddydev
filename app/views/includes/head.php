<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        document.getElementsByTagName("html")[0].className += " js";
    </script>
    <!-- favicon -->
    <link rel="icon" type="image/svg+xml" href="assets/img/favicon.svg">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= URLROOT ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= URLROOT ?>public/css/style.css">
    <script src="<?= URLROOT ?>assets/js/color-theme.js"></script>
    <title>Nettuno | CMS template by CodyHouse</title>
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
        <aside id="cms-main-sidebar" class="sidebar sidebar--static@md js-sidebar" data-static-class="position-relative z-index-2 bg-dark flex flex-column">
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
                                <a class="sidenav-v4__link js-sidenav-v4__link" href="<?= URLROOT ?>user/overview" aria-current="page">
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


                            <?php if (!empty($data['accounts'])) : ?>
                                <?php foreach ($data['accounts'] as $account) : ?>
                                    <li class="sidenav-v4__item">
                                        <a class="sidenav-v4__link js-sidenav-v4__link" href="<?= URLROOT . 'account/overview/' . $account->accountId ?>" aria-current="page">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.17157 20.8284C4.34315 22 6.22876 22 10 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14C22 12.8302 22 11.8419 21.965 11M20.8284 7.17157C19.6569 6 17.7712 6 14 6H10C6.22876 6 4.34315 6 3.17157 7.17157C2 8.34315 2 10.2288 2 14C2 15.1698 2 16.1581 2.03496 17" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M12 2C13.8856 2 14.8284 2 15.4142 2.58579C16 3.17157 16 4.11438 16 6M8.58579 2.58579C8 3.17157 8 4.11438 8 6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M12 17.3333C13.1046 17.3333 14 16.5871 14 15.6667C14 14.7462 13.1046 14 12 14C10.8954 14 10 13.2538 10 12.3333C10 11.4129 10.8954 10.6667 12 10.6667M12 17.3333C10.8954 17.3333 10 16.5871 10 15.6667M12 17.3333V18M12 10V10.6667M12 10.6667C13.1046 10.6667 14 11.4129 14 12.3333" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                            </svg>
                                            <span><?= $account->accountName ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <li class="sidenav-v4__separator" role="presentation"><span></span></li>
                            <li class="sidenav-v4__item">
                                <a class="sidenav-v4__link js-sidenav-v4__link" href="settings.html">
                                    <svg class="sidenav-v4__icon icon" viewBox="0 0 20 20">
                                        <g fill="currentColor">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2H6l-5 8 5 8h8l5-8-5-8z"></path>
                                            <circle cx="10" cy="10" r="3" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            </circle>
                                        </g>
                                    </svg>

                                    <span>Settings</span>

                                    <svg class="sidenav-v4__arrow-icon icon margin-left-auto" viewBox="0 0 20 20">
                                        <g class="icon__group" fill="none" stroke="currentColor" stroke-width="2px" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="3" y1="3" x2="17" y2="17" />
                                            <line x1="17" y1="3" x2="3" y2="17" />
                                        </g>
                                    </svg>
                                </a>

                                <ul class="sidenav-v4__sub-list">
                                    <li>
                                        <a class="sidenav-v4__sub-link" href="settings.html">Profile</a>
                                    </li>

                                    <li>
                                        <a class="sidenav-v4__sub-link" href="password.html">Password</a>
                                    </li>
                                </ul>
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
                <footer class="sidebar__footer border-top border-alpha padding-xs margin-top-auto position-sticky bottom-0 z-index-1">
                    <div class="padding-x-xs flex items-center justify-between">
                        <label class="" for="select-theme">Theme:</label>

                        <div class="select text-sm" style="--select-icon-right-margin: var(--space-xxs); --select-icon-size: 12px;">
                            <select class="select__input btn btn--subtle padding-x-xxs padding-y-xxxs" name="select-theme" id="select-theme">
                                <option value="light">Light</option>
                                <option value="dark">Dark</option>
                                <option value="floral">Floral</option>
                                <option value="woody">Woody</option>
                                <option value="water">Water</option>
                            </select>

                            <svg class="icon select__icon" aria-hidden="true" viewBox="0 0 12 12">
                                <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                </footer>
                <!-- end sidenav footer -->
            </div>
        </aside>

        <main class="position-relative z-index-1 flex-grow min-height-100vh position-sticky@md top-0@md height-100vh@md overflow-auto@md sidebar-loaded:show">
            <!-- start main content -->

            <!-- start desktop main header -->
            <header class="position-sticky top-0 z-index-header bg bg-opacity-80% border-bottom border-alpha backdrop-blur-10 display@md">
                <div class="height-60 flex items-center justify-between padding-x-component">
                    <div class="search-input search-input--icon-left position-relative width-100% max-width-xxxxs autocomplete js-autocomplete" data-autocomplete-dropdown-visible-class="autocomplete--results-visible">
                        <form action="search-results.html">
                            <input autocomplete="off" class="search-input__input form-control js-autocomplete__input js-search-input" type="search" name="search-input" id="search-input" placeholder="Search..." aria-label="Search">

                            <button class="search-input__btn">
                                <svg class="icon" viewBox="0 0 16 16">
                                    <title>Submit</title>
                                    <circle cx="6.5" cy="6.5" r="4.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="14" y1="14" x2="10" y2="10" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </button>
                        </form>

                        <span class="search-input__shortcut" aria-hidden="true">/</span>

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
                            <img class="user-menu-control__img" src="<?= URLROOT ?>assets/img/author-img-1.jpg" alt="User picture">
                        </figure>

                        <div class="margin-x-xs user-menu__meta">
                            <p class="user-menu__meta-title text-sm line-height-1 padding-y-xxxxs font-semibold color-contrast-higher text-truncate">
                                Emily Ewing</p>
                            <p class="text-xs color-contrast-medium line-height-1 padding-bottom-xxxxs">Admin</p>
                        </div>

                        <svg class="icon icon--xxs" aria-hidden="true" viewBox="0 0 12 12">
                            <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>

                    <menu id="user-menu" class="menu js-menu">
                        <li role="menuitem">
                            <a class="menu__content js-menu__content" href="settings.html">
                                <svg class="icon menu__icon" aria-hidden="true" viewBox="0 0 16 16">
                                    <g fill="currentColor">
                                        <path d="M15.135,6.784c-1.303-0.326-1.921-1.818-1.23-2.969c0.322-0.536,0.225-0.998-0.094-1.316l-0.31-0.31 c-0.318-0.318-0.78-0.415-1.316-0.094c-1.152,0.691-2.644,0.073-2.969-1.23C9.065,0.258,8.669,0,8.219,0H7.781 c-0.45,0-0.845,0.258-0.997,0.865c-0.326,1.303-1.818,1.921-2.969,1.23C3.279,1.773,2.816,1.87,2.498,2.188l-0.31,0.31 C1.87,2.816,1.773,3.279,2.095,3.815c0.691,1.152,0.073,2.644-1.23,2.969C0.26,6.935,0,7.33,0,7.781v0.438 c0,0.45,0.258,0.845,0.865,0.997c1.303,0.326,1.921,1.818,1.23,2.969c-0.322,0.536-0.225,0.998,0.094,1.316l0.31,0.31 c0.319,0.319,0.782,0.415,1.316,0.094c1.152-0.691,2.644-0.073,2.969,1.23C6.935,15.742,7.331,16,7.781,16h0.438 c0.45,0,0.845-0.258,0.997-0.865c0.326-1.303,1.818-1.921,2.969-1.23c0.535,0.321,0.997,0.225,1.316-0.094l0.31-0.31 c0.318-0.318,0.415-0.78,0.094-1.316c-0.691-1.152-0.073-2.644,1.23-2.969C15.742,9.065,16,8.669,16,8.219V7.781 C16,7.33,15.74,6.935,15.135,6.784z M8,11c-1.657,0-3-1.343-3-3s1.343-3,3-3s3,1.343,3,3S9.657,11,8,11z">
                                        </path>
                                    </g>
                                </svg>
                                <span>Settings</span>
                            </a>
                        </li>


                        <li class="menu__separator" role="separator"></li>

                        <li role="menuitem">
                            <a class="menu__content js-menu__content" aria-controls="dialog-logout-confirmation">Logout</a>
                        </li>
                    </menu>
                </div>
            </header>

            <!-- Logout ALERT -->
            <div class="dialog dialog--sticky js-dialog" id="dialog-logout-confirmation" data-animation="on">
                <div class="dialog__content max-width-xxs" role="alertdialog" aria-labelledby="dialog-title-1" aria-describedby="dialog-description">
                    <div class="text-component">
                        <br>
                        <br>
                        <h4 id="dialog-title-1">Are you sure you want to log out?
                        </h4>
                        <p id="dialog-description">This action cannot be undone.</p>
                    </div>
                    <footer class="margin-top-md">
                        <div class="flex justify-end gap-xs flex-wrap">
                            <button class="btn btn--subtle js-dialog__close">Cancel</button>
                            <a class="btn btn--accent" href="<?= URLROOT ?>user/logout/">Logout</a>
                        </div>
                    </footer>
                </div>
            </div>