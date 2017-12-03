<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/session_users.php');
require('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/user_users.php');




class delete_comments extends CI_Controller {

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
    public function index($id)
    {
        $view_params = array(
            'mega_title' => 'Welcome tasty Recipes',
            'title' => 'Welcome to Tasty',
            'message' => $id
        );
        $this->load->helper('url');

        $user = new User();
        if(!$user->isLoggedIn())
        {
            header('location: /MyWebsite/CodeIgniter/index.php/calendar_view/login');
            exit;
        }

        try{
            $mongodb = new Mongo();
            $Commentcollection = $mongodb->user_tasty->comments;
            $thecomments = $Commentcollection->findOne(array('_id'=> new MongoId($id)));
            $authour = $thecomments['name'];

        } catch (MongoConnectionException $e) {
            die('Failed to connect to MongoDB '.$e->getMessage());
        }
        if(($user->name != $authour))
        {
            echo "You are not the authour of this message !";
            header('location: /MyWebsite/CodeIgniter');
        }
        else
        {
            $Commentcollection->remove(array('_id' => new MongoId($id)));
            header('location: /MyWebsite/CodeIgniter/index.php/calendar_view/index');
        }
        $this->load->view('calendrier',$view_params );
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */