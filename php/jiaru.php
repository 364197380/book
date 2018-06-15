<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/22
 * Time: 13:27
 */
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/22
 * Time: 0:24
 */
    $con = mysqli_connect('localhost','root','root');
    $con->query("SET NAMES utf8");
    $id = $_GET['id'];
    $title = $_GET['title'];
    $content = $_GET['content'];
    $name = $_GET['name'];
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    $selec = mysqli_select_db($con,'webnovel');
    if(!$selec){
        echo 'error';
    }
    $sql = "insert into wn_disc (bookid,title,content,disename,times) values ($id,'".$title."','".$content."','".$name."','2018-5-5')";
    if(mysqli_query($con,$sql)){
        echo 'success';
    }
    else
        echo "Error: " . $sql . "<br>" . mysqli_error($con);