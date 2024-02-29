<?php require APPROOT . '/views/includes/head.php'; ?>
<!-- start container -->
<div class="container max-width-lg padding-y-lg">
    <ul class="grid gap-lg" style="margin-bottom:5rem;">
        <!-- connected apps -->
        <li>
            <header class="margin-bottom-sm" style="margin-bottom: 5rem;">
                <h2 class="text-lg">All accounts</h2>
                <button class="btn btn--primary flex-end float-right" aria-controls="modal-account-form">Create new account</button>
            </header>
            <?php if (!empty($data['account'])) : ?>
                <div class="tbl">
                    <table class="tbl__table text-unit-em text-sm border-bottom border-2" aria-label="Table Example">
                        <thead class="tbl__header border-bottom border-2">
                            <tr class="tbl__row">
                                <th class="tbl__cell text-left" scope="col">
                                    <span class="text-xs text-uppercase letter-spacing-lg font-semibold"><strong>Account Name</strong></span>
                                </th>

                                <th class="tbl__cell text-left" scope="col">
                                    <span class="text-xs text-uppercase letter-spacing-lg font-semibold"><strong>Account Type</strong></span>
                                </th>

                                <th class="tbl__cell text-left" scope="col">
                                    <span class="text-xs text-uppercase letter-spacing-lg font-semibold"><strong>Account Balance</strong></span>
                                </th>

                                <th class="tbl__cell text-left" scope="col">
                                    <span class="text-xs text-uppercase letter-spacing-lg font-semibold"><strong>Account create date</strong></span>
                                </th>


                                <th class="tbl__cell text-left" scope="col">
                                    <span class="text-xs text-uppercase letter-spacing-lg font-semibold"><strong>Action</strong></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="tbl__body">
                            <?php foreach ($data['account'] as $account) : ?>
                                <tr class="tbl__row">
                                    <td class="tbl__cell" role="cell">
                                        <div class="flex items-center">

                                            <div class="line-height-xs">
                                                <a class="link-fx-5" href="<?= URLROOT . 'account/overview/' . $account->accountId ?>/"><?= $account->accountName ?></a>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <?php if ($account->accountType == 'personal') : ?>
                                            <span class="inline-block bg-success-darker bg-opacity-30% radius-full padding-y-xxxs padding-x-xs color-success-darker text-m ws-nowrap"><?= $account->accountType ?></span>
                                        <?php elseif ($account->accountType == 'business') : ?>
                                            <span class="inline-block bg-warning-darker bg-opacity-30% radius-full padding-y-xxxs padding-x-xs color-warning-darker text-m ws-nowrap"><?= $account->accountType ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="tbl__cell" role="cell">$<?= $account->accountBalance ?></td>
                                    <td class="tbl__cell" role="cell"><?= date('d F Y', strtotime($account->accountCreateDate)) ?></td>

                                    <td class="tbl__cell text-right" role="cell">
                                        <div class="flex items-center">

                                            <div class="line-height-xs">
                                                <a class="btn btn--primary" href="<?= URLROOT . 'account/update/' . $account->accountId ?>">Update</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="alert alert--is-visible js-alert" role="alert">
                                <div class="cd-flex cd-items-center cd-justify-between">
                                    <div class="cd-flex cd-items-center">
                                        <svg class="alert__icon cd-icon" viewBox="0 0 24 24" aria-hidden="true">
                                            <g fill="currentColor">
                                                <path fill-opacity=".2" d="M12 24a12 12 0 1 0 0-24 12 12 0 1 0 0 24z"></path>
                                                <path d="M12 9a1 1 0 0 1 1 1l0 9a1 1 0 0 1-2 0l0-9a1 1 0 0 1 1-1z"></path>
                                                <path d="M12 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 1 0 0 3z"></path>
                                            </g>
                                        </svg>
                                        <p><strong class="alert__label">Info:</strong> You have no accounts yet.</p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
        </li>
    </ul>
</div>
<!-- end container -->




<!-- MODAL FORM -->
<div class="modal modal--animate-scale flex flex-center bg-black bg-opacity-90% padding-md js-modal js-create" id="modal-account-form">
    <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto padding-md bg radius-md inner-glow shadow-md" role="alertdialog" aria-labelledby="modal-form-title" aria-describedby="modal-form-description">
        <div class="text-component margin-bottom-md">
            <h3 id="modal-form-title">Create new account</h3>
        </div>

        <form method="POST" action="<?= URLROOT ?>account/create" class="margin-bottom-sm" onsubmit="handleToastOnCrud('createEntity', true)">

            <div class="grid gap-sm">
                <label class="form-label" for="modal-account-accountName">Account Name</label>
                <input class="form-control width-100% margin-bottom-xxs" type="text" name="accountName" id="modal-account-accountName">
            </div>

            <div class="grid gap-sm">
                <label class="form-label " for="modal-account-accountBalance">Account Balance</label>
                <input class="form-control width-100% margin-bottom-xxs " type="text" name="accountBalance" id="modal-account-accountBalance">
            </div>

            <div class="grid gap-sm">
                <label class="form-label " for="modal-customer-accountType">Account Type</label>
                <select class="form-control width-100 margin-bottom-xxs" name="accountType" id="modal-customer-accountType">
                    <option value="personal">Personal</option>
                    <option value="business">Business</option>
                </select>
            </div>



            <div class="grid gap-sm">
                <label class="form-label " for="modal-account-accountDescription">Note</label>
                <textarea class="form-control width-100% margin-bottom-xxs" type="text" name="accountDescription" id="modal-account-accountDescription"></textarea>
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