<?php require APPROOT . '/views/includes/head.php'; ?>

<!-- start container -->
<div class="container max-width-lg padding-y-lg">
    <header class="margin-bottom-sm">
        <h1 class="text-lg">Edit selected account</h1>
        <a class="btn btn--accent flex-end float-right" aria-controls="dialog-delete-account-confirmation">Delete</a>
    </header>

    <form action="<?= URLROOT ?>account/update/<?= $data['account']->accountId ?>" method="post">
        <ul class="grid gap-md">
            <li class="col-8@lg">
                <ul class="grid gap-sm">

                    <li>
                        <input type="hidden" name="accountId" value="<?= $data['account']->accountId ?>">
                    </li>

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
                                        <option value="personal" <?= ($data['account']->accountType === 'personal') ? 'selected' : '' ?>>
                                            Personal</option>
                                        <option value="business" <?= ($data['account']->accountType === 'business') ? 'selected' : '' ?>>
                                            Business</option>
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
                    </li>

                    <li>
                        <button class="btn btn--primary" style="margin-top: 1rem; font-size: 0.8rem; padding: 0.5rem 1rem;">Submit</button>
                    </li>
                </ul>
            </li>
        </ul>
    </form>
</div>
<!-- end main content -->

<!-- dialog -->
<div id="dialog-delete-account-confirmation" class="dialog js-dialog" data-animation="on">
    <div class="dialog__content max-width-xxs" role="alertdialog">
        <div class="text-component line-height-xl">
            <h4>Are you sure you want to delete this article?</h4>
            <p class="color-contrast-medium">This action cannot be undone.</p>
        </div>

        <footer class="margin-top-md">
            <div class="flex justify-end gap-xs flex-wrap">
                <button class="btn btn--subtle js-dialog__close">Cancel</button>
                <a class="btn btn--accent" href="<?= URLROOT; ?>account/delete/<?= $data['account']->accountId ?>/">Delete</a>
            </div>
        </footer>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
