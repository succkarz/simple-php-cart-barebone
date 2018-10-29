<?php
    class con{
        private $link;
        function db_connect(){
            $this->link=mysqli_connect('localhost','root','','cart') or die(mysqli_error());
            return $this->link;
        }
        function db_close(){
            mysqli_close($this->link);
        }
    }