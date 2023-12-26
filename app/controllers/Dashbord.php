<?php


class Dashbord extends Controller
{
    public function index()
    {
      

        // Assuming form data is submitted
        $user = new User;
        $result = $user->findAll();
        $data['result'] = $result;
        if(isset($_POST['updit'])) {
            $data["id"] = $_POST['id'];
            $data["nom"] = $_POST['editedName'];
            $data["prenom"] = $_POST['editedPrenom'];
            $data["email"] = $_POST['editedEmail'];
            $data["mot_de_passe"] = 12345;
            $data["role_id"] = $_POST['editedRole'];
            $id= $_POST['id'];
            show($data);
            $result = $user->update($data , $id  );
            $data['result'] = $result;
        } else {
        }
       
        $this->view('Dashbord', $data);
               

    }
}