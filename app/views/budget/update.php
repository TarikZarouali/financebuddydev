<?php require APPROOT . '/views/includes/head.php'; ?>


<div class="container max-width-lg padding-y-lg">
    <a href="<?= URLROOT . 'account/overview/' . $data['budget']->budgetAccountId ?>" class="btn btn--primary ">Go back</a>
    <button style="margin-bottom:2rem;" class="btn btn--accent" aria-controls="dialog-delete-budget-confirmation">Delete budget</button>


    <div class="bg-light radius-md padding-md inner-glow shadow-xs" style="margin-bottom:2rem;">
        <form  method="POST" action="<?= URLROOT ?>account/updateBudget/<?= $data['budget']->budgetId ?>" onsubmit="editEntity(scope,action)">

            <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto padding-md bg radius-md inner-glow shadow-md" role="alertdialog" aria-labelledby="modal-form-title" aria-describedby="modal-form-description">
                <div class="text-component margin-bottom-md">
                    <h3 id="modal-form-title">Edit selected budget</h3>
                </div>

                <div class="grid gap-sm">
                    <label class="form-label margin-bottom-xxs" for="modal-budget-budgetName">Budget name</label>
                    <input class="form-control width-100% margin-bottom-xxs" type="text" name="budgetName" id="modal-budget-budgetName" value="<?= $data['budget']->budgetName ?>">
                </div>

                <div class="grid gap-sm">
                    <label class="form-label margin-bottom-xxs" for="modal-budget-budgetAmount">Budget amount</label>
                    <input class="form-control width-100% margin-bottom-xxs" type="number" step="0.01" name="budgetAmount" id="modal-budget-budgetAmount" value="<?= $data['budget']->budgetAmount ?>">
                </div>

                <div class="grid gap-sm">
                    <label class="form-label margin-bottom-xxs" for="modal-budget-budgetDescription">budget description</label>
                    <textarea class="form-control width-100% margin-bottom-xxs" type="text" name="budgetDescription" id="modal-budget-budgetDescription" value="<?= $data['budget']->budgetDescription ?>"></textarea>
                </div>


                <div class="grid gap-sm">
                    <label class="form-label margin-bottom-xxs" for="budgetCategoryId">Category</label>
                    <select class="form-control width-100" name="budgetCategoryId" id="budgetCategoryId" value="<?= $data['budget']->categoryName ?>">
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

<!-- DELETE budget -->
<div class="dialog dialog--sticky js-dialog" id="dialog-delete-budget-confirmation" data-animation="on">
    <div class="dialog__content max-width-xxs" role="alertdialog" aria-labelledby="dialog-title-1" aria-describedby="dialog-description">
        <div class="text-component">
            <br>
            <input type="hidden" name="budgetId" value="<?= $data['budget']->budgetId ?>">
            <br>
            <h4 id="dialog-title-1">Are you sure you want to delete this budget?
            </h4>
            <p id="dialog-description">This action cannot be undone.</p>
        </div>
        <footer class="margin-top-md">
            <div class="flex justify-end gap-xs flex-wrap">
                <button class="btn btn--subtle js-dialog__close">Cancel</button>
                <a class="btn btn--accent" onclick="deleteEntity(scope,action)" href="<?= URLROOT; ?>account/deleteBudget/<?= $data['budget']->budgetId ?>">Confirm</a>
            </div>
        </footer>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>