<?php
class Core
{
    protected $currentController = 'Landingpage';
    protected $currentMethod = 'overview';
    protected $params = [];

    public function __construct()
    {



        //get the current url
        $url = $this->getUrl();
        $urlSlug = $url;


        //check if the controller exists for the current url
        if (file_exists(APPROOT . '/controllers/' . ucwords($url[0]) . '.php')) {
            //change the currentcontroller to the controller in the url
            $this->currentController = ucwords($url[0]);
            //destroy the first part of the url after the the urlroot
            // unset($url[0]);
        }


        //if the controller doesn't exist then change the controller to $currentController
        require_once APPROOT . '/controllers/' . $this->currentController . '.php';
        //instantiate the controllerClass
        $this->currentController = new $this->currentController();


        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($urlSlug[1]);
            } else if (!empty($url[1])) {
                require APPROOT . '/views/includes/404.php';
                exit;
            }
        }
        
        
        // Check if the current controller is not an instance of Landingpage
        if (!($this->currentController instanceof landingpage) && $this->currentMethod !== 'login' && $this->currentMethod !== 'register') {
            session_start();
            if (!isset($_SESSION['user'])) {
                header('Location: ' . URLROOT . 'user/login');
                exit; // It's good practice to exit after a redirect to prevent further code execution
            }
            session_write_close();
        }

        $this->params = $url ? [$url[2]] : [];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        //$_GET['url'] comes from the /public/.htaccess line 7
        $incoming = $_SERVER['REQUEST_URI'];

        // 20230224 - forgive me, but PHP + apache mod_rewrite is just no fun...
        // especially on a Friday! 
        $incoming = str_replace("/financebuddydev/", "", $incoming);
        if (isset($incoming)) {
            //remove the backslash from the front of the url
            $incoming = trim($incoming, "/");
            $url = filter_var($incoming, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // TODO: check if there is a value here for $urlController
            $urlController = $url[0];

            $urlAction = "";
            if (array_key_exists(1, $url)) {
                $urlAction = explode('?', $url[1])[0];
            }

            $urlSlug = "";
            if (array_key_exists(2, $url)) {
                $urlSlug = $url[2];
            }
            $output = [$urlController, $urlAction, $urlSlug];

            return $output;
        } else {
            return array('landingpage', 'overview');
        }
    }
}