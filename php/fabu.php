<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/9
 * Time: 17:45
 */
    $con = mysqli_connect('localhost','root','root');
    $con->query("SET NAMES utf8");
    $name = $_GET['bookname'];
    $desc = $_GET['desc'];
    $type = $_GET['typeid'];
    $id = $_GET['id'];
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_select_db($con,'webnovel');
    $sql = "INSERT INTO wn_book (bookname,typeid,authorid,bookdesc,state,author) VALUES ('".$name."',$type,$id,'".$desc."','连载中','辰东')";
    if(mysqli_query($con,$sql)){
        echo "success";
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }