<?php require APPROOT . '/views/includes/head.php'; ?>


<div class="container max-width-lg padding-y-lg">
<a href="<?= URLROOT . 'account/overview/' . $data['transaction']->transactionAccountId ?>" class="btn btn--primary ">Go back</a>
<button style="margin-bottom:2rem;" class="btn btn--accent" aria-controls="dialog-delete-transaction-confirmation">Delete transaction</button>


    <div class="bg-light radius-md padding-md inner-glow shadow-xs" style="margin-bottom:2rem;">
        <form method="POST" action="<?= URLROOT ?>account/updateTransaction/<?= $data['transaction']->transactionId ?>">

            <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto padding-md bg radius-md inner-glow shadow-md" role="alertdialog" aria-labelledby="modal-form-title" aria-describedby="modal-form-description">
                <div class="text-component margin-bottom-md">
                    <h3 id="modal-form-title">Edit selected transaction</h3>
                </div>

                    <div class="grid gap-sm">
                        <label class="form-label margin-bottom-xxs" for="modal-transaction-transactionName">Transaction name</label>
                        <input class="form-control width-100% margin-bottom-xxs" type="text" name="transactionName" id="modal-transaction-transactionName" value="<?= $data['transaction']->transactionName ?>">
                    </div>

                    <div class="grid gap-sm">
                        <label class="form-label margin-bottom-xxs" for="modal-transaction-transactionAmount">Transaction amount</label>
                        <input class="form-control width-100% margin-bottom-xxs" type="number" step="0.01" name="transactionAmount" id="modal-transaction-transactionAmount" value="<?= $data['transaction']->transactionAmount ?>">
                    </div>

                    <div class="grid gap-sm">
                        <label class="form-label margin-bottom-xxs" for="modal-transaction-transactionDescription">Transaction description</label>
                        <textarea class="form-control width-100% margin-bottom-xxs" type="text" name="transactionDescription" id="modal-transaction-transactionDescription" value="<?= $data['transaction']->transactionDescription ?>"></textarea>
                    </div>

                    <div class="grid gap-sm">
                        <label class="form-label margin-bottom-xxs" for="transactionCategoryId">Category</label>
                        <select class="form-control width-100" name="transactionCategoryId" id="transactionCategoryId" value="<?= $data['transaction']->categoryName ?>">
                            <?php foreach ($data['category'] as $category) : ?>
                                <option value="<?= $category->categoryId ?>">
                                    <?= $category->categoryName ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <button class="btn btn--primary" style="margin-top:2rem;">Submit</button>
            </div>
        </form>

    </div>

   
</div>

<!-- DELETE TRANSACTION -->
<div class="dialog dialog--sticky js-dialog" id="dialog-delete-transaction-confirmation" data-animation="on">
    <div class="dialog__content max-width-xxs" role="alertdialog" aria-labelledby="dialog-title-1" aria-describedby="dialog-description">
        <div class="text-component">
            <br>
            <input type="hidden" name="transactionId" value="<?= $data['transaction']->transactionId ?>">
            <br>
            <h4 id="dialog-title-1">Are you sure you want to delete this Transaction?
            </h4>
            <p id="dialog-description">This action cannot be undone.</p>
        </div>
        <footer class="margin-top-md">
            <div class="flex justify-end gap-xs flex-wrap">
                <button class="btn btn--subtle js-dialog__close">Cancel</button>
                <a class="btn btn--accent" href="<?= URLROOT; ?>account/deleteTransaction/<?= $data['transaction']->transactionId ?>">Confirm</a>
            </div>
        </footer>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>