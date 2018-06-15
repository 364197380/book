<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/9
 * Time: 15:13
 */

    $con = mysqli_connect('localhost','root','root');
    $con->query("SET NAMES utf8");
    $id = $_GET['id'];
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    $selec = mysqli_select_db($con,'webnovel');
    if(!$selec){
        echo 'error';
    }
    $sql = "SELECT * FROM wn_book,wn_type WHERE wn_book.bookid = $id and wn_book.typeid = wn_type.tid";
    $result = mysqli_query($con,$sql);
    if($result){
        $row = mysqli_fetch_assoc($result);
        $book = array('bookid'=>$row['bookid'],'bookname'=>$row['bookname'],'typeid'=>$row['typeid'],'type'=>$row['typename'],'desc'=>$row['bookdesc'],'author'=>$row['author'],'hit'=>$row['hits'],'updatetime'=>$row['updatetime'],'count'=>$row['count']);
    }
    $sql = "SELECT * FROM wn_chapter,wn_book,wn_type WHERE wn_chapter.bookid = wn_book.bookid and wn_book.bookid = $id and wn_book.typeid = wn_type.tid";
    $result = mysqli_query($con,$sql);
    $chapte = array();
    if($result){
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($chapte,array('title'=>$row['title'],'book_text_id'=>$row['book_text_id']));
            }
        }
        $book['chapter'] = $chapte;
    }
    $sql = "select * from wn_disc where bookid = $id";
    $result = mysqli_query($con,$sql);
    $ratings = [];
    if($result){
        if(mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
                array_push($ratings,array('diecid'=>$row['discid'],'title'=>$row['title'],'content'=>$row['content'],'times'=>$row['times'],'disename'=>$row['disename']));
            }
        }
    }
    $book['ratings'] = $ratings;
    echo json_encode($book);
