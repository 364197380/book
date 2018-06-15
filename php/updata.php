<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/14
 * Time: 16:24
 */
    $con = mysqli_connect('localhost','root','root');
    $con->query("SET NAMES utf8");
    $title = $_GET['title'];
    $id = (int)$_GET['id'];
    $content = $_GET['content'];
    $title = urldecode($title);
    if(!$con){
        die(mysqli_connect_errno());
    }
    mysqli_select_db($con,'webnovel');
    $sql = "select * from wn_book where bookid = $id";
    $result = mysqli_query($con,$sql);
    $now = (int)mysqli_fetch_assoc($result)['now']+1;
    $sql = "INSERT INTO wn_chapter (bookid,content,book_text_id,updatet,title) VALUES ($id,'".$content."',$now,'2014-01-23','".$title."')";
    $result = mysqli_query($con,$sql);
    if($result){
        echo 's';
    }
    else
        echo urldecode($title);
    if($result){
        $sql = "UPDATE wn_book set now = $now,nowtit = $title WHERE bookid = $id";
        $result = mysqli_query($con,$sql);
        if($result){
            echo 'success';
        }
    }
