<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/9
 * Time: 17:28
 */
    $con = mysqli_connect('localhost','root','root');
    $con->query("SET NAMES utf8");
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    $selec = mysqli_select_db($con,'webnovel');
    $sql = "SELECT * FROM wn_book,wn_type WHERE wn_book.typeid = wn_type.tid";
    $result = mysqli_query($con,$sql);
    $books = array();
    if($result){
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($books,array('bookid'=>$row['bookid'],'bookname'=>$row['bookname'],'typeid'=>$row['typeid'],'type'=>$row['typename'],'desc'=>$row['bookdesc'],'author'=>$row['author'],'hit'=>$row['hits'],'updatetime'=>$row['updatetime'],'state'=>$row['state'],'count'=>$row['count']));
            }
        }
    }
    echo json_encode($books);
