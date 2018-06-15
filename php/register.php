<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/10
 * Time: 23:51
 */
    $con = mysqli_connect('localhost','root','root');
    $pwd = $_GET['pwd'];
    $user = $_GET['name'];
    $user = $user+'';
    $type =$_GET['type'];
    if(!$con){
        die(mysqli_connect_errno());
    }
    mysqli_select_db($con,'webnovel');
    if($type == '1')
        $sql = "select username from wn_reader where username = $user";
    else
        $sql = "select * from wn_author where ausername = $user";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) == 0){
        if($type == '1')
            $sql = "INSERT INTO wn_reader (username,password) VALUES ($user,$pwd)";
        else
            $sql = "INSERT INTO wn_author (ausername,apassword) VALUES ($user,$pwd)";
        if(mysqli_query($con,$sql))
            echo ' success';
        else {
            echo '';
        }
    }
    else
        echo '';
