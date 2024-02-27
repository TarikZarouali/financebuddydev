<?php require APPROOT . '/views/includes/head.php'; ?>
<!-- start container -->
<div class="container max-width-lg padding-y-lg">

    <ul class="grid gap-lg">
        <!-- connected apps -->
        <li>
            <header class="margin-bottom-sm">
                <h2 class="text-lg">All transactions</h2>
            </header>
            <div class="bg-light radius-md padding-md inner-glow shadow-xs">
                <nav class="s-tabs text-sm">
                    <ul class="s-tabs__list">
                        <li><a class="s-tabs__link s-tabs__link--current">All transactions</a></li>
                    </ul>

                </nav>

                <div class="padding-y-xs border-bottom" data-table-controls="table-id">
                    <ul class="flex flex-column gap-xxs flex-row@sm items-center@sm">
                        <form method="post">
                            <div class="flex flex-wrap items-center gap-xxxs">
                                <div class="select" style="--select-icon-size: 12px;">
                                    <select class="select__input btn btn--subtle text-sm" name="transactionType" id="transactionType">
                                        <option value="0">All transaction types</option>
                                        <option value="income">Income</option>
                                        <option value="expense">Expense</option>
                                    </select>

                                    <svg class="icon select__icon" aria-hidden="true" viewBox="0 0 12 12">
                                        <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </svg>
                                </div>
                                <div class="select" style="--select-icon-size: 12px;">
                                    <select class="select__input btn btn--subtle text-sm" name="categoryFilter" id="categoryFilter">
                                        <option value="">All categories</option>
                                        <?php foreach ($data['category'] as $category) : ?>
                                            <option value="<?= $category->categoryId ?>"><?= $category->categoryName ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <svg class="icon select__icon" aria-hidden="true" viewBox="0 0 12 12">
                                        <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </svg>
                                </div>

                                <button class="btn btn--primary text-sm">Filter</button>
                            </div>
                        </form>
                    </ul>
                </div>

                <div id="table-id" class="int-table text-sm js-int-table">
                    <div class="int-table__inner">
                        <table class="int-table__table" aria-label="Interactive table example">
                            <thead class="int-table__header js-int-table__header">
                                <tr class="int-table__row">
                                    <th class="int-table__cell int-table__cell--th int-table__cell--sort js-int-table__cell--sort">
                                        <div class="flex items-center">
                                            <span>Transaction name</span>
                                        </div>
                                    </th>
                                    <th class="int-table__cell int-table__cell--th text-center">
                                        Transaction Amount
                                    </th>
                                    <th class="int-table__cell int-table__cell--th text-center">
                                        Transaction Category
                                    </th>
                                    <th class="int-table__cell int-table__cell--th text-center">
                                        Transaction Type
                                    </th>
                                    <th class="int-table__cell int-table__cell--th int-table__cell--sort js-int-table__cell--sort text-center" data-date-format="dd-mm-yyyy">
                                        <div class="flex items-center justify-center">
                                            <span>Create date</span>
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
                                    <th class="int-table__cell int-table__cell--th text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="int-table__body js-int-table__body">
                                <?php if (!empty($data['transactions'])) : ?>
                                    <?php foreach ($data['transactions'] as $transaction) : ?>
                                        <tr class="int-table__row">
                                            <td class="int-table__cell text-truncate max-width-xxxxs text-left">
                                                <?= $transaction->transactionName ?></td>
                                            <td class="int-table__cell text-center"><?= $transaction->transactionAmount ?></td>
                                            <td class="int-table__cell text-center"><?= $transaction->categoryName ?></td>
                                            <td style="display:none"><?= $transaction->categoryId ?></td>
                                            <td class="int-table__cell text-center">
                                                <?php if ($transaction->transactionAmount > 0) : ?>
                                                    <span class="inline-block bg-success-darker bg-opacity-20% radius-full padding-y-xxxs padding-x-xs color-success-darker text-xs ws-nowrap">Income</span>
                                                <?php else : ?>
                                                    <span class="inline-block bg-error-darker bg-opacity-20% radius-full padding-y-xxxs padding-x-xs color-error-darker text-xs ws-nowrap">Expense</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="int-table__cell text-center">
                                                <?= date('Y-m-d', $transaction->transactionCreateDate); ?></td>
                                            <td class="int-table__cell text-center">
                                                <a class="btn btn--primary" href="<?= URLROOT ?>account/updateTransaction/<?= $transaction->transactionId ?>/">Edit
                                                    transaction</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr class="int-table__row">
                                        <td class="text-center" colspan="7">
                                            <?php if ($data['transactions'] && empty($data['transaction']->categoryName)) : ?>
                                                <div class="alert alert--warning alert--is-visible js-alert" role="alert">
                                                    <div class="cd-flex cd-items-center cd-justify-between">
                                                        <div class="cd-flex cd-items-center">
                                                            <svg class="alert__icon cd-icon" viewBox="0 0 24 24" aria-hidden="true">
                                                                <g fill="currentColor">
                                                                    <path fill-opacity=".2" d="M12 24a12 12 0 1 0 0-24 12 12 0 1 0 0 24z"></path>
                                                                    <path d="M12 9a1 1 0 0 1 1 1l0 9a1 1 0 0 1-2 0l0-9a1 1 0 0 1 1-1z">
                                                                    </path>
                                                                    <path d="M12 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 1 0 0 3z"></path>
                                                                </g>
                                                            </svg>
                                                            <p><strong class="alert__label">Info:</strong> No transactions found for the selected category. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <div class="alert alert--is-visible js-alert" role="alert">
                                                    <div class="cd-flex cd-items-center cd-justify-between">
                                                        <div class="cd-flex cd-items-center">
                                                            <svg class="alert__icon cd-icon" viewBox="0 0 24 24" aria-hidden="true">
                                                                <g fill="currentColor">
                                                                    <path fill-opacity=".2" d="M12 24a12 12 0 1 0 0-24 12 12 0 1 0 0 24z"></path>
                                                                    <path d="M12 9a1 1 0 0 1 1 1l0 9a1 1 0 0 1-2 0l0-9a1 1 0 0 1 1-1z">
                                                                    </path>
                                                                    <path d="M12 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 1 0 0 3z"></path>
                                                                </g>
                                                            </svg>
                                                            <p><strong class="alert__label">Info:</strong> You have no transactions yet. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            
        </li>
        <div>
            <a href="<?= URLROOT . 'account/overview/' . $transaction->transactionAccountId ?>" class="btn btn--primary ">Go back</a>
        </div>



        

        
    </ul>
</div>
<!-- end container -->

<!-- end main content -->
</main>
</div>


<!-- DELETE GOAL -->
<div class="dialog dialog--sticky js-dialog" id="dialog-delete-goal-confirmation" data-animation="on">
    <div class="dialog__content max-width-xxs" role="alertdialog" aria-labelledby="dialog-title-1" aria-describedby="dialog-description">
        <div class="text-component">
            <br>
            <br>
            <h4 id="dialog-title-1">Are you sure you want to delete this Goal?
            </h4>
            <p id="dialog-description">This action cannot be undone.</p>
        </div>
        <footer class="margin-top-md">
            <div class="flex justify-end gap-xs flex-wrap">
                <button class="btn btn--subtle js-dialog__close">Cancel</button>
                <a class="btn btn--accent" href="<?= URLROOT; ?>account/deleteGoal/<?= $data['goal']->goalId ?>">Confirm</a>
            </div>
        </footer>
    </div>
</div>



<!-- MODAL FORM  CREATING TRANSACTION-->
<div class="modal modal--animate-scale flex flex-center bg-black bg-opacity-90% padding-md js-modal" id="modal-transaction-form">
    <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto padding-md bg radius-md inner-glow shadow-md" role="alertdialog" aria-labelledby="modal-form-title" aria-describedby="modal-form-description">
        <div class="text-component margin-bottom-md">
            <h3 id="modal-form-title">Create new transaction</h3>
        </div>

        <form method="POST" action="<?= URLROOT ?>account/createTransaction/<?= $data['account']->accountId ?>/" class="margin-bottom-sm">
            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-transaction-transactionName">Transaction
                    name</label>
                <input class="form-control width-100% margin-bottom-xxs" type="text" name="transactionName" id="modal-transaction-transactionName">
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-transaction-transactionAmount">Transaction
                    amount</label>
                <input class="form-control width-100% margin-bottom-xxs" type="number" step="0.01" name="transactionAmount" id="modal-transaction-transactionAmount">
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="transactionCategoryId">Category</label>
                <select class="form-control width-100" name="transactionCategoryId" id="transactionCategoryId" required>
                    <?php foreach ($data['category'] as $category) : ?>
                        <option value="<?= $category->categoryId ?>">
                            <?= $category->categoryName ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-transaction-transactionDescription">Description</label>
                <input class="form-control width-100% margin-bottom-xxs" type="text" name="transactionDescription" id="modal-transaction-transactionDescription">
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


<!-- MODAL FOR CREATING GOAL -->
<div class="modal modal--animate-scale flex flex-center bg-black bg-opacity-90% padding-md js-modal" id="modal-goal-form">
    <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto padding-md bg radius-md inner-glow shadow-md" role="alertdialog" aria-labelledby="modal-form-title" aria-describedby="modal-form-description">
        <div class="text-component margin-bottom-md">
            <h3 id="modal-form-title">Create new Goal</h3>
        </div>

        <form method="POST" action="<?= URLROOT ?>account/createGoal/<?= $data['account']->accountId ?>" class="margin-bottom-sm">
            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-goal-goalName">Goal name</label>
                <input class="form-control width-100% margin-bottom-xxs" type="text" name="goalName" id="modal-goal-goalName">
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-goal-goalAmount">goal amount</label>
                <input class="form-control width-100% margin-bottom-xxs" type="number" step="0.01" name="goalAmount" id="modal-goal-transactionAmount">
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-goal-goalDescription">Description</label>
                <textarea class="form-control width-100% margin-bottom-xxs" type="text" name="goalDescription" id="modal-goal-goalDescription"></textarea>
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

<!-- MODAL FOR CREATING A BUDGET -->
<div class="modal modal--animate-scale flex flex-center bg-black bg-opacity-90% padding-md js-modal" id="modal-budget-form">
    <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto padding-md bg radius-md inner-glow shadow-md" role="alertdialog" aria-labelledby="modal-form-title" aria-describedby="modal-form-description">
        <div class="text-component margin-bottom-md">
            <h3 id="modal-form-title">Create a new budget</h3>
        </div>

        <form method="POST" action="<?= URLROOT ?>account/createBudget/<?= $data['account']->accountId ?>/" class="margin-bottom-sm">
            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-budget-budgetName">Budget
                    name</label>
                <input class="form-control width-100% margin-bottom-xxs" type="text" name="budgetName" id="modal-budget-budgetName">
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-budget-budgetAmount">Budget
                    amount</label>
                <input class="form-control width-100% margin-bottom-xxs" type="number" step="0.01" name="budgetAmount" id="modal-budget-budgetAmount">
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="transactionCategoryId">Category</label>
                <select class="form-control width-100" name="transactionCategoryId" id="transactionCategoryId" required>
                    <?php foreach ($data['category'] as $category) : ?>
                        <option value="<?= $category->categoryId ?>">
                            <?= $category->categoryName ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-budget-budgetDescription">Description</label>
                <input class="form-control width-100% margin-bottom-xxs" type="text" name="budgetDescription" id="modal-budget-budgetDescription">
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


<!-- MODAL FOR EDITING GOAL -->
<div class="modal modal--animate-scale flex flex-center bg-black bg-opacity-90% padding-md js-modal" id="modal-goal-edit-form">
    <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto padding-md bg radius-md inner-glow shadow-md" role="alertdialog" aria-labelledby="modal-form-title" aria-describedby="modal-form-description">
        <div class="text-component margin-bottom-md">
            <h3 id="modal-form-title">Edit selected Goal</h3>
        </div>

        <form method="POST" action="<?= URLROOT ?>account/updateGoal/<?= $data['goal']->goalId ?>/" class="margin-bottom-sm">
            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-goal-goalName">Goal name</label>
                <input class="form-control width-100% margin-bottom-xxs" type="text" name="goalName" id="modal-transaction-goalName" value="<?= $data['goal']->goalName ?>">
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-goal-goalAmount">Goal amount</label>
                <input class="form-control width-100% margin-bottom-xxs" type="number" step="0.01" name="goalAmount" id="modal-goal-goalAmount" value="<?= $data['goal']->goalAmount ?>">
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-goal-goalDescription">Goal description</label>
                <textarea class="form-control width-100% margin-bottom-xxs" type="text" name="goalDescription" id="modal-goal-goalDescription" value="<?= $data['goal']->goalDescription ?>"></textarea>
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


<!-- MODAL FOR EDITING TRANSACTION -->
<div class="modal modal--animate-scale flex flex-center bg-black bg-opacity-90% padding-md js-modal" id="modal-transaction-edit-form">
    <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto padding-md bg radius-md inner-glow shadow-md" role="alertdialog" aria-labelledby="modal-form-title" aria-describedby="modal-form-description">
        <div class="text-component margin-bottom-md">
            <h3 id="modal-form-title">Edit selected transaction</h3>
        </div>

        <form method="POST" action="<?= URLROOT ?>account/updateTransaction/<?= $transaction->transactionId ?>/" class="margin-bottom-sm">

            <input type="hidden" name="transactionId" value="<?= $transaction->transactionId ?>">

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-transaction-transactionName">Transaction
                    name</label>
                <input class="form-control width-100% margin-bottom-xxs" type="text" name="transactionName" id="modal-transaction-transactionName" value="<?= $transaction->transactionName ?>">
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-transaction-transactionAmount">Transaction
                    amount</label>
                <input class="form-control width-100% margin-bottom-xxs" type="number" step="0.01" name="transactionAmount" id="modal-transaction-transactionAmount" value="<?= $transaction->transactionAmount ?>">
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="modal-transaction-transactionDescription">Transaction
                    description</label>
                <textarea class="form-control width-100% margin-bottom-xxs" type="text" name="transactionDescription" id="modal-transaction-transactionDescription" value="<?= $transaction->transactionDescription ?>"></textarea>
            </div>

            <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="transactionCategoryId">Category</label>
                <select class="form-control width-100" name="transactionCategoryId" id="transactionCategoryId" value="<?= $transaction->categoryName ?>" required>
                    <?php foreach ($data['category'] as $category) : ?>
                        <option value="<?= $category->categoryId ?>">
                            <?= $category->categoryName ?></option>
                    <?php endforeach; ?>
                </select>
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
<?php require APPROOT . '/views/includes/footer.php'; ?>