
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/session_users.php');
require('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/user_users.php');




class addcomments extends CI_Controller {

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

        $this->load->helper('url');


        $user = new User();

        try {
            $connection = new Mongo();
            $database = $connection->selectDB('user_tasty');
            $collection = $database->selectCollection('comments');
        } catch(MongoConnectionException $e) {
            die("Failed to connect to database ".$e->getMessage());
        }
        $cursor = $collection->find(array('recipe' => '2'));

        try {
            if($user->isLoggedIn())
            {
                $connection = new Mongo();
                $database = $connection->selectDB('user_tasty');
                $collection = $database->selectCollection('comments');

                //********good **********
                $url = parse_url($this->input->post('content'));
                $var = $url['host'];
                $emptyy = strlen($var);
                //*******end ************

                $length = mb_strlen($_POST['content']);

                if (($length > 0) && ($length <= 1000) && ($emptyy == 0)) {
                    $com = array('name' => $user->name, 'recipe' => '2', 'time'  => new MongoDate(), 'content' => $this->input->post('content'));
                    $collection->insert($com);
                }
            }
            else
            {
                echo "Access Forbidden! You cannot comment, loser ! ";
            }

        }
        catch(MongoConnectionException $e) {
            die("Failed to connect to database ". $e->getMessage());
        }
        catch(MongoException $e) {
            die('Failed to insert data '.$e->getMessage());
        }

        print_r("added!");

     //   $this->load->view('calendrier',$view_params );

    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */