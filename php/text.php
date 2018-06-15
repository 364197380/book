<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/11
 * Time: 17:55
 */
    $con = mysqli_connect('localhost','root','root');
    $con->query("SET NAMES utf8");
    $id = $_GET['btid'];
    $bookid = $_GET['bookid'];
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    $selec = mysqli_select_db($con,'webnovel');
    if(!$selec){
        echo 'error';
    }
    $sql = "SELECT * FROM wn_chapter,wn_book where wn_chapter.bookid=$bookid and wn_chapter.book_text_id = $id";
    $result = mysqli_query($con,$sql);
    $text = array();
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $text['title'] = $row['title'];
        $text['content'] = $row['content'];
        $text['updatet'] = $row['updatet'];
        $text['author'] = $row['author'];
        $text['bookname'] = $row['bookname'];
        $text['now'] = $row['now'];
    }
    echo json_encode($text);