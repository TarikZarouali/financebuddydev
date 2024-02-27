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