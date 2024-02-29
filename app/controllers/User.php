<?php
class User extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('userModel');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Handle the form submission
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);


            $ajaxResponse = [
                'success' => [
                    'state' => 200,
                    'message' => 'Succesfully signed up!'
                ]
            ];

            // Extract form data
            $userFirstName = $post['userFirstName'];
            $userLastName = $post['userLastName'];
            $userUserName = $post['userUserName'];
            $userEmail = $post['userEmail'];
            $userPassword = $post['userPassword'];
            $userConfirmPassword = $post['userConfirmPassword'];

            // Check if any required fields are empty
            if (empty($post['userFirstName'])) {
                $ajaxResponse['userFirstName'] = [
                    'state' => 500,
                    'message' => 'First name cannot be empty.'
                ];
            }

            if (empty($post['userLastName'])) {
                $ajaxResponse['userLastName'] = [
                    'state' => 500,
                    'message' => 'Last name cannot be empty.'
                ];
            }

            if (empty($post['userUserName'])) {
                $ajaxResponse['userUserName'] = [
                    'state' => 500,
                    'message' => 'Username cannot be empty.'
                ];
            }

            if (empty($post['userEmail'])) {
                $ajaxResponse['userEmail'] = [
                    'state' => 500,
                    'message' => 'Email cannot be empty.'
                ];
            }

            if (empty($post['userPassword'])) {
                $ajaxResponse['userPassword'] = [
                    'state' => 500,
                    'message' => 'Password cannot be empty.'
                ];
            }

            if (empty($post['userConfirmPassword'])) {
                unset($ajaxResponse['success']);
                $ajaxResponse['userConfirmPassword'] = [
                    'state' => 500,
                    'message' => 'Confirm password cannot be empty.'
                ];
            }



            if ((isset($userFirstName) && !empty($userFirstName) && is_numeric($userFirstName))) {

                unset($ajaxResponse['userFirstName']);
                $ajaxResponse['userFirstName'] = [
                    'state' => 500,
                    'message' => 'First name cannot be numeric.'
                ];
            }

            if (isset($userLastName) && !empty($userLastName) && is_numeric($userLastName)) {
                unset($ajaxResponse['userLastName']);
                $ajaxResponse['userLastName'] = [
                    'state' => 500,
                    'message' => 'Last name cannot be numeric.'
                ];
            }

            if (!preg_match('/^[a-zA-Z\d]{5,}$/', $userUserName)) {
                unset($ajaxResponse['userUserName']);
                $ajaxResponse['userUserName'] = [
                    'state' => 500,
                    'message' => 'Username must be at least 5 characters long. and can only contain letters and numbers'
                ];
            }

            if (!empty($userEmail) && !filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                // Set the error message
                unset($ajaxResponse['success']);
                $ajaxResponse['userEmail'] = [
                    'state' => 500,
                    'message' => 'Please enter a valid email!'
                ];
            }

            // Validate password strength
            if (!empty($userPassword) && !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{6,}$/', $userPassword)) {
                // Set the error message
                unset($ajaxResponse['success']);
                $ajaxResponse['userPassword'] = [
                    'state' => 500,
                    'message' => 'password must atleast have 6 charachters, one special charachter and one uppercase charachter'
                ];
            }


            // Form data is valid; check for password match
            if (!empty($userConfirmPassword) && $userConfirmPassword !== $userPassword) {


                // Set the error message
                unset($ajaxResponse['success']);
                $ajaxResponse['userConfirmPassword'] = [
                    'state' => 500,
                    'message' => 'Passwords must match!'
                ];
            }

            // Form data is valid; proceed with creating the customer
            if (!empty($ajaxResponse['success']) && empty($ajaxResponse['userFirstName']) && empty($ajaxResponse['userLastName']) && empty($ajaxResponse['userUserName']) && empty($ajaxResponse['userEmail']) && empty($ajaxResponse['userPassword']) && empty($ajaxResponse['userConfirmPassword'])) {
                $createUser = $this->userModel->register($post);
                // Check if the customer creation was successful
                if (!isset($createUser) && empty($createUser)) {

                    helper::log('error', 'could not create user');
                    return;
                }
                  
                
            }

            echo json_encode($ajaxResponse);
            return;
        }
        // Render the view with error messages
        $this->view('user/register');
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $ajaxResponse = [
                'success' => [
                    'state' => 200,
                    'message' => 'Successfully logged in!'
                ]
            ];

            $userUserName = $post['userUserName'];
            $userPassword = $post['userPassword'];

            // CHECK FOR EMPTY FIELDS
            if (empty($post['userUserName'])) {
                unset($ajaxResponse['success']);
                $ajaxResponse['userUserName'] = [
                    'state' => 500,
                    'message' => 'Please fill in your email!'
                ];
            }

            if (empty($post['userPassword'])) {
                unset($ajaxResponse['success']);
                $ajaxResponse['userPassword'] = [
                    'state' => 500,
                    'message' => 'Please fill in your password!'
                ];
            }

            if (isset($post['userUserName']) && !empty($post['userUserName']) && isset($post['userPassword']) && !empty($post['userPassword'])) {
                $userExists = $this->userModel->checkUserExist($userUserName, $userPassword);

                if (isset($userExists) && !empty($userExists)) {
                    session_start();
                    $_SESSION['user'] = $userExists;
                    session_write_close();
                } else {
                    unset($ajaxResponse['success']);
                    $ajaxResponse['loginFailed'] = [
                        'state' => 500,
                        'message' => 'Email or password is incorrect'
                    ];
                }
            }

            echo json_encode($ajaxResponse);
            exit;
        }
        $this->view('user/login');
    }


    public function logout()
    {
        session_start();


        // Destroy the session
        session_destroy();

        // Redirect to the login page or any other page as needed
        header('Location:' . URLROOT . 'user/login/');
        exit();
    }
    public function overview()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            session_start();
            $userId = $_SESSION['user']->userId;
            $getAccountByUserId = $this->userModel->getAccountsByUserId($userId);
            $getAllAccounts = $this->userModel->getAllAccounts($userId);

            session_write_close();
            $data = [
                'account' => $getAccountByUserId,
                'accounts' => $getAllAccounts
            ];
        }
        $this->view('user/overview', $data);
    }
}


