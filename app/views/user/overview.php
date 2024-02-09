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

                        <a class="inline-flex color-contrast-high hover:reduce-opacity js-tooltip-trigger" title="Launch website" href="https://codyhouse.co/template/nettuno" target="_blank">
                            <svg class="icon icon--xs" viewBox="0 0 16 16">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M15,12v1.5A1.5,1.5,0,0,1,13.5,15H2.5A1.5,1.5,0,0,1,1,13.5V2.5A1.5,1.5,0,0,1,2.5,1H4" />
                                    <polyline points="8 1 15 1 15 8" />
                                    <line x1="15" y1="1" x2="7" y2="9" />
                                </g>
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
                                <a class="sidenav-v4__link js-sidenav-v4__link" href="index.html" aria-current="page">
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

                            <li class="sidenav-v4__item">
                                <a class="sidenav-v4__link js-sidenav-v4__link" href="notifications.html">
                                    <svg class="sidenav-v4__icon icon" viewBox="0 0 20 20">
                                        <g fill="currentColor">
                                            <path d="M10 20a2 2 0 0 1-2-2h4a2 2 0 0 1-2 2z"></path>
                                            <path d="M19 15a3 3 0 0 1-3-3V7a6 6 0 0 0-6-6 6 6 0 0 0-6 6v5a3 3 0 0 1-3 3h18z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                        </g>
                                    </svg>

                                    <span>Notifications</span>

                                    <span class="sidenav-v4__notification-marker">8 <i class="sr-only">notifications</i></span>
                                </a>
                            </li>

                            <li class="sidenav-v4__item">
                                <a class="sidenav-v4__link js-sidenav-v4__link" href="articles.html">
                                    <svg class="sidenav-v4__icon icon" viewBox="0 0 20 20">
                                        <g fill="currentColor">
                                            <path d="M3 1h10l5 5v12a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 1l5 5h-5V1z"></path>
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6h2"></path>
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 10h8"></path>
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 14h8"></path>
                                        </g>
                                    </svg>

                                    <span>Articles</span>

                                    <svg class="sidenav-v4__arrow-icon icon margin-left-auto" viewBox="0 0 20 20">
                                        <g class="icon__group" fill="none" stroke="currentColor" stroke-width="2px" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="3" y1="3" x2="17" y2="17" />
                                            <line x1="17" y1="3" x2="3" y2="17" />
                                        </g>
                                    </svg>
                                </a>

                                <ul class="sidenav-v4__sub-list">
                                    <li>
                                        <a class="sidenav-v4__sub-link" href="articles.html">All Articles</a>
                                    </li>

                                    <li>
                                        <a class="sidenav-v4__sub-link" href="new-article.html">Add New</a>
                                    </li>

                                    <li>
                                        <a class="sidenav-v4__sub-link" href="categories.html">Categories</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidenav-v4__item">
                                <a class="sidenav-v4__link js-sidenav-v4__link" href="reports.html">
                                    <svg class="sidenav-v4__icon icon" viewBox="0 0 20 20">
                                        <g fill="currentColor">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.231 11L7 5l6 5 6-8"></path>
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 18l1.385-3"></path>
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 11h4l8 6 6-5"></path>
                                        </g>
                                    </svg>

                                    <span>Reports</span>
                                </a>
                            </li>

                            <li class="sidenav-v4__separator" role="presentation"><span></span></li>

                            <li class="sidenav-v4__item">
                                <a class="sidenav-v4__link js-sidenav-v4__link" href="assets.html">
                                    <svg class="sidenav-v4__icon icon" viewBox="0 0 20 20">
                                        <g fill="currentColor">
                                            <rect x="2" y="2" width="16" height="16" rx="2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 14l6-6 2 6H6z"></path>
                                            <circle cx="6.5" cy="6.5" r="1.5"></circle>
                                        </g>
                                    </svg>

                                    <span>Assets</span>

                                    <svg class="sidenav-v4__arrow-icon icon margin-left-auto" viewBox="0 0 20 20">
                                        <g class="icon__group" fill="none" stroke="currentColor" stroke-width="2px" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="3" y1="3" x2="17" y2="17" />
                                            <line x1="17" y1="3" x2="3" y2="17" />
                                        </g>
                                    </svg>
                                </a>

                                <ul class="sidenav-v4__sub-list">
                                    <li>
                                        <a class="sidenav-v4__sub-link" href="assets.html">All Assets</a>
                                    </li>

                                    <li>
                                        <a class="sidenav-v4__sub-link" href="new-asset.html">Upload</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidenav-v4__item">
                                <a class="sidenav-v4__link js-sidenav-v4__link" href="users.html">
                                    <svg class="sidenav-v4__icon icon" viewBox="0 0 20 20">
                                        <g fill="currentColor">
                                            <circle cx="10" cy="4" r="3" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                                            <path d="M10 11a8 8 0 0 0-7.562 5.383A2 2 0 0 0 4.347 19h11.306a2 2 0 0 0 1.909-2.617A8 8 0 0 0 10 11z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                        </g>
                                    </svg>

                                    <span>Users</span>

                                    <svg class="sidenav-v4__arrow-icon icon margin-left-auto" viewBox="0 0 20 20">
                                        <g class="icon__group" fill="none" stroke="currentColor" stroke-width="2px" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="3" y1="3" x2="17" y2="17" />
                                            <line x1="17" y1="3" x2="3" y2="17" />
                                        </g>
                                    </svg>
                                </a>

                                <ul class="sidenav-v4__sub-list">
                                    <li>
                                        <a class="sidenav-v4__sub-link" href="users.html">All Users</a>
                                    </li>

                                    <li>
                                        <a class="sidenav-v4__sub-link" href="new-user.html">Add New</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidenav-v4__item">
                                <a class="sidenav-v4__link js-sidenav-v4__link" href="settings.html">
                                    <svg class="sidenav-v4__icon icon" viewBox="0 0 20 20">
                                        <g fill="currentColor">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2H6l-5 8 5 8h8l5-8-5-8z"></path>
                                            <circle cx="10" cy="10" r="3" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
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
                            <p class="user-menu__meta-title text-sm line-height-1 padding-y-xxxxs font-semibold color-contrast-higher text-truncate">Emily Ewing</p>
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
                                        <path d="M15.135,6.784c-1.303-0.326-1.921-1.818-1.23-2.969c0.322-0.536,0.225-0.998-0.094-1.316l-0.31-0.31 c-0.318-0.318-0.78-0.415-1.316-0.094c-1.152,0.691-2.644,0.073-2.969-1.23C9.065,0.258,8.669,0,8.219,0H7.781 c-0.45,0-0.845,0.258-0.997,0.865c-0.326,1.303-1.818,1.921-2.969,1.23C3.279,1.773,2.816,1.87,2.498,2.188l-0.31,0.31 C1.87,2.816,1.773,3.279,2.095,3.815c0.691,1.152,0.073,2.644-1.23,2.969C0.26,6.935,0,7.33,0,7.781v0.438 c0,0.45,0.258,0.845,0.865,0.997c1.303,0.326,1.921,1.818,1.23,2.969c-0.322,0.536-0.225,0.998,0.094,1.316l0.31,0.31 c0.319,0.319,0.782,0.415,1.316,0.094c1.152-0.691,2.644-0.073,2.969,1.23C6.935,15.742,7.331,16,7.781,16h0.438 c0.45,0,0.845-0.258,0.997-0.865c0.326-1.303,1.818-1.921,2.969-1.23c0.535,0.321,0.997,0.225,1.316-0.094l0.31-0.31 c0.318-0.318,0.415-0.78,0.094-1.316c-0.691-1.152-0.073-2.644,1.23-2.969C15.742,9.065,16,8.669,16,8.219V7.781 C16,7.33,15.74,6.935,15.135,6.784z M8,11c-1.657,0-3-1.343-3-3s1.343-3,3-3s3,1.343,3,3S9.657,11,8,11z"></path>
                                    </g>
                                </svg>
                                <span>Settings</span>
                            </a>
                        </li>


                        <li class="menu__separator" role="separator"></li>

                        <li role="menuitem">
                            <a class="menu__content js-menu__content" href="<?= URLROOT ?>user/logout">Logout</a>
                        </li>
                    </menu>
                </div>
            </header>
            <!-- end desktop main header -->

            <!-- start container -->
            <div class="container max-width-lg padding-y-lg">
                <ul class="grid gap-lg">




                    <!-- articles -->
                    <!-- <li>
            <header class="margin-bottom-sm">
              <div class="flex flex-column gap-xxs flex-row@sm justify-between@sm items-baseline@sm">
                <h2 class="text-lg">Articles</h2>
                <p><a href="new-article.html">+ New</a> <span class="color-contrast-lower">|</span> <a href="articles.html">All articles →</a></p>
              </div>
            </header>

            <div class="card padding-x-md padding-bottom-md padding-top-sm">
              <nav class="s-tabs">
                <ul class="s-tabs__list">
                  <li><a class="s-tabs__link s-tabs__link--current" href="#0">All (21)</a></li>
                  <li><a class="s-tabs__link" href="#0">Published (19)</a></li>
                  <li><a class="s-tabs__link" href="#0">Draft (2)</a></li>
                </ul>
              </nav>
            
              <div class="padding-y-xs border-bottom" data-table-controls="table-id">
                <ul class="flex flex-column gap-xxs flex-row@sm items-center@sm">
                  <li class="padding-right-sm is-hidden js-int-table-actions__items-selected">
                    <div class="flex items-center gap-xxxs">
                      <div class="select" style="--select-icon-size: 12px;">
                        <select class="select__input btn btn--subtle" name="select-bulk-action" id="select-bulk-action" aria-label="Bulk actions">
                          <option value="0">Bulk actions</option>
                          <option value="1">Action 1</option>
                          <option value="2">Action 2</option>
                          <option value="3">Action 3</option>
                        </select>
            
                        <svg class="icon select__icon" aria-hidden="true" viewBox="0 0 12 12">
                          <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                      </div>
            
                      <button class="btn btn--primary">Apply</button>
                    </div>
                  </li>
            
                  <li class="">
                    <div class="flex flex-wrap items-center gap-xxxs">
                      <div class="select" style="--select-icon-size: 12px;">
                        <select class="select__input btn btn--subtle" name="select-author" id="select-author">
                          <option value="0">All authors</option>
                          <option value="1">Author 1</option>
                          <option value="2">Author 2</option>
                        </select>
            
                        <svg class="icon select__icon" aria-hidden="true" viewBox="0 0 12 12">
                          <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                      </div>
            
                      <div class="select" style="--select-icon-size: 12px;">
                        <select class="select__input btn btn--subtle" name="select-category" id="select-category">
                          <option value="0">All categories</option>
                          <option value="1">Category 1</option>
                          <option value="2">Category 2</option>
                        </select>
            
                        <svg class="icon select__icon" aria-hidden="true" viewBox="0 0 12 12">
                          <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                      </div>
            
                      <button class="btn btn--primary">Filter</button>
                    </div>
                  </li>
            
                  <li class="margin-left-auto@sm">
                    <form class="expandable-search js-expandable-search" style="--expandable-search-icon-size: 1.25em; --expandable-search-size-expanded: 12em;">
                      <label class="sr-only" for="expandable-search">Filter articles</label>
            
                      <input class="reset expandable-search__input js-expandable-search__input" type="search" name="expandable-search" id="expandable-search" placeholder="Search articles...">
            
                      <button class="reset expandable-search__btn">
                        <svg class="icon" viewBox="0 0 20 20">
                          <title>Search</title>
                          <g fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2">
                            <circle cx="8" cy="8" r="6" />
                            <line x1="12.243" y1="12.243" x2="18" y2="18" />
                          </g>
                        </svg>
                      </button>
                    </form>
                  </li>
                </ul>
              </div>
            
              <div id="table-id" class="int-table js-int-table">
                <div class="int-table__inner">
                  <table class="int-table__table" aria-label="Interactive table example">
                    <thead class="int-table__header js-int-table__header">
                      <tr class="int-table__row">
                        <td class="int-table__cell">
                          <div class="custom-checkbox int-table__checkbox">
                            <input class="custom-checkbox__input js-int-table__select-all" type="checkbox" aria-label="Select all rows" />
                            <div class="custom-checkbox__control" aria-hidden="true"></div>
                          </div>
                        </td>
            
                        <th class="int-table__cell int-table__cell--th int-table__cell--sort js-int-table__cell--sort">
                          <div class="flex items-center">
                            <span>Title</span>
            
                            <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12">
                              <polygon class="arrow-up" points="6 0 10 5 2 5 6 0" />
                              <polygon class="arrow-down" points="6 12 2 7 10 7 6 12" />
                            </svg>
                          </div>
            
                          <ul class="sr-only js-int-table__sort-list">
                            <li>
                              <input type="radio" name="sorting-title" id="sorting-title-none" value="none" checked>
                              <label for="sorting-title-none">No sorting</label>
                            </li>
            
                            <li>
                              <input type="radio" name="sorting-title" id="sorting-title-asc" value="asc">
                              <label for="sorting-title-asc">Sort in ascending order</label>
                            </li>
            
                            <li>
                              <input type="radio" name="sorting-title" id="sorting-title-des" value="desc">
                              <label for="sorting-title-des">Sort in descending order</label>
                            </li>
                          </ul>
                        </th>
            
                        <th class="int-table__cell int-table__cell--th text-left">
                          Author
                        </th>
            
                        <th class="int-table__cell int-table__cell--th text-left">
                          Category
                        </th>
            
                        <th class="int-table__cell int-table__cell--th text-left">
                          Status
                        </th>
            
                        <th class="int-table__cell int-table__cell--th int-table__cell--sort js-int-table__cell--sort" data-date-format="dd-mm-yyyy">
                          <div class="flex items-center justify-end">
                            <span>Date</span>
            
                            <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12">
                              <polygon class="arrow-up" points="6 0 10 5 2 5 6 0" />
                              <polygon class="arrow-down" points="6 12 2 7 10 7 6 12" />
                            </svg>
                          </div>
            
                          <ul class="sr-only js-int-table__sort-list">
                            <li>
                              <input type="radio" name="sorting-date" id="sorting-date-none" value="none" checked>
                              <label for="sorting-date-none">No sorting</label>
                            </li>
            
                            <li>
                              <input type="radio" name="sorting-date" id="sorting-date-asc" value="asc">
                              <label for="sorting-date-asc">Sort in ascending order</label>
                            </li>
            
                            <li>
                              <input type="radio" name="sorting-date" id="sorting-date-des" value="desc">
                              <label for="sorting-date-des">Sort in descending order</label>
                            </li>
                          </ul>
                        </th>
                      </tr>
                    </thead>
            
                    <tbody class="int-table__body js-int-table__body">
                      <tr class="int-table__row">
                        <th class="int-table__cell" scope="row">
                          <div class="custom-checkbox int-table__checkbox">
                            <input class="custom-checkbox__input js-int-table__select-row" type="checkbox" aria-label="Select this row" />
                            <div class="custom-checkbox__control" aria-hidden="true"></div>
                          </div>
                        </th>
                        <td class="int-table__cell max-width-xxxxs"><a href="article.html">Lorem ipsum dolor sit</a></td>
                        <td class="int-table__cell"><a href="author.html">Bryony Mcmillan</a></td>
                        <td class="int-table__cell"><a href="category.html">Category 1</a>, <a href="category.html">Category 2</a></td>
                        <td class="int-table__cell">
                          <span class="inline-block bg-success bg-opacity-20% radius-full padding-y-xxxs padding-x-xs color-success-darker text-xs ws-nowrap">Published</span>
                        </td>
                        <td class="int-table__cell text-right">18/03/2022</td>
                      </tr>
            
                      <tr class="int-table__row">
                        <th class="int-table__cell" scope="row">
                          <div class="custom-checkbox int-table__checkbox">
                            <input class="custom-checkbox__input js-int-table__select-row" type="checkbox" aria-label="Select this row" />
                            <div class="custom-checkbox__control" aria-hidden="true"></div>
                          </div>
                        </th>
                        <td class="int-table__cell max-width-xxxxs"><a href="article.html">Lorem ipsum dolor sit amet consectetur</a></td>
                        <td class="int-table__cell"><a href="author.html">James Powell</a></td>
                        <td class="int-table__cell"><a href="category.html">Category 1</a></td>
                        <td class="int-table__cell">
                          <span class="inline-block bg-success bg-opacity-20% radius-full padding-y-xxxs padding-x-xs color-success-darker text-xs ws-nowrap">Published</span>
                        </td>
                        <td class="int-table__cell text-right">12/03/2022</td>
                      </tr>
            
                      <tr class="int-table__row">
                        <th class="int-table__cell" scope="row">
                          <div class="custom-checkbox int-table__checkbox">
                            <input class="custom-checkbox__input js-int-table__select-row" type="checkbox" aria-label="Select this row" />
                            <div class="custom-checkbox__control" aria-hidden="true"></div>
                          </div>
                        </th>
                        <td class="int-table__cell max-width-xxxxs"><a href="article.html">Lorem ipsum dolor</a></td>
                        <td class="int-table__cell"><a href="author.html">James Powell</a></td>
                        <td class="int-table__cell"><a href="category.html">Category 3</a></td>
                        <td class="int-table__cell">
                          <span class="inline-block bg-success bg-opacity-20% radius-full padding-y-xxxs padding-x-xs color-success-darker text-xs ws-nowrap">Published</span>
                        </td>
                        <td class="int-table__cell text-right">05/03/2022</td>
                      </tr>
            
                      <tr class="int-table__row">
                        <th class="int-table__cell" scope="row">
                          <div class="custom-checkbox int-table__checkbox">
                            <input class="custom-checkbox__input js-int-table__select-row" type="checkbox" aria-label="Select this row" />
                            <div class="custom-checkbox__control" aria-hidden="true"></div>
                          </div>
                        </th>
                        <td class="int-table__cell max-width-xxxxs"><a href="article.html">Lorem ipsum dolor sit amet consectetur</a></td>
                        <td class="int-table__cell"><a href="author.html">Bryony Mcmillan</a></td>
                        <td class="int-table__cell"><a href="category.html">Category 2</a></td>
                        <td class="int-table__cell">
                          <span class="inline-block bg-warning bg-opacity-20% radius-full padding-y-xxxs padding-x-xs color-warning-darker text-xs ws-nowrap">Draft</span>
                        </td>
                        <td class="int-table__cell text-right">27/02/2022</td>
                      </tr>
            
                      <tr class="int-table__row">
                        <th class="int-table__cell" scope="row">
                          <div class="custom-checkbox int-table__checkbox">
                            <input class="custom-checkbox__input js-int-table__select-row" type="checkbox" aria-label="Select this row" />
                            <div class="custom-checkbox__control" aria-hidden="true"></div>
                          </div>
                        </th>
                        <td class="int-table__cell max-width-xxxxs"><a href="article.html">Lorem ipsum dolor sit</a></td>
                        <td class="int-table__cell"><a href="author.html">Bryony Mcmillan</a></td>
                        <td class="int-table__cell"><a href="category.html">Category 1</a>, <a href="category.html">Category 2</a></td>
                        <td class="int-table__cell">
                          <span class="inline-block bg-success bg-opacity-20% radius-full padding-y-xxxs padding-x-xs color-success-darker text-xs ws-nowrap">Published</span>
                        </td>
                        <td class="int-table__cell text-right">15/02/2022</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            
              <div class="flex items-center justify-between padding-top-sm">
                <p>21 results</p>
            
                <nav class="pagination" aria-label="Pagination">
                  <ul class="pagination__list flex flex-wrap gap-xxxs">
                    <li>
                      <a href="#0" class="pagination__item">
                        <svg class="icon" viewBox="0 0 16 16">
                          <title>Go to previous page</title>
                          <g stroke-width="2" stroke="currentColor">
                            <polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="9.5,3.5 5,8 9.5,12.5 "></polyline>
                          </g>
                        </svg>
                      </a>
                    </li>
            
                    <li>
                      <span class="pagination__jumper flex items-center">
                        <input aria-label="Page number" class="form-control" type="text" id="pageNumber" name="pageNumber" value="1">
                        <em>of 3</em>
                      </span>
                    </li>
            
                    <li>
                      <a href="#0" class="pagination__item">
                        <svg class="icon" viewBox="0 0 16 16">
                          <title>Go to next page</title>
                          <g stroke-width="2" stroke="currentColor">
                            <polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="6.5,3.5 11,8 6.5,12.5 "></polyline>
                          </g>
                        </svg>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </li> -->
                    <!-- end articles -->

                    <!-- connected apps -->
                    <li>
                        <header class="margin-bottom-sm">
                            <h2 class="text-lg">All accounts</h2>
                        </header>

                        <button class="btn btn--primary" style="margin-bottom: 2rem; " aria-controls="modal-form">Create new account</button>


                        <ul class="grid gap-xs">
                            <?php if (!empty($data['account'])) : ?>
                                <?php foreach ($data['account'] as $account) : ?>
                                    <li class="col-6@sm col-4@lg">
                                        <div class="card switch-card height-100% padding-md js-switch-card">
                                            <div class="flex flex-wrap gap-xxs items-center justify-between">
                                                <figure class="switch-card__figure radius-50%">
                                                    <img class="switch-card__img" src="<?= URLROOT ?>assets/img/switch-card-img-3.png" alt="App logo">
                                                </figure>

                                                <div class="switch js-switch-card__switch">
                                                    <a href="#" aria-controls="dialog-delete-user-confirmation" class="btn btn--accent">Delete</a>
                                                </div>
                                            </div>

                                            <div class="text-component margin-top-md">
                                                <h3 class="text-md"><?= $account->accountName ?></h3>
                                                <p class="color-contrast-medium"><?= $account->accountType ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>You have no accounts. Start making your first account with <a class="btn btn--primary" href="URLROOT/account/create">Create Account</a></p>
                            <?php endif; ?>


                        </ul>
                    </li>
                    <!-- connected apps -->

                    <li>
                        <ul class="grid gap-lg gap-md@lg">
                            <!-- quick links -->
                            <li class="col-6@lg">
                                <header class="margin-bottom-sm">
                                    <h2 class="text-lg">Quick Links</h2>
                                </header>

                                <div class="card padding-md">
                                    <ul class="list-v3">
                                        <li class="list-v3__item flex gap-sm items-center@sm">
                                            <figure class="list-v3__figure color-primary" aria-hidden="true">
                                                <svg class="list-v3__icon icon" viewBox="0 0 24 24">
                                                    <g>
                                                        <path d="M5.576,10.958a1,1,0,0,0,.673-1.244,6,6,0,1,1,11.5,0,1,1,0,0,0,.673,1.244A1.021,1.021,0,0,0,18.71,11a1,1,0,0,0,.958-.714,8,8,0,1,0-15.336,0A1,1,0,0,0,5.576,10.958Z" opacity="0.5"></path>
                                                        <circle cx="12" cy="8" r="4" opacity="0.5"></circle>
                                                        <path d="M13,18.184V15a1,1,0,0,0-2,0v3.184a3,3,0,1,0,2,0Z"></path>
                                                        <path d="M21,18.184V16a1,1,0,0,0-.445-.832l-3-2a1,1,0,0,0-1.11,1.664L19,16.535v1.649a3,3,0,1,0,2,0Z"></path>
                                                        <path d="M6.445,13.168l-3,2A1,1,0,0,0,3,16v2.184a3,3,0,1,0,2,0V16.535l2.555-1.7a1,1,0,1,0-1.11-1.664Z"></path>
                                                    </g>
                                                </svg>
                                            </figure>

                                            <div class="text-component text-space-y-sm">
                                                <h3 class="text-md"><a class="color-contrast-higher list-v3__link" href="#0">Quick Link One</a></h3>
                                                <p class="color-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                                            </div>
                                        </li>

                                        <li class="list-v3__item flex gap-sm items-center@sm">
                                            <figure class="list-v3__figure color-accent" aria-hidden="true">
                                                <svg class="list-v3__icon icon" viewBox="0 0 24 24">
                                                    <g>
                                                        <circle cx="18.5" cy="8.5" r="5.5" opacity="0.5"></circle>
                                                        <rect x="5" y="14" width="9" height="9" rx="1"></rect>
                                                        <path d="M10.932,9.752a.5.5,0,0,0,0-.5l-4.5-8a.52.52,0,0,0-.872,0l-4.5,8A.5.5,0,0,0,1.5,10h9A.5.5,0,0,0,10.932,9.752Z"></path>
                                                    </g>
                                                </svg>
                                            </figure>

                                            <div class="text-component text-space-y-sm">
                                                <h3 class="text-md"><a class="color-contrast-higher list-v3__link" href="#0">Quick Link Two</a></h3>
                                                <p class="color-contrast-medium">Lorem ipsum dolor sit amet consectetur</p>
                                            </div>
                                        </li>

                                        <li class="list-v3__item flex gap-sm items-center@sm">
                                            <figure class="list-v3__figure" aria-hidden="true">
                                                <svg class="list-v3__icon icon" viewBox="0 0 24 24">
                                                    <g>
                                                        <path d="M23,15h-3v-2h2V2H2v11h3v2H1c-0.553,0-1-0.448-1-1V1c0-0.552,0.447-1,1-1h22 c0.553,0,1,0.448,1,1v13C24,14.552,23.553,15,23,15z" opacity="0.5"></path>
                                                        <path d="M20.561,19.439l-6.211-6.211L20,10L5,6l4,15l3.229-5.65l6.211,6.211c0.586,0.586,1.535,0.586,2.121,0 C21.146,20.975,21.146,20.025,20.561,19.439z"></path>
                                                    </g>
                                                </svg>
                                            </figure>

                                            <div class="text-component text-space-y-sm">
                                                <h3 class="text-md"><a class="color-contrast-higher list-v3__link" href="#0">Quick Link Three</a></h3>
                                                <p class="color-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- end quick links -->

                            <!-- users -->
                            <li class="col-6@lg">
                                <header class="margin-bottom-sm">
                                    <!-- <h2 class="text-lg">Users</h2> -->
                                    <div class="flex flex-column gap-xxs flex-row@sm justify-between@sm items-baseline@sm">
                                        <h2 class="text-lg">Users</h2>
                                        <p><a href="users.html">All users →</a></p>
                                    </div>
                                </header>

                                <div class="card padding-md">
                                    <ul class="list-v3">
                                        <li class="list-v3__item flex gap-sm items-center@sm">
                                            <figure class="list-v3__figure">
                                                <img class="block width-100% height-100% object-cover" src="assets/img/list-v3-img-1.jpg" alt="Image description">
                                            </figure>

                                            <div class="text-component text-space-y-sm">
                                                <h3 class="text-md"><a class="color-contrast-higher list-v3__link" href="author.html">Olivia Saturday</a></h3>
                                                <p class="color-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                                            </div>
                                        </li>

                                        <li class="list-v3__item flex gap-sm items-center@sm">
                                            <figure class="list-v3__figure">
                                                <img class="block width-100% height-100% object-cover" src="assets/img/list-v3-img-2.jpg" alt="Image description">
                                            </figure>

                                            <div class="text-component text-space-y-sm">
                                                <h3 class="text-md"><a class="color-contrast-higher list-v3__link" href="author.html">David Smith</a></h3>
                                                <p class="color-contrast-medium">Lorem ipsum dolor sit amet consectetur</p>
                                            </div>
                                        </li>

                                        <li class="list-v3__item flex gap-sm items-center@sm">
                                            <figure class="list-v3__figure">
                                                <img class="block width-100% height-100% object-cover" src="assets/img/list-v3-img-3.jpg" alt="Image description">
                                            </figure>

                                            <div class="text-component text-space-y-sm">
                                                <h3 class="text-md"><a class="color-contrast-higher list-v3__link" href="author.html">Marta Rossi</a></h3>
                                                <p class="color-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- end users -->
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- end container -->

            <!-- end main content -->
        </main>
    </div>

    <!-- DELETE ALERT -->
    <div class="dialog dialog--sticky js-dialog" id="dialog-delete-user-confirmation" data-animation="on">
        <div class="dialog__content max-width-xxs" role="alertdialog" aria-labelledby="dialog-title-1" aria-describedby="dialog-description">
            <div class="text-component">
                <br>
                <br>
                <h4 id="dialog-title-1">Are you sure you want to delete this account?
                </h4>
                <p id="dialog-description">This action cannot be undone.</p>
            </div>
            <footer class="margin-top-md">
                <div class="flex justify-end gap-xs flex-wrap">
                    <button class="btn btn--subtle js-dialog__close">Cancel</button>
                    <a class="btn btn--accent" href="<?= URLROOT; ?>account/delete/<?= $account->accountId ?>">Delete</a>
                </div>
            </footer>
        </div>
    </div>

    <!-- MODAL FORM -->

    <div class="modal modal--animate-scale flex flex-center bg-black bg-opacity-90% padding-md js-modal" id="modal-form">
        <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto padding-md bg radius-md inner-glow shadow-md" role="alertdialog" aria-labelledby="modal-form-title" aria-describedby="modal-form-description">
            <div class="text-component margin-bottom-md">
                <h3 id="modal-form-title">Create new account</h3>
            </div>

            <form method="POST" action="<?= URLROOT ?>account/create" class="margin-bottom-sm">
                <div class="grid gap-sm">
                    <label class="form-label margin-bottom-xxs" for="modal-account-accountName">Account Name</label>
                    <input class="form-control width-100% margin-bottom-xxs" type="text" name="accountName" id="modal-account-accountName">
                </div>

                <div class="grid gap-sm">
                    <label class="form-label margin-bottom-xxs" for="modal-account-accountBalance">Account Balance</label>
                    <input class="form-control width-100% margin-bottom-xxs" type="text" name="accountBalance" id="modal-account-accountBalance">
                </div>

                <div class="grid gap-sm">
                    <label class="form-label margin-bottom-xxs" for="modal-customer-accountType">Account Type</label>
                    <select class="form-control width-100 margin-bottom-xxs" name="accountType" id="modal-customer-accountType">
                        <option value="personal">Personal</option>
                        <option value="business">Coupons</option>
                    </select>
                </div>

                <div class="grid gap-sm">
                    <label class="form-label margin-bottom-xxs" for="modal-account-accountGoal">Goal</label>
                    <input class="form-control width-100% margin-bottom-xxs" type="text" name="accountGoal" id="modal-account-accountGoal">
                </div>

                <div class="grid gap-sm">
                    <label class="form-label margin-bottom-xxs" for="modal-account-accountDescription">Note</label>
                    <input class="form-control width-100% margin-bottom-xxs" type="text" name="accountDescription" id="modal-account-accountDescription">
                </div>

                <button class="btn btn--primary" style="margin-top:2rem;">Submit</button>
            </form>


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

    <script src="<?= URLROOT ?>assets/js/scripts.js"></script>
</body>

</html>