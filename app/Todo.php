<?php
namespace App;

class Todo{
    public function index()
    {
        $object_model = new Model;
        $PDO = $object_model->connect();
        $key=['id','FirstName','Toggle'];
        $arr = $object_model->select($PDO,$key);
        foreach ($arr as $row) {
            $tmp = empty($row[1])? "not set": $row[1];
            echo '<div style="border:1px solid black;padding: 10px;width: 20%;margin: 1%;display: flex; justify-content: space-around;">
                    <form action="/todo/delete" method="post" style="display: flex;">
                        <input name="id" value='.$row[0].' style="border:none; " hidden>
                        <input name="name_delete" value="'.$tmp.'" style="border:none;" readonly>
                        <input type="submit" name="delete" style="margin: 2%;" value="delete"/>
                    </form>
                    <form action="/todo/toggle" method="post">
                        <input name="id" value='.$row[0].' style="border:none; " hidden>
                        <input type="submit" name="toggle" style="margin: 2%;" value='.$row[2].'>
                    </form>
                </div>';
        }
    }
    
    private function redirect($url)
    {
        if (!headers_sent()){
            header("Location: $url");
        }else{
            echo "<script type='text/javascript'>window.location.href='$url'</script>";
            echo "<noscript><meta http-equiv='refresh' content='0;url=$url'/></noscript>";
        }
        exit;
    }

    public function add()
    {
        $object_model = new Model;
        $PDO = $object_model->connect();
        $key=['FirstName','Toggle'];
        $name = $_POST['name'];
        $value=[$name , 'Done'];
        $object_model->Insert($PDO,$key,$value);
        $this->redirect('http://localhost:8000/');
    }

    public function delete()
    {
        $object_model = new Model;
        $PDO = $object_model->connect();
        $object_model->delete($PDO,$_POST['id']);
        $this->redirect('http://localhost:8000/');
    }

    public function toggle()
    {
        $object_model = new Model;
        $PDO = $object_model->connect();
        if($_POST['toggle']=='Done'){
            $object_model->update($PDO,$_POST['id'],'Undo');
        }else{
            $object_model->update($PDO,$_POST['id'],'Done');
        }
        $this->redirect('http://localhost:8000/');
    }
}
