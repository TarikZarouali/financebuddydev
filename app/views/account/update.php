<?php require APPROOT . '/views/includes/head.php'; ?>


<div class="container max-width-lg padding-y-lg">
    <a href="<?= URLROOT . 'user/overview/' ?>" class="btn btn--primary ">Go back</a>
    <button style="margin-bottom:2rem;" class="btn btn--accent" aria-controls="dialog-delete-account-confirmation">Delete account</button>


    <div class="bg-light radius-md padding-md inner-glow shadow-xs" style="margin-bottom:2rem;">
        <form method="POST" action="<?= URLROOT ?>account/update/<?= $data['account']->accountId ?>">

            <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto padding-md bg radius-md inner-glow shadow-md" role="alertdialog" aria-labelledby="modal-form-title" aria-describedby="modal-form-description">
                <div class="text-component margin-bottom-md">
                    <h3 id="modal-form-title">Edit selected account</h3>
                </div>

                <div class="grid gap-sm">
                    <label class="form-label margin-bottom-xxs" for="modal-account-accountName">Account name</label>
                    <input class="form-control width-100% margin-bottom-xxs" type="text" name="accountName" id="modal-account-accountName" value="<?= $data['account']->accountName ?>">
                </div>

                <div class="grid gap-sm">
                    <label class="form-label margin-bottom-xxs" for="modal-account-accountBalance">Account balance</label>
                    <input class="form-control width-100% margin-bottom-xxs" type="number" step="0.01" name="accountBalance" id="modal-account-accountBalance" value="<?= $data['account']->accountBalance ?>">
                </div>

                <div class="grid gap-sm">
                    <label class="form-label margin-bottom-xxs" for="accountType">Account type</label>
                    <select class="form-control width-100" name="accountType" id="accountType" value="<?= $data['account']->accountType ?>">
                        <option value="personal" <?= ($data['account']->accountType === 'personal') ? 'selected' : '' ?>>
                            Personal</option>
                        <option value="business" <?= ($data['account']->accountType === 'business') ? 'selected' : '' ?>>
                            Business</option>
                    </select>
                </div>

                <div class="grid gap-sm">
                    <label class="form-label margin-bottom-xxs" for="modal-account-accountDescription">Account description</label>
                    <textarea class="form-control width-100% margin-bottom-xxs" type="text" name="accountDescription" id="modal-account-accountDescription" value="<?= $data['account']->accountDescription ?>"></textarea>
                </div>
                
                <button class="btn btn--primary" style="margin-top:2rem;">Submit</button>
            </div>
        </form>

    </div>

    <ul class="grid gap-lg">

        <!-- START QUICK LINKS -->

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

<!-- DELETE account -->
<div class="dialog dialog--sticky js-dialog" id="dialog-delete-account-confirmation" data-animation="on">
    <div class="dialog__content max-width-xxs" role="alertdialog" aria-labelledby="dialog-title-1" aria-describedby="dialog-description">
        <div class="text-component">
            <br>
            <input type="hidden" name="accountId" value="<?= $data['account']->accountId ?>">
            <br>
            <h4 id="dialog-title-1">Are you sure you want to delete this account?
            </h4>
            <p id="dialog-description">This action cannot be undone.</p>
        </div>
        <footer class="margin-top-md">
            <div class="flex justify-end gap-xs flex-wrap">
                <button class="btn btn--subtle js-dialog__close">Cancel</button>
                <a class="btn btn--accent" href="<?= URLROOT; ?>account/delete/<?= $data['account']->accountId ?>">Confirm</a>
            </div>
        </footer>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>