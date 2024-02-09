<?php require APPROOT . '/views/includes/head.php'; ?>


            <!-- start container -->
            <div class="container max-width-lg padding-y-lg">
                <header class="margin-bottom-sm">
                    <h1 class="text-lg">Edit selected account</h1>
                </header>

                <form action="<?= URLROOT ?>account/update/<?= $data['account']->accountId ?>" method="post">
                    <ul class="grid gap-md">
                        <li class="col-8@lg">
                            <ul class="grid gap-sm">

                                <input type="hidden" name="accountId" value="<?= $data['account']->accountId ?>">

                                <li>
                                    <label class="form-label margin-bottom-xxs" for="accountName">Account name</label>
                                    <input class="form-control width-100%" type="text" name="accountName" id="accountName" value="<?= $data['account']->accountName ?>">
                                </li>

                                <li>
                                    <label class="form-label margin-bottom-xxs" for="accountBalance">Balance</label>
                                    <input class="form-control width-100%" type="text" name="accountBalance" id="accountBalance" value="<?= $data['account']->accountBalance ?>">
                                </li>

                                <li>
                                    <ul class="grid items-center gap-xs">
                                        <li class="col-12 col-4@xl">
                                            <label class="form-label" for="accountType">Account type</label>
                                        </li>

                                        <li class="col">
                                            <div class="select text-sm" style="--select-icon-size: 12px; --select-icon-right-margin: var(--space-xs);">
                                                <select class="select__input btn btn--subtle padding-y-xxxs padding-x-xxs" name="accountType" id="accountType">
                                                    <option value="personal" <?= ($data['account']->accountType === 'personal') ? 'selected' : '' ?>>Personal</option>
                                                    <option value="business" <?= ($data['account']->accountType === 'business') ? 'selected' : '' ?>>business</option>
                                                </select>

                                                <svg class="icon select__icon" aria-hidden="true" viewBox="0 0 12 12">
                                                    <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                </svg>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <label class="form-label margin-bottom-xxs" for="accountDescription">Add description</label>
                                    <textarea class="form-control width-100%" name="accountDescription" id="accountDescription" rows="4"><?= $data['account']->accountDescription ?></textarea>
                                    </i>

                                <li>
                                    <button class="btn btn--primary" style="margin-top: 1rem; font-size: 0.8rem; padding: 0.5rem 1rem;">Submit</button>
                                </li>
                </form>
                </ul>


                <form action="<?= URLROOT ?>account/updateAccountImage" method="post" enctype="multipart/form-data" style="margin: 2rem;">
                    <form action="<?= URLROOT ?>account/updateAccountImage" method="post"></form>
                    <h3>Add an image to your account!</h3>
                    <fieldset class="margin-bottom-xl">
                        <div class="margin-bottom-sm">
                            <div class="grid gap-xxs">
                                <div class="col-3@lg"> <label class="inline-block text-sm padding-top-xs@lg" for="file">Image</label> </div>
                                <div class="col-6@lg"> <input type="file" name="file" id="file" accept="image/*"> </div>
                            </div>
                            <div class="margin-bottom-sm">
                                <div class="grid gap-xxs">
                                    <div class="col-3@lg"> <label class="inline-block text-sm padding-top-xs@lg" for="file">file</label> </div>
                                    <div class="col-6@lg"> <?php if ($data['imageSrc'] && $data['imageSrc'] !== URLROOT . 'public/default-image.jpg') : ?> <figure class="user-menu-control__img-wrapper radius-50%"> <img class="user-menu-control__img image_picture" src="<?= $data['imageSrc'] ?>" alt="User picture"> </figure> <?php else : ?> <p>There is no image uploaded</p> <?php endif; ?> <!-- Add delete button conditionally --> <?php if ($data['imageSrc'] && $data['imageSrc'] !== URLROOT . 'public/default-image.jpg') : ?> <a href="#" aria-controls="dialog-delete-user-confirmation" class="btn btn--danger">Delete Image</a> <?php endif; ?> </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <li>
                        <button class="btn btn--primary" style="margin-top: 1rem; font-size: 0.8rem; padding: 0.5rem 1rem;">Submit</button>
                    </li>
                </form>

                <form action="<?= URLROOT ?>account/updateGoal/<?= $data['account']->accountId ?>" method="post">
                    <li class="col-4@lg">
                        <ul class="grid gap-sm">
                            <li id="update-section">
                                <div class="margin-bottom-xxs">
                                    <div class="flex justify-between@sm">
                                        <p class="form-label">Add a goal</p>
                                        <!-- <p><a class="text-sm color-contrast-higher display@sm" href="https://codyhouse.co/template/nettuno" target="_blank">Preview ↗</a></p> -->
                                    </div>
                                </div>

                                <div class="card padding-sm">
                                    <ul class="grid gap-xs">
                                        <li>
                                            <label class="form-label margin-bottom-xxs" for="accountGoals">Goal value:</label>
                                            <input class="form-control width-100%" type="text" name="accountGoals" id="accountGoals" value="<?= $data['account']->accountGoal ?>">
                                        </li>

                                        <fieldset class="margin-bottom-xl">
                                            <div class="margin-bottom-sm">
                                                <div class="grid gap-xxs">
                                                    <div class="col-3@lg">
                                                        <label class="inline-block text-sm padding-top-xs@lg" for="file">Image</label>
                                                    </div>
                                                    <div class="col-6@lg">
                                                        <input type="file" name="file" id="file" accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="margin-bottom-sm">
                                                    <div class="grid gap-xxs">
                                                        <div class="col-3@lg">
                                                            <label class="inline-block text-sm padding-top-xs@lg" for="file">file</label>
                                                        </div>
                                                        <div class="col-6@lg">
                                                            <?php if ($data['imageSrc'] && $data['imageSrc'] !== URLROOT . 'public/default-image.jpg') : ?>
                                                                <figure class="user-menu-control__img-wrapper radius-50%">
                                                                    <img class="user-menu-control__img image_picture" src="<?= $data['imageSrc'] ?>" alt="User picture">
                                                                </figure>
                                                            <?php else : ?>
                                                                <p>There is no image uploaded</p>
                                                            <?php endif; ?>
                                                            <!-- Add delete button conditionally -->
                                                            <?php if ($data['imageSrc'] && $data['imageSrc'] !== URLROOT . 'public/default-image.jpg') : ?>
                                                                <a href="#" aria-controls="dialog-delete-user-confirmation" class="btn btn--danger">Delete Image</a>

                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <li class="text-right">
                                            <a class="text-sm color-accent margin-right-sm" href="#0" aria-controls="dialog-delete-confirmation">Delete</a>
                                            <button class="btn btn--primary" style="margin-top:1rem;">Submit</button>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                </form>

                <form action="<?= URLROOT ?>account/updateBudget/<?= $data['account']->accountId ?>" method="post">
                    <li class="col-4@lg">
                        <ul class="grid gap-sm">
                            <li id="update-section">
                                <div class="margin-bottom-xxs">
                                    <div class="flex justify-between@sm">
                                        <p class="form-label">Add a budget</p>
                                        <!-- <p><a class="text-sm color-contrast-higher display@sm" href="https://codyhouse.co/template/nettuno" target="_blank">Preview ↗</a></p> -->
                                    </div>
                                </div>

                                <div class="card padding-sm">
                                    <ul class="grid gap-xs">
                                        <li>
                                            <label class="form-label margin-bottom-xxs" for="accountGoals">Budget value:</label>
                                            <input class="form-control width-100%" type="text" name="accountGoals" id="accountGoals" value="<?= $data['account']->accountGoal ?>">
                                        </li>

                                        <fieldset class="margin-bottom-xl">
                                            <div class="margin-bottom-sm">
                                                <div class="grid gap-xxs">
                                                    <div class="col-3@lg">
                                                        <label class="inline-block text-sm padding-top-xs@lg" for="file">Image</label>
                                                    </div>
                                                    <div class="col-6@lg">
                                                        <input type="file" name="file" id="file" accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="margin-bottom-sm">
                                                    <div class="grid gap-xxs">
                                                        <div class="col-3@lg">
                                                            <label class="inline-block text-sm padding-top-xs@lg" for="file">file</label>
                                                        </div>
                                                        <div class="col-6@lg">
                                                            <?php if ($data['imageSrc'] && $data['imageSrc'] !== URLROOT . 'public/default-image.jpg') : ?>
                                                                <figure class="user-menu-control__img-wrapper radius-50%">
                                                                    <img class="user-menu-control__img image_picture" src="<?= $data['imageSrc'] ?>" alt="User picture">
                                                                </figure>
                                                            <?php else : ?>
                                                                <p>There is no image uploaded</p>
                                                            <?php endif; ?>
                                                            <!-- Add delete button conditionally -->
                                                            <?php if ($data['imageSrc'] && $data['imageSrc'] !== URLROOT . 'public/default-image.jpg') : ?>
                                                                <a href="#" aria-controls="dialog-delete-user-confirmation" class="btn btn--danger">Delete Image</a>

                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <li class="text-right">
                                            <a class="text-sm color-accent margin-right-sm" href="#0" aria-controls="dialog-delete-confirmation">Delete</a>
                                            <button class="btn btn--primary" style="margin-top:1rem;">Submit</button>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                </form>


            </div>
            <!-- end container -->

            <div class="sticky-banner sticky-banner--bottom padding-y-sm padding-x-md bg-light js-sticky-banner" data-target-out="#update-section" data-scrollable-element="#main">
                <button class="btn btn--primary width-100%">Save</button>
            </div>

            <!-- end main content -->
        </main>
    </div>

    <!-- image modal window -->
    <div id="modal-image-name" class="modal modal--animate-scale bg-black bg-opacity-90% backdrop-blur-10 padding-md js-modal">
        <div class="modal__content width-100% height-100% flex flex-center pointer-events-none" role="alertdialog">
            <img class="block radius-md shadow-md max-height-100% max-width-100%" src="<?= URLROOT ?>assets/img/modal-window-img-1.jpg" alt="Image description">
        </div>

        <button class="reset modal__close-btn modal__close-btn--outer  js-modal__close js-tab-focus">
            <svg class="icon icon--sm" viewBox="0 0 24 24">
                <title>Close modal window</title>
                <g fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="3" x2="21" y2="21" />
                    <line x1="21" y1="3" x2="3" y2="21" />
                </g>
            </svg>
        </button>
    </div>
    <!-- end image modal window -->

    <!-- dialog -->
    <div id="dialog-delete-confirmation" class="dialog js-dialog" data-animation="on">
        <div class="dialog__content max-width-xxs" role="alertdialog">
            <div class="text-component line-height-xl">
                <h4>Are you sure you want to delete this article?</h4>
                <p class="color-contrast-medium">This action cannot be undone.</p>
            </div>

            <footer class="margin-top-md">
                <div class="flex justify-end gap-xs flex-wrap">
                    <button class="btn btn--subtle js-dialog__close">Cancel</button>
                    <button class="btn btn--accent">Delete</button>
                </div>
            </footer>
        </div>
    </div>
    <?php require APPROOT . '/views/includes/footer.php'; ?>
