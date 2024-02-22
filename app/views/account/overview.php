<?php require APPROOT . '/views/includes/head.php'; ?>
<!-- start container -->
<div class="container max-width-lg padding-y-lg">
    <ul class="grid gap-lg">
        <!-- connected apps -->
        <li>
            <header class="margin-bottom-sm">
                <h2 class="text-lg">Overview account</h2>
            </header>

            <div class="bg-light radius-md padding-md inner-glow shadow-xs" style="margin-bottom:2rem;">

                <?php if ($data['goal']) : ?>
                    <!-- Show Edit and Delete buttons if a goal exists -->
                    <button class="btn btn--primary" style="margin-bottom: 2rem;" aria-controls="modal-goal-edit-form">Edit
                        goal</button>
                    <button class="btn btn--accent" style="margin-bottom: 2rem;" aria-controls="dialog-delete-goal-confirmation">Delete goal</button>
                    <h5 style="margin-bottom:2rem;">Your goal is <?= $data['goal']->goalName ?> and the costs for your goal
                        is <strong>$<?= $data['goal']->goalAmount ?></strong></h5>
                    <div class="progress-bar progress-bar--color-update flex flex-column items-center js-progress-bar">
                        <p class="sr-only" aria-live="polite" aria-atomic="true">Progress value is <span class="js-progress-bar__aria-value"><?= $data['progress'] ?>%</span></p>
                        <span class="progress-bar__value margin-bottom-xs" aria-hidden="true"><?= $data['progress'] ?>%</span>

                        <div class="progress-bar__bg" aria-hidden="true">
                            <div class="progress-bar__fill" style="width: <?= $data['progress'] ?>%;"></div>
                        </div>
                    </div>
                <?php else : ?>
                    <!-- Show Add a goal button if no goal exists -->
                    <button class="btn btn--subtle" style="margin-bottom: 2rem;" aria-controls="modal-goal-form">Add a
                        goal</button>
                <?php endif; ?>
            </div>

            <div class="bg-light radius-md padding-md inner-glow shadow-xs" style="margin-bottom:2rem;">
                <h2>Your current balance is: <?= $data['account']->accountBalance ?></h2>
            </div>
            <div>
                <button class="btn btn--primary" style="margin-bottom: 2rem; " aria-controls="modal-transaction-form">Create new transaction</button>
            </div>


            <div class="bg-light radius-md padding-md inner-glow shadow-xs">
                <nav class="s-tabs text-sm">
                    <ul class="s-tabs__list">
                        <li><a class="s-tabs__link s-tabs__link--current" href="#0"><strong>Recent transactions</strong></a></li>
                    </ul>
                </nav>
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
                                            <td class="int-table__cell text-center">$<?= $transaction->transactionAmount ?></td>
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
                <div class="flex items-center justify-between padding-top-sm">
                    <a href="<?= URLROOT . 'account/allTransactions/' . $transaction->transactionAccountId ?>" class="text-sm">See all transactions -></a>
                </div>
            </div>
        </li>

        <div>
            <button class="btn btn--primary" style="margin: 1rem; " aria-controls="modal-budget-form">Create a new budget</button>
        </div>

        <?php if (!empty($data['budget'])) : ?>
            <?php foreach (['budget'] as $budget) : ?>
                <div class="bg-light radius-md padding-md inner-glow shadow-xs">
                    <p class="color-contrast-low margin-bottom-md">Pie Chart</p>

                    <div class="pie-chart flex flex-column gap-md js-pie-chart">
                        <div class="flex-shrink-0 flex justify-center">
                            <div class="pie-chart__area js-pie-chart__area">
                                <!-- svg will be created here using javascript -->
                                <!-- tooltip element -->
                                <div class="pie-chart__tooltip is-hidden js-pie-chart__tooltip"></div>
                            </div>
                        </div>

                        <div>
                            <ul class="grid gap-xs">
                                <li class="flex items-center col-6">
                                    <span class="pie-chart__bullet bg-primary margin-right-xxs" aria-hidden="true"></span>
                                    <span class="text-sm">Budget amount (<i class="js-pie-chart__value" data-pie-chart-style="fill: var(--color-success);">43%</i>)</span>
                                </li>

                                <li class="flex items-center col-6">
                                    <span class="pie-chart__bullet bg-contrast-low margin-right-xxs" aria-hidden="true"></span>
                                    <span class="text-sm">budget spent (<i class="js-pie-chart__value" data-pie-chart-style="fill: var(--color-accent);">28%</i>)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
                        <p><strong class="alert__label">Info:</strong> You have no budget yet. </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

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
                                            <path d="M21,18.184V16a1,1,0,0,0-.445-.832l-3-2a1,1,0,0,0-1.11,1.664L19,16.535v1.649a3,3,0,1,0,2,0Z">
                                            </path>
                                            <path d="M6.445,13.168l-3,2A1,1,0,0,0,3,16v2.184a3,3,0,1,0,2,0V16.535l2.555-1.7a1,1,0,1,0-1.11-1.664Z">
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
                                            <path d="M10.932,9.752a.5.5,0,0,0,0-.5l-4.5-8a.52.52,0,0,0-.872,0l-4.5,8A.5.5,0,0,0,1.5,10h9A.5.5,0,0,0,10.932,9.752Z">
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
                                            <path d="M23,15h-3v-2h2V2H2v11h3v2H1c-0.553,0-1-0.448-1-1V1c0-0.552,0.447-1,1-1h22 c0.553,0,1,0.448,1,1v13C24,14.552,23.553,15,23,15z" opacity="0.5"></path>
                                            <path d="M20.561,19.439l-6.211-6.211L20,10L5,6l4,15l3.229-5.65l6.211,6.211c0.586,0.586,1.535,0.586,2.121,0 C21.146,20.975,21.146,20.025,20.561,19.439z">
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
                                    <p class="color-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit</p>
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
                <label class="form-label margin-bottom-xxs" for="budgetCategoryId">Category</label>
                <select class="form-control width-100" name="budgetCategoryId" id="budgetCategoryId" required>
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