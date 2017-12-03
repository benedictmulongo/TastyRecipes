<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar_view extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $view_params = array(
            'mega_title' => 'Welcome tasty Recipes',
            'title' => 'Welcome to Tasty',
            'message' => 'You can use the calendar (sign* ) above to see how to navigate and use our suggestions for foods for every day !'
        );
        $this->load->helper('url');

        $this->load->view('calendrier',$view_params );
    }

    public function recept_11()
    {
        $view_params = array(
            'mega_title' => 'Welcome tasty Recipes',
            'title' => 'Welcome to Tasty',
            'message' => 'You can use the calendar (sign* ) above to see how to navigate and use our suggestions for foods for every day !'
        );
        $this->load->helper('url');

        $this->load->view('recept11',$view_params );
    }

    public function recept_12()
    {
        $view_params = array(
            'mega_title' => 'Welcome tasty Recipes',
            'title' => 'Welcome to Tasty',
            'message' => 'You can use the calendar (sign* ) above to see how to navigate and use our suggestions for foods for every day !'
        );
        $this->load->helper('url');

        $this->load->view('recept12',$view_params );
    }

    public function login()
    {
        $view_params = array(
            'mega_title' => 'Welcome tasty Recipes',
            'title' => 'Welcome to Tasty',
            'message' => 'You can use the calendar (sign* ) above to see how to navigate and use our suggestions for foods for every day !'
        );
        $this->load->helper('url');

        $this->load->view('login_user',$view_params );
    }

    public function logout()
    {
        $view_params = array(
            'mega_title' => 'Welcome tasty Recipes',
            'title' => 'Welcome to Tasty',
            'message' => 'You can use the calendar (sign* ) above to see how to navigate and use our suggestions for foods for every day !'
        );
        $this->load->helper('url');

        $this->load->view('logout_users',$view_params );
    }

    public function register_user()
    {
        $view_params = array(
            'mega_title' => 'Welcome tasty Recipes',
            'title' => 'Welcome to Tasty',
            'message' => 'You can use the calendar (sign* ) above to see how to navigate and use our suggestions for foods for every day !'
        );
        $this->load->helper('url');

        $this->load->view('register_users',$view_params );
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */