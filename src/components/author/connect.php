<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/8
 * Time: 22:17
 */

    $con = mysqli_connect('localhost','root','root');
    $con->query("SET NAMES utf8");
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    echo 'success';
    $selec = mysqli_select_db($con,'webnovel');
    if(!$selec){
        echo 'error';
    }
    echo '<br>success<br>';
    $sql = "SELECT * FROM wn_reader,wn_type";
    $result = mysqli_query($con,$sql);
    $reader = array();
    if($result){
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($reader,array('id'=>$row['id'],'name'=>$row['nickname'],'type'=>$row['typename'],'typeid'=>$row['typeid']));
            }
        }
        print_r($reader);
    }
    else
        echo 'error';
