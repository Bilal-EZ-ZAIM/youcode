<?php
class Home extends Controller
{
    public function index()
    {
        $user = new User;

        $result = $user->findAll();

        $data['result'] = $result;

        $this->view('home', $data);
    }
}
?>
