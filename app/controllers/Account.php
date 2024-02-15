<?php

class Account extends Controller
{

    private $accountModel;
    private $screenModel;
    private $transactionModel;
    private $categoryModel;
    private $goalModel;

    public function __construct()
    {
        $this->screenModel = $this->model('screenModel');
        $this->accountModel = $this->model('accountModel');
        $this->transactionModel = $this->model('transactionModel');
        $this->categoryModel = $this->model('categoryModel');
        $this->goalModel = $this->model('goalModel');
    }


    // ACCOUNTS SECTION
    public function overview($accountId)
    {
        $getAccountById = $this->accountModel->getAccountById($accountId);
        $getTransactionsByAccount = $this->transactionModel->getTransactionsByAccountId($accountId);
        $activeCategories = $this->categoryModel->getActiveCategories();
        $activeGoals = $this->goalModel->getGoalsByAccountId($accountId);

        // Fetch the latest account balance from the database
        $accountBalance = $this->accountModel->getAccountBalance($accountId);

        $goalAmount = isset($activeGoals->goalAmount) ? $activeGoals->goalAmount : 0;

        // Check if goalAmount is not zero to avoid division by zero warning
        if ($goalAmount != 0) {
            $progress = ($accountBalance / $goalAmount) * 100;
            $progress = min(100, round($progress));
        } else {
            $progress = 0;
        }

        $data = [
            'account' => $getAccountById,
            'transactions' => $getTransactionsByAccount,
            'category' => $activeCategories,
            'goal' => $activeGoals,
            'progress' => $progress,
        ];

        $this->view('account/overview', $data);
    }



    public function update($accountId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Check if $post is an array before proceeding
            if (is_array($post)) {

                $accountId = $post['accountId'];

                $result = $this->accountModel->updateAccount($accountId, $post);

                // Check the success key in the result
                if ($result) {

                    header('Location:' . URLROOT . 'account/update/' . $accountId);
                } else {
                    header('Location:' . URLROOT . 'account/update/' . $accountId);
                }
            } else {
                // Handle the case where $post is not an array
                // You may want to log an error or display an error message
                Helper::log('error', 'Illegal string offset');
            }
        } else {
            $row = $this->accountModel->getAccountById($accountId);
            $image = $this->screenModel->getScreenDataById($accountId, 'account', 'main');
            if ($image !== false) {
                // Check if the necessary properties exist before accessing them
                if (property_exists($image, 'screenCreateDate') && property_exists($image, 'screenId')) {
                    $createDate = date('Ymd', $image->screenCreateDate);
                    $imageSrc = URLROOT . 'public/media/' . $createDate . '/' . $image->screenId . '.jpg';
                } else {
                    // Handle the case where expected properties are missing
                    $imageSrc = URLROOT . 'public/default-image.jpg';
                }
            } else {
                // Handle the case where no image data is found
                $imageSrc = URLROOT . 'public/default-image.jpg';
            }
            $data = [
                'account' => $row,
                'imageSrc' => $imageSrc,
                'image' => $image
            ];
            $this->view('account/update', $data);
        }
    }

    public function updateAccountImage($accountId)
    {
        $screenId = helper::generateRandomString(15);
        $imageUploaderResult = $this->imageUploader($screenId);
        if ($imageUploaderResult['status'] === 200 && strpos($imageUploaderResult['message'], 'Image uploaded successfully') !== false) {
            $this->screenModel->insertScreenImages($screenId, $accountId);
            header('Location:' . URLROOT . '/account/update/' . $accountId);
        } else {
            Helper::log('error', $imageUploaderResult);
            header('Location:' . URLROOT . '/account/update/' . $accountId);
        }
    }

    public function deleteImage($accountId)
    {
        // Call the deleteScreen method from the model
        if ($this->screenModel->deleteScreen($accountId)) {
            header('Location:' . URLROOT . '/account/update/' . $accountId);
        } else {
            header('Location:' . URLROOT . '/account/update/' . $accountId);
        }
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
            'category'=> $activeCategories
        ];
        // helper::dump($transaction);exit;

        $this->view('transaction/update', $data);
    }
}
