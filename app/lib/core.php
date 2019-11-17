<?php
    /*
     * App Core Class.
     * Creates URL and loads core controller.
     * URL FORMAT - /controller/method/params
     */

     class Core {

        // Class properties.
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        // Constructor.
        public function __construct() {

            //print_r($this->getUrl());

            // Set url equal the result of invoking get url.
            $url = $this->getUrl();

            // If a controller exists for the specified controller.
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {

                // Set the current controller equal to the specified controller.
                $this->currentController = ucwords($url[0]);

                // Remove the controller from the array.
                unset($url[0]);
            }

            // Require in the specified controller.
            require_once '../app/controllers/' . $this->currentController . '.php';

            // Instantiate the specified controller.
            $this->currentController = new $this->currentController;
        }

        // Get url method.
        public function getUrl() {

            // If the url is set.
            if (isset($_GET['url'])) {

                // Remove any excess /.
                $url = rtrim($_GET['url'], '/');

                // Sanitize the url.
                $url = filter_var($url, FILTER_SANITIZE_URL);

                // Split the url on /.
                $url = explode('/', $url);

                // Return the url.
                return $url;
            }
        }
     }
?>