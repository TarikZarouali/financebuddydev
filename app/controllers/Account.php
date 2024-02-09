<?php

class Account extends Controller
{

    private $accountModel;

    public function __construct()
    {
        $this->accountModel = $this->model('accountModel');
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

        if($deleteAccount){
            header('Location: '. URLROOT. 'user/overview');
        }
        else{
            echo 'Account not deleted successfully';
            helper::log('error', 'Could not delete account on user');
        }
    }
}
