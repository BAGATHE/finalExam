<?php
    function connect(){
        static $con = null;
        if($con===null){$con=mysqli_connect("172.20.0.167", "ETU002658","888E775LtLec", "db_p16_ETU002658");}
        return $con;
    }
?>