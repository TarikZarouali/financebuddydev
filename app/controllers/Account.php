<?php

class Account extends Controller
{

    private $accountModel;
    private $screenModel;
    private $transactionModel;
    private $categoryModel;
    private $goalModel;

    private $userModel;
    private $budgetModel;

    public function __construct()
    {
        $this->screenModel = $this->model('screenModel');
        $this->accountModel = $this->model('accountModel');
        $this->transactionModel = $this->model('transactionModel');
        $this->categoryModel = $this->model('categoryModel');
        $this->goalModel = $this->model('goalModel');
        $this->budgetModel = $this->model('budgetModel');
        $this->userModel = $this->model('userModel');
    }


    // ACCOUNTS SECTION
    public function overview($accountId)
    {

        $categoryFilter = '';
        $transactionType = '';


        // Account details, transactions, categories, and goals
        $getAccountById = $this->accountModel->getAccountById($accountId);
        $getTransactionsByAccount = $this->transactionModel->getLimitedTransactionsByAccountId($accountId);
        $activeCategories = $this->categoryModel->getActiveCategories();
        $activeGoals = $this->goalModel->getGoalsByAccountId($accountId);
        $getActiveBudgets = $this->budgetModel->getActiveBudgetsByAccountId($accountId);
        $getAllTransactions = $this->transactionModel->getAllTransactionsByAccountId($accountId, $categoryFilter, $transactionType);


        // Fetch the latest account balance from the database
        $accountBalance = $this->accountModel->getAccountBalance($accountId);

        // Calculate progress for goals
        $goalAmount = isset($activeGoals->goalAmount) ? $activeGoals->goalAmount : 0;

        // Check if goalAmount is not zero
        if ($goalAmount != 0) {
            $progress = ($accountBalance / $goalAmount) * 100;
            $progress = min(100, round($progress));
        } else {
            $progress = 0;
        }

        $getTransactionsByAccount = is_array($getTransactionsByAccount) ? $getTransactionsByAccount : [];

        $overallBudgetSpentPercentage = 0;
        $budgetRemainingPercentage = 100;

        foreach ($getActiveBudgets as $budget) {
            $budgetAmount = isset($budget->budgetAmount) ? $budget->budgetAmount : 0;
            $budgetSpent = 0;

            foreach ($getAllTransactions as $transaction) {
                if ($transaction->transactionAmount < 0 && $transaction->transactionIsActive == 1 && $transaction->transactionCategoryId == $budget->budgetCategoryId) {
                    $budgetSpent += abs($transaction->transactionAmount);
                }
            }

            $budgetSpentPercentage = ($budgetAmount != 0) ? (($budgetSpent / $budgetAmount) * 100) : 0;

            $overallBudgetSpentPercentage += $budgetSpentPercentage;
        }

        // Round up the overall percentage to the nearest whole number
        $overallBudgetSpentPercentage = min(100, ceil($overallBudgetSpentPercentage));

        // Round up the remaining percentage to the nearest whole number
        $budgetRemainingPercentage = 100 - $overallBudgetSpentPercentage;

        $data = [
            'account' => $getAccountById,
            'transactions' => $getTransactionsByAccount,
            'category' => $activeCategories,
            'goal' => $activeGoals,
            'progress' => $progress,
            'budget' => $getActiveBudgets,
            'budgetPercentage' => $budgetRemainingPercentage,
            'budgetAmount' => 100 - $budgetRemainingPercentage,
        ];

        // Load the view
        $this->view('account/overview', $data);
    }

    public function update($accountId)
    {
        $account = $this->accountModel->getAccountById($accountId);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Check if any required fields are empty
            if (empty($post['accountName']) || empty($post['accountBalance']) || empty($post['accountType'])) {
                $ajaxResponse = [
                    'status' => 500,
                    'message' => 'Required fields cannot be empty!',
                ];
            } else {
                // Update the account and check for success
                $updateAccount = $this->accountModel->updateAccount($accountId, $post);

                if (empty($updateAccount)) {
                    $ajaxResponse = [
                        'status' => 500,
                        'message' => 'Account not updated successfully',
                    ];
                } else {
                    $ajaxResponse = [
                        'status' => 200,
                        'message' => 'account updated successfully!',
                    ];
                }
            }
            // Move the view-related code after the JSON response
            echo json_encode($ajaxResponse);
            return;
        }
        $data = [
            'account' => $account
        ];

        $this->view('account/update', $data);
    }


    public function create()
    {
        $ajaxResponse = [
            'status' => 200,
            'message' => 'OK',
        ];

        // Handle the form submission
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        session_start();
        $userId = isset($_SESSION['user']->userId) ? $_SESSION['user']->userId : null;
        session_write_close();

        if (empty($post['accountName']) || empty($post['accountBalance']) || empty($post['accountType'])) {
            $ajaxResponse = [
                'status' => 500,
                'message' => 'Required fields cannot be empty!',
            ];
        } else {
            $createAccount = $this->accountModel->createAccount($post, $userId);

            if (empty($createAccount)) {
                $ajaxResponse = [
                    'status' => 500,
                    'message' => 'Account not created successfully',
                ];
            } else {
                $ajaxResponse['success'] = [
                    'state' => 200,
                    'message' => 'account created successfully!',
                ];
            }
        }

        echo json_encode($ajaxResponse);
        return;
    }


    public function delete($accountId)
    {
        $deleteAccount = $this->accountModel->deleteAccount($accountId);

        if ($deleteAccount) {
            header('Location: ' . URLROOT . 'user/overview/');
        } else {
            echo 'Account not deleted successfully';
            helper::log('error', 'Could not delete account on user');
        }
    }
    // END ACCOUNT SECTION

    // GOALS SECTION
    public function createGoal($accountId)
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ajaxResponse = [];

        if (empty($post['goalName']) || empty($post['goalAmount'])) {
            $ajaxResponse = [
                'status' => 500,
                'message' => 'Required fields cannot be empty!',
            ];
        } else {
            $createGoal = $this->goalModel->createGoalByAccountId($post, $accountId);

            if (empty($createGoal)) {
                $ajaxResponse = [
                    'status' => 500,
                    'message' => 'Goal not created successfully',
                ];
            } else {
                $ajaxResponse = [
                    'status' => 200,
                    'message' => 'Goal created successfully!',
                ];
            }
        }

        echo json_encode($ajaxResponse);
        return;
    }


    public function deleteGoal($goalId)
    {
        $goal = $this->goalModel->getGoalsById($goalId);
        if ($this->goalModel->deleteGoal($goalId)) {
            header('Location: ' . URLROOT . 'account/overview/' . $goal->goalAccountId);
        } else {
            echo 'goal not deleted successfully';
            helper::log('error', 'Could not delete goal on user');
        }
        return;
    }

    public function updateGoal($goalId)
    {
        $goal = $this->goalModel->getGoalsById($goalId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Check if any required fields are empty
            if (empty($post['goalName']) || empty($post['goalAmount'])) {
                $ajaxResponse = [
                    'status' => 500,
                    'message' => 'Required fields cannot be empty!',
                ];
            } else {
                // Update the account and check for success
                $updateGoal = $this->goalModel->updateGoal($goalId, $post);

                if (empty($updateGoal)) {
                    $ajaxResponse = [
                        'status' => 500,
                        'message' => 'Goal not updated successfully',
                    ];
                } else {
                    $ajaxResponse = [
                        'status' => 200,
                        'message' => 'Goal updated successfully!',
                    ];
                }
            }

            // Move the view-related code after the JSON response
            echo json_encode($ajaxResponse);
            return;
        }

        $data = [
            'goal' => $goal,
        ];

        $this->view('account/update', $data);
    }

    // END GOAL SECTION

    // TRANSACTIONS SECTION
    public function createTransaction($accountId)
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ajaxResponse = [];
        $transactionAmount = floatval($post['transactionAmount']);


        if (empty($post['transactionName']) || empty($post['transactionAmount']) || empty($post['transactionCategoryId'])) {
            $ajaxResponse = [
                'status' => 500,
                'message' => 'Required fields cannot be empty!',
            ];
        } else {
            // check for transaction amount
            if ($transactionAmount > 0) {
                $newBalance = $this->accountModel->getAccountBalance($accountId) + $transactionAmount;
            } else {
                $newBalance = $this->accountModel->getAccountBalance($accountId) - abs($transactionAmount);
            }

            // Update the account balance
            $this->accountModel->updateAccountBalance($accountId, $newBalance);

            // Create the transaction
            $createTransaction = $this->transactionModel->createTransactionByAccountId($post, $accountId);

            if ($createTransaction) {
                $ajaxResponse = [
                    'status' => 200,
                    'message' => 'Transaction created successfully',
                ];
            } else {
                $ajaxResponse = [
                    'status' => 500,
                    'message' => 'Transaction not created successfully',
                ];
            }
        }
        echo json_encode($ajaxResponse);
        return;
    }


    public function deleteTransaction($transactionId)
    {
        $transaction = $this->transactionModel->getTransactionsById($transactionId);

        $transactionAmount = $transaction->transactionAmount;
        $accountId = $transaction->transactionAccountId;

        // Get the current account balance
        $currentBalance = $this->accountModel->getAccountBalance($accountId);

        // Update the account balance based on the transaction amount
        if ($transactionAmount > 0) {
            $newBalance = $currentBalance - $transactionAmount;
        } else {
            $newBalance = $currentBalance + abs($transactionAmount);
        }

        // Update the account balance in the database
        $this->accountModel->updateAccountBalance($accountId, $newBalance);

        // Delete the transaction
        if ($this->transactionModel->deleteTransaction($transactionId)) {
            header('Location: ' . URLROOT . 'account/overview/' . $accountId . '/');
        } else {
            echo 'Transaction not deleted successfully';
            helper::log('error', 'Could not delete transaction on user');
        }
        return;
    }

    public function updateTransaction($transactionId)
    {
        $transaction = $this->transactionModel->getTransactionsById($transactionId);
        $activeCategories = $this->categoryModel->getActiveCategories();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (empty($post['transactionName']) || empty($post['transactionAmount']) || empty($post['transactionCategoryId'])) {
                $ajaxResponse = [
                    'status' => 500,
                    'message' => 'Required fields cannot be empty!',
                ];
            } else {
                $originalAmount = $transaction->transactionAmount;
                $updatedAmount = floatval($post['transactionAmount']);
                $amountDifference = $updatedAmount - $originalAmount;

                $newBalance = $this->accountModel->getAccountBalance($transaction->transactionAccountId) + $amountDifference;
                $this->accountModel->updateAccountBalance($transaction->transactionAccountId, $newBalance);

                // Update the transaction
                $updateTransaction = $this->transactionModel->updateTransaction($transactionId, $post);

                if (empty($updateTransaction)) {
                    $ajaxResponse = [
                        'status' => 500,
                        'message' => 'transaction not updated successfully',
                    ];
                } else {
                    $ajaxResponse = [
                        'status' => 200,
                        'message' => 'transaction updated successfully!',
                    ];
                }
            }
            echo json_encode($ajaxResponse);
            return;
        }

        $data = [
            'transaction' => $transaction,
            'category' => $activeCategories
        ];

        $this->view('transaction/update', $data);
    }


    public function allTransactions($accountId)
    {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryFilter = isset($_POST['categoryFilter']) ? filter_var($_POST['categoryFilter']) : '';
            $transactionType = isset($_POST['transactionType']) ? filter_var($_POST['transactionType']) : '';
        } else {
            // If not submitted, show an empty string (All categories)
            $categoryFilter = '';
            $transactionType = '';
        }

        // Get all transactions without limiting the result
        $getTransactionsByAccount = $this->transactionModel->getAllTransactionsByAccountId($accountId, $categoryFilter, $transactionType);
        $activeCategories = $this->categoryModel->getActiveCategories();

        $data = [
            'transactions' => $getTransactionsByAccount,
            'category' => $activeCategories
        ];

        // $this->view('transaction/alltransactions', $data);
        $this->view('transaction/allTransactions', $data);
    }
    // END TRANSACTION SECTION


    // START BUDGET SECTION
    public function createBudget($accountId)
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ajaxResponse = [];

        if (empty($post['budgetName']) || empty($post['budgetAmount']) || empty($post['budgetCategoryId'])) {
            $ajaxResponse = [
                'status' => 500,
                'message' => 'Required fields cannot be empty!',
            ];
        } else {

            $createBudget = $this->budgetModel->createBudgetByAccountId($accountId, $post);

            if (empty($createBudget)) {
                $ajaxResponse = [
                    'status' => 500,
                    'message' => 'Budget not created successfully',
                ];
            } else {
                $ajaxResponse = [
                    'status' => 200,
                    'message' => 'Budget created successfully!',
                ];
            }
        }

        echo json_encode($ajaxResponse);
        return;
    }

    public function updateBudget($budgetId)
    {
        $activeCategories = $this->categoryModel->getActiveCategories();
        $budget = $this->budgetModel->getBudgetById($budgetId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (empty($post['budgetName']) || empty($post['budgetAmount']) || empty($post['budgetCategoryId'])) {
                $ajaxResponse = [
                    'status' => 500,
                    'message' => 'Required fields cannot be empty!',
                ];
            } else {

                $updateBudget = $this->budgetModel->updateBudget($budgetId, $post);

                if (empty($updateBudget)) {
                    $ajaxResponse = [
                        'status' => 500,
                        'message' => 'Budget not updated successfully',
                    ];
                } else {
                    $ajaxResponse = [
                        'status' => 200,
                        'message' => 'Budget updated successfully!',
                    ];
                }
            }
            echo json_encode($ajaxResponse);
            return;
        }
        $data = [
            'category' => $activeCategories,
            'budget' => $budget
        ];

        $this->view('budget/update', $data);
    }

    public function deleteBudget($budgetId)
    {
        $budget = $this->budgetModel->getBudgetById($budgetId);
        $deleteBudget = $this->budgetModel->deleteBudget($budgetId);

        if ($deleteBudget) {
            header('Location:' . URLROOT . 'account/overview/' . $budget->budgetAccountId . '/');
            return;
        } else {
            helper::log('error', 'could not delete budget in budgetController');
            header('Location:' . URLROOT . 'budget/update/' . $budget->budgetId . '/');
            return;
        }
    }
    // END BUDGET SECTION

}
