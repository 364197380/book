<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/22
 * Time: 18:57
 */
    $con = mysqli_connect('localhost','root','root');
    $con->query("SET NAMES utf8");
    $id = $_GET['id'];
    $type = $_GET['type'];
    $desc = $_GET['desc'];
    $name = $_GET['name'];
    $sex = $_GET['sex'];
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    $selec = mysqli_select_db($con,'webnovel');
    if(!$selec){
        echo 'error';
    }
    if($type == '1')
        $sql = "UPDATE wn_reader set nickname = '".$name."',sex = '".$sex."',desn = '".$desc."' WHERE id = $id";
    else
        $sql = "UPDATE wn_author set nickname = '".$name."',sex = '".$sex."',desn = '".$desc."' WHERE kid = $id";
    if(mysqli_query($con,$sql)){
        echo 'success';
    }
    else
        echo "Error: " . $sql . "<br>" . mysqli_error($con);