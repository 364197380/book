<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15
 * Time: 22:40
 */
    $con = mysqli_connect('localhost','root','root');
    $con->query("SET NAMES utf8");
    $sec = $_GET['sec'];
    $sec = '%'.$sec.'%';
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_select_db($con,'webnovel');
    $sql = "select * from ( select * from wn_author,wn_book,wn_type where wn_author.id = wn_book.authorid and wn_book.typeid = wn_type.tid ) as alias where nickname like '".$sec."' or bookname like '".$sec."'";
    $result = mysqli_query($con,$sql);
    $book = [];
    if($result){
        if(mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
                array_push($book,array('bookid'=>$row['bookid'],'bookname'=>$row['bookname'],'typeid'=>$row['typeid'],'type'=>$row['typename'],'bookdesc'=>$row['bookdesc'],'author'=>$row['author'],'updatetime'=>$row['updatetime'],'typename'=>$row['typename'],'nowtit'=>$row['nowtit']));
            }
            echo json_encode($book);
        }
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
