<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/14
 * Time: 16:26
 */
    $con = mysqli_connect('localhost','root','root');
    $con->query("SET NAMES utf8");
    $id = $_GET['uid'];
    if(!$con){
        die(mysqli_connect_errno());
    }
    mysqli_select_db($con,'webnovel');
    $sql = "select * from wn_author,wn_book,wn_type where wn_author.id = wn_book.authorid and wn_author.id = $id and wn_book.typeid = wn_type.tid";
    $result = mysqli_query($con,$sql);
    $mybook = array();
    if($result){
        if(mysqli_num_rows($result)){
            while($row  = mysqli_fetch_assoc($result)){
                array_push($mybook,array('bookid'=>$row['bookid'],'now'=>$row['now'],'bookname'=>$row['bookname'],'bookdesc'=>$row['bookdesc'],'type'=>$row['typename']));
            }
        }
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    echo json_encode($mybook);