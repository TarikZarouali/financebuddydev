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
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryFilter = isset($_POST['categoryFilter']) ? filter_var($_POST['categoryFilter'], FILTER_SANITIZE_STRING) : '';
            $transactionType = isset($_POST['transactionType']) ? filter_var($_POST['transactionType'], FILTER_SANITIZE_STRING) : '';
        } else {
            // If not submitted, show an empty string (All categories)
            $categoryFilter = '';
            $transactionType = '';
        }

        // Account details, transactions, categories, and goals
        $getAccountById = $this->accountModel->getAccountById($accountId);
        $getTransactionsByAccount = $this->transactionModel->getLimitedTransactionsByAccountId($accountId, $categoryFilter, $transactionType);
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

        // Ensure $getTransactionsByAccount is always an array
        $getTransactionsByAccount = is_array($getTransactionsByAccount) ? $getTransactionsByAccount : [];

        $overallBudgetSpentPercentage = 0;
        $overallBudgetAmount = 0;

        foreach ($getActiveBudgets as $budget) {
            $budgetAmount = isset($budget->budgetAmount) ? $budget->budgetAmount : 0;

            $budgetSpent = 0;

            foreach ($getAllTransactions as $transaction) {
                if ($transaction->transactionAmount < 0 && $transaction->transactionCategoryId == $budget->budgetCategoryId) {
                    $budgetSpent += $transaction->transactionAmount;
                }
            }
            
            $budgetSpentPercentage = ($budgetAmount != 0) ? min(100, round(($budgetSpent / $budgetAmount) * 100)) : 0;
            $overallBudgetAmount += $budgetAmount; 
            $overallBudgetSpentPercentage += $budgetSpentPercentage;  // Accumulate percentages
        }
        
        $overallBudgetSpentPercentage = min(100, round($overallBudgetSpentPercentage));  

        $data = [
            'account' => $getAccountById,
            'transactions' => $getTransactionsByAccount,
            'category' => $activeCategories,
            'goal' => $activeGoals,
            'progress' => $progress,
            'budget' => $getActiveBudgets,
            'budgetPercentage' => $overallBudgetSpentPercentage,
            'budgetAmount' => $overallBudgetAmount,
        ];



        // Load the view
        $this->view('account/overview', $data);
    }

    public function update($accountId)
    {
        $account = $this->accountModel->getAccountById($accountId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $updateAccount = $this->accountModel->updateAccount($accountId, $post);

            if ($updateAccount) {
                header("Location:" . URLROOT . 'user/overview/');
                return;
            } else {
                helper::log('error', 'could not update the budget');
                header("Location:" . URLROOT . 'account/update/' . $accountId);
                return;
            }
        }
        $data = [
            'account' => $account
        ];

        $this->view('account/update', $data);
    }


    public function create()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Handle the form submission
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $userId = isset($_SESSION['user']->userId) ? $_SESSION['user']->userId : null;


            $createAccount = $this->accountModel->createAccount($post, $userId);

            if ($createAccount) {
                header('Location: ' . URLROOT . 'user/overview');
            } else {
                echo 'Account not created successfully';
                helper::log('error', 'Could not create account on user');
            }
        }
        session_write_close();
    }

    public function delete($accountId)
    {
        $deleteAccount = $this->accountModel->deleteAccount($accountId);

        if ($deleteAccount) {
            header('Location: ' . URLROOT . 'user/overview');
        } else {
            echo 'Account not deleted successfully';
            helper::log('error', 'Could not delete account on user');
        }
    }
    // END ACCOUNT SECTION

    // GOALS SECTION
    public function createGoal($accountId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $createGoal = $this->goalModel->createGoalByAccountId($post, $accountId);

            if ($createGoal) {
                header("Location:" . URLROOT . 'account/overview/' . $accountId);
                return;
            } else {

                header("Location:" . URLROOT . 'account/overview/' . $accountId);
                return;
            }
        }
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $goal = $this->goalModel->getGoalsById($goalId);
            $updateGoal = $this->goalModel->updateGoal($goalId, $post);

            if ($updateGoal) {
                header("Location:" . URLROOT . 'account/overview/' . $goal->goalAccountId);
                return;
            } else {
                header("Location:" . URLROOT . 'account/overview/' . $goal->goalAccountId);
                return;
            }
        }
    }
    // END GOAL SECTION

    // TRANSACTIONS SECTION
    public function createTransaction($accountId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Handle the form submission
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Get the transaction amount
            $transactionAmount = floatval($post['transactionAmount']);

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
                header("Location:" . URLROOT . 'account/overview/' . $accountId);
                return;
            } else {
                header("Location:" . URLROOT . 'account/overview/' . $accountId);
                return;
            }
        }
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
            header('Location: ' . URLROOT . 'account/overview/' . $accountId);
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

            $originalAmount = $transaction->transactionAmount;
            $updatedAmount = floatval($post['transactionAmount']);
            $amountDifference = $updatedAmount - $originalAmount;

            $newBalance = $this->accountModel->getAccountBalance($transaction->transactionAccountId) + $amountDifference;
            $this->accountModel->updateAccountBalance($transaction->transactionAccountId, $newBalance);

            // Update the transaction
            $updateTransaction = $this->transactionModel->updateTransaction($transactionId, $post);

            if ($updateTransaction) {
                header("Location:" . URLROOT . 'account/overview/' . $transaction->transactionAccountId);
                return;
            } else {
                header("Location:" . URLROOT . 'account/overview/' . $transaction->transactionAccountId);
                return;
            }
        }

        $data = [
            'transaction' => $transaction,
            'category' => $activeCategories
        ];
        // helper::dump($transaction);exit;

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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $createBudget = $this->budgetModel->createBudgetByAccountId($accountId, $post);

            if ($createBudget) {
                header("Location:" . URLROOT . 'account/overview/' . $accountId);
                return;
            } else {
                header("Location:" . URLROOT . 'account/overview/' . $accountId);
                return;
            }
        }

        // If the execution reaches here, there was an error creating the budget
        header("Location:" . URLROOT . 'account/overview/' . $accountId);
    }

    public function updateBudget($budgetId)
    {
        $activeCategories = $this->categoryModel->getActiveCategories();
        $budget = $this->budgetModel->getBudgetById($budgetId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $updateBudget = $this->budgetModel->updateBudget($budgetId, $post);

            if ($updateBudget) {
                header("Location:" . URLROOT . 'account/overview/' . $budget->budgetAccountId);
                return;
            } else {
                helper::log('error', 'could not update the budget');
                header("Location:" . URLROOT . 'budget/update/' . $budget->budgetId);
                return;
            }
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
            header('Location:' . URLROOT . 'account/overview/' . $budget->budgetAccountId);
            return;
        } else {
            helper::log('error', 'could not delete budget in budgetController');
            header('Location:' . URLROOT . 'budget/update/' . $budget->budgetId);
            return;
        }
    }
    // END BUDGET SECTION

}
