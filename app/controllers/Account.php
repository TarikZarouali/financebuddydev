<?php

class Account extends Controller
{

    private $accountModel;
    private $screenModel;
    private $transactionModel;

    private $categoryModel;

    public function __construct()
    {
        $this->screenModel = $this->model('screenModel');
        $this->accountModel = $this->model('accountModel');
        $this->transactionModel = $this->model('transactionModel');
        $this->categoryModel = $this->model('categoryModel');
    }

    public function overview($accountId)
    {
        $getAccountById = $this->accountModel->getAccountById($accountId);
        $getTransactionsByAccount = $this->transactionModel->getTransactionsByAccountId($accountId);
        $activeCategories = $this->categoryModel->getActiveCategories();
        $data = [
            'account' => $getAccountById,
            'transactions' => $getTransactionsByAccount,
            'category' => $activeCategories
        ];
        $this->view('account/overview', $data);
    }
    public function update($accountId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Check if $post is an array before proceeding
            if (is_array($post)) {

                $accountId = $post['accountId']; // Adjust this line according to your form field name

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
        if ($imageUploaderResult['status'] === 200 && strpos($imageUploaderResult['message'], 'Image uploaded Successfully') !== false) {
            header('Location:' . URLROOT . 'account/update/' . $accountId);
        } else {
            Helper::log('error', $imageUploaderResult);
            header('Location:' . URLROOT . 'account/update/' . $accountId);
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


    // TRANSACTIONS
    public function createTransaction($accountId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Handle the form submission
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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


    public function deleteTransaction($accountId,$transactionId)
    {
        $deleteTransaction = $this->transactionModel->deleteTransaction($transactionId);

        if ($deleteTransaction) {
            header('Location: ' . URLROOT . 'account/overview' . $accountId);
        } else {
            echo 'Account not deleted successfully';
            helper::log('error', 'Could not delete account on user');
        }
    }
}
