<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/13
 * Time: 10:44
 */
    $con = mysqli_connect('localhost','root','root');
    $con->query("SET NAMES utf8");
    $id = $_GET['id'];
    $type = $_GET['type'];
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    $selec = mysqli_select_db($con,'webnovel');
    if(!$selec){
        echo 'error';
    }
    if($type == '1')
        $sql = "select * from wn_reader,wn_bookrick,wn_chapter,wn_book,wn_type where wn_reader.id = wn_bookrick.readerid = $id and wn_bookrick.type = $type and wn_chapter.book_text_id = wn_bookrick.read_id and wn_chapter.bookid = wn_bookrick.bookid = wn_book.bookid and wn_type.tid = wn_book.typeid";
    else
        $sql = "select * from wn_author,wn_bookrick,wn_chapter,wn_book,wn_type where wn_authior.id = wn_bookrick.readerid = $id and wn_bookrick.type = $type and wn_chapter.book_text_id = wn_bookrick.read_id and wn_chapter.bookid = wn_bookrick.bookid = wn_book.bookid and wn_type.tid = wn_book.typeid";
    $result = mysqli_query($con,$sql);
    $booktik = array();
    if($result){
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($booktik,array('bookid'=>$row['bookid'],'read_id'=>$row['read_id'],'bookname'=>$row['bookname'],'hits'=>$row['hits'],'author'=>$row['author'],'nowtit'=>$row['nowtit'],'updatetime'=>$row['updatetime'],'bookdesc'=>$row['bookdesc'],'booktype'=>$row['type'],'typename'=>$row['typename']));
            }
        }
        echo json_encode($booktik);
    }