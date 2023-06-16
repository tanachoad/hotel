<?php

class Util{
    public function testInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = strip_tags($data);

        return $data;
    }
    public function showMessage($type, $message){
        return '<div class="alert alert' . $type . 'alert-dismissible fade show" role="alert">
                <strog>' . $message . '</strog>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="close></button>
        </div>';
    }
}
?>