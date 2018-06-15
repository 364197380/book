<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/10
 * Time: 23:39
 */
    $con = mysqli_connect('localhost','root','root');
    $con->query("SET NAMES utf8");
    $pwd = $_GET['pwd'];
    $user = $_GET['name'];
    $user = $user+'';
    $type =$_GET['type'];
    $xinxi = [];
    if(!$con){
        die(mysqli_connect_error());
    }
    mysqli_select_db($con,'webnovel');
    if($type == '1')
         $sql = "select * from wn_reader where username = $user and password = $pwd";
    else
        $sql = "select * from wn_author where ausername = $user and apassword = $pwd";
    $result = mysqli_query($con,$sql);
    if($result){
        if(mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            $xinxi['id'] = $row['id'];
            $xinxi['sex'] = $row['sex'];
            $xinxi['nickname'] = $row['nickname'];
            $xinxi['desc'] = $row['desn'];
        }
        echo json_encode($xinxi);
    }
    else{
        echo '';
    }