<?php require APPROOT . '/views/includes/head.php'; ?>
<!-- start container -->
<div class="container max-width-lg padding-y-lg">
    <ul class="grid gap-lg">
        <!-- connected apps -->
        <li>
            <header class="margin-bottom-sm">
                <h2 class="text-lg">All accounts</h2>
            </header>

            <button class="btn btn--primary" style="margin-bottom: 2rem; " aria-controls="modal-form">Create new
                account</button>


            <ul class="grid gap-xs">
                <?php if (!empty($data['account'])) : ?>
                <?php foreach ($data['account'] as $account) : ?>
                <li class="col-6@sm col-4@lg">
                    <div class="card switch-card height-100% padding-md js-switch-card">
                        <div class="flex flex-wrap gap-xxs items-center justify-between">
                            <figure class="switch-card__figure radius-50%">
                                <img class="switch-card__img" src="<?= URLROOT ?>assets/img/switch-card-img-3.png"
                                    alt="App logo">
                            </figure>

                            <div>
                                <a href="<?= URLROOT ?>account/update/<?= $account->accountId ?>"
                                    class="btn btn--primary">Edit</a>
                                <a href="#" aria-controls="dialog-delete-user-confirmation"
                                    class="btn btn--accent">Delete</a>
                            </div>

                        </div>

                        <div class="text-component margin-top-md">
                            <h3 class="text-md"><a
                                    href="<?= URLROOT ?>account/overview/<?= $account->accountId ?>"><?= $account->accountName ?></a>
                            </h3>
                            <p class="color-contrast-medium"><?= $account->accountType ?></p>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
                <?php else : ?>
                <p>You have no accounts. Start making your first account with <a class="btn btn--primary"
                        href="URLROOT/account/create">Create Account</a></p>
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
                                            <path
                                                d="M5.576,10.958a1,1,0,0,0,.673-1.244,6,6,0,1,1,11.5,0,1,1,0,0,0,.673,1.244A1.021,1.021,0,0,0,18.71,11a1,1,0,0,0,.958-.714,8,8,0,1,0-15.336,0A1,1,0,0,0,5.576,10.958Z"
                                                opacity="0.5"></path>
                                            <circle cx="12" cy="8" r="4" opacity="0.5"></circle>
                                            <path d="M13,18.184V15a1,1,0,0,0-2,0v3.184a3,3,0,1,0,2,0Z"></path>
                                            <path
                                                d="M21,18.184V16a1,1,0,0,0-.445-.832l-3-2a1,1,0,0,0-1.11,1.664L19,16.535v1.649a3,3,0,1,0,2,0Z">
                                            </path>
                                            <path
                                                d="M6.445,13.168l-3,2A1,1,0,0,0,3,16v2.184a3,3,0,1,0,2,0V16.535l2.555-1.7a1,1,0,1,0-1.11-1.664Z">
                                            </path>
                                        </g>
                                    </svg>
                                </figure>

                                <div class="text-component text-space-y-sm">
                                    <h3 class="text-md"><a class="color-contrast-higher list-v3__link" href="#0">Quick
                                            Link One</a></h3>
                                    <p class="color-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit</p>
                                </div>
                            </li>

                            <li class="list-v3__item flex gap-sm items-center@sm">
                                <figure class="list-v3__figure color-accent" aria-hidden="true">
                                    <svg class="list-v3__icon icon" viewBox="0 0 24 24">
                                        <g>
                                            <circle cx="18.5" cy="8.5" r="5.5" opacity="0.5"></circle>
                                            <rect x="5" y="14" width="9" height="9" rx="1"></rect>
                                            <path
                                                d="M10.932,9.752a.5.5,0,0,0,0-.5l-4.5-8a.52.52,0,0,0-.872,0l-4.5,8A.5.5,0,0,0,1.5,10h9A.5.5,0,0,0,10.932,9.752Z">
                                            </path>
                                        </g>
                                    </svg>
                                </figure>

                                <div class="text-component text-space-y-sm">
                                    <h3 class="text-md"><a class="color-contrast-higher list-v3__link" href="#0">Quick
                                            Link Two</a></h3>
                                    <p class="color-contrast-medium">Lorem ipsum dolor sit amet consectetur</p>
                                </div>
                            </li>

                            <li class="list-v3__item flex gap-sm items-center@sm">
                                <figure class="list-v3__figure" aria-hidden="true">
                                    <svg class="list-v3__icon icon" viewBox="0 0 24 24">
                                        <g>
                                            <path
                                                d="M23,15h-3v-2h2V2H2v11h3v2H1c-0.553,0-1-0.448-1-1V1c0-0.552,0.447-1,1-1h22 c0.553,0,1,0.448,1,1v13C24,14.552,23.553,15,23,15z"
                                                opacity="0.5"></path>
                                            <path
                                                d="M20.561,19.439l-6.211-6.211L20,10L5,6l4,15l3.229-5.65l6.211,6.211c0.586,0.586,1.535,0.586,2.121,0 C21.146,20.975,21.146,20.025,20.561,19.439z">
                                            </path>
                                        </g>
                                    </svg>
                                </figure>

                                <div class="text-component text-space-y-sm">
                                    <h3 class="text-md"><a class="color-contrast-higher list-v3__link" href="#0">Quick
                                            Link Three</a></h3>
                                    <p class="color-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit</p>
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
                                    <img class="block width-100% height-100% object-cover"
                                        src="assets/img/list-v3-img-1.jpg" alt="Image description">
                                </figure>

                                <div class="text-component text-space-y-sm">
                                    <h3 class="text-md"><a class="color-contrast-higher list-v3__link"
                                            href="author.html">Olivia Saturday</a></h3>
                                    <p class="color-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit</p>
                                </div>
                            </li>

                            <li class="list-v3__item flex gap-sm items-center@sm">
                                <figure class="list-v3__figure">
                                    <img class="block width-100% height-100% object-cover"
                                        src="assets/img/list-v3-img-2.jpg" alt="Image description">
                                </figure>

                                <div class="text-component text-space-y-sm">
                                    <h3 class="text-md"><a class="color-contrast-higher list-v3__link"
                                            href="author.html">David Smith</a></h3>
                                    <p class="color-contrast-medium">Lorem ipsum dolor sit amet consectetur</p>
                                </div>
                            </li>

                            <li class="list-v3__item flex gap-sm items-center@sm">
                                <figure class="list-v3__figure">
                                    <img class="block width-100% height-100% object-cover"
                                        src="assets/img/list-v3-img-3.jpg" alt="Image description">
                                </figure>

                                <div class="text-component text-space-y-sm">
                                    <h3 class="text-md"><a class="color-contrast-higher list-v3__link"
                                            href="author.html">Marta Rossi</a></h3>
                                    <p class="color-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit</p>
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
    <div class="dialog__content max-width-xxs" role="alertdialog" aria-labelledby="dialog-title-1"
        aria-describedby="dialog-description">
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
    <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto padding-md bg radius-md inner-glow shadow-md"
        role="alertdialog" aria-labelledby="modal-form-title" aria-describedby="modal-form-description">
        <div class="text-component margin-bottom-md">
            <h3 id="modal-form-title">Create new account</h3>
        </div>

        <form method="POST" action="<?= URLROOT ?>account/create" class="margin-bottom-sm">
            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-account-accountName">Account Name</label>
                <input class="form-control width-100% margin-bottom-xxs" type="text" name="accountName"
                    id="modal-account-accountName">
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-account-accountBalance">Account Balance</label>
                <input class="form-control width-100% margin-bottom-xxs" type="text" name="accountBalance"
                    id="modal-account-accountBalance">
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-customer-accountType">Account Type</label>
                <select class="form-control width-100 margin-bottom-xxs" name="accountType"
                    id="modal-customer-accountType">
                    <option value="personal">Personal</option>
                    <option value="business">business</option>
                </select>
            </div>



            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-account-accountDescription">Note</label>
                <input class="form-control width-100% margin-bottom-xxs" type="text" name="accountDescription"
                    id="modal-account-accountDescription">
            </div>

            <button class="btn btn--primary" style="margin-top:2rem;">Submit</button>
        </form>


    </div>

    <button class="reset modal__close-btn modal__close-btn--outer js-modal__close js-tab-focus">
        <svg class="icon icon--sm" viewBox="0 0 24 24">
            <title>Close modal window</title>
            <g fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <line x1="3" y1="3" x2="21" y2="21" />
                <line x1="21" y1="3" x2="3" y2="21" />
            </g>
        </svg>
    </button>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>