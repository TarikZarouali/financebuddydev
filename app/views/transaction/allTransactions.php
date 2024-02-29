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
                                    <th class="int-table__cell int-table__cell--th text-center">
                                        Transaction create date
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
                                            <td class="tbl__cell text-center" role="cell"><?= date('d F Y', strtotime($transaction->transactionCreateDate)) ?></td>
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
<?php require APPROOT . '/views/includes/footer.php'; ?>