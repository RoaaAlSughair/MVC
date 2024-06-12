<?php

require_once "../App/Core/Controllers.php";

class Home extends Controllers
{

    function __construct()
    {
        $this->tasks = $this->model("Tasks");
    }

    public function index()
    {
        $this->view("Home/index", $this->tasks->GetTasks());
    }

    public function add()
    {
        echo $_POST['newTask'];
        if (isset($_POST['newTask']))
            $this->tasks->AddTask($_POST['newTask']);
    }

    public function update($id)
    {
        // ID at this point looks like: id="id_value" so the value must be extracted
        $split = explode("=", $id);
        if ($id != $split)
            $id = $split[1];

        $data = [];
        parse_str(file_get_contents("php://input"), $data);

        if ($data["Task"])
            $this->tasks->UpdateTask($id, $data['Task']);
    }

    public function delete($id)
    {
        // ID at this point looks like: id="id_value" so the value must be extracted
        $split = explode("=", $id);
        if ($id != $split)
            $id = $split[1];

        $this->tasks->DeleteTask($id);
    }
}
