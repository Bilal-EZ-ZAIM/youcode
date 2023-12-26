<?php
class Singup extends Controller
{
    public function index()
    {
      

        // Assuming form data is submitted
        $data = [];
        if (isset($_POST['sing'])) {
            $data["nom"] = $_POST['nom'];
            $data["prenom"] = $_POST['prenom'];
            $data["email"] = $_POST['email'];
            $data["mot_de_passe"] = $_POST['password'];
            $user = new User;
            $result = $user->insert($data);
            $data['result'] = $result;
            redirect("login");
        } else {
        }
        
        $this->view('singup', $data);
               

    }
}
