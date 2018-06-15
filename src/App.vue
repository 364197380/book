<template>
  <div id="app">
    <div>
      <vheader></vheader>
    </div>
    <div>
      <munes></munes>
    </div>

  </div>
</template>

<script>
  import vheader from '@/components/header/vheader'
  import munes from '@/components/munes/Munes'
export default {
  name: 'App',
  components:{
    munes:munes,
    vheader:vheader
  }
}
</script>

<style>

#app {
  text-align: center;
  position:relative;

}
/*body:before{*/
  /*position:absolute;*/
  /*top:0;*/
  /*bottom:0;*/
  /*left: 0;*/
  /*right: 0;*/
  /*background-image:url('../static/u=3361410240,3032506157&fm=27&gp=0.jpg') ;*/
  /*background-size:cover;*/
  /*background-attachment:fixed;*/
  /*z-index: -1;*/
  /*filter:blur(3px);*/
  /*content:''*/
/*}*/
li{
  list-style:none
}
  *{
    margin:0;
    padding:0;
    text-align:left;
  }
  a{
    text-decoration:none;
    padding:0;
    margin:0;
  }
.books .desc{
  font-size:20px;
  font-weight:100;
  line-height:23px;
  margin:15px 0;
  height: 50px;
  overflow: hidden;
  word-wrap: break-word
}
.books{
  margin:30px 20px 30px 0;
  position:relative;
}
.books .left,.right{
  display:inline-block;
  width:150px;
  height:230px;
  vertical-align:top;
}
.books .left{
  background-color:grey;
  margin-right:20px;
}
.books .right{
  width:700px;
  position: relative;
}
.books .right .name{
  font-size: 30px;
  font-weight:700;
  height:35px;
  line-height:35px;
}
.books .author{
  margin-left:50px;
  font-size:18px;
}
.books .midden{
  margin:10px 0;
}
.books .type{
  font-size:15px;
  line-height:30px;
  border-radius:40%;
  border:rgba(255,0,0,.5) 1px solid;
  padding: 5px 10px;
  color:red;
}
.books .bottom{
  color:black;
  position:absolute;
  bottom: 0;
}
.books .bottom div{
  display:inline-block;
  margin-right: 20px;
}
.books .bottom a{
  border:blue 1px solid;
  display:block;
  padding:8px 20px;
  font-size:17px;
  text-decoration:none;
}
.books .bottom .read a{
  border:none;
  color:white;
  background-color:red;
  text-decoration:none;
}
.books .update{
  position:absolute;
  height: 30px;
  width: 50px;
  background-color:red;
  color:white;
  font-size: 18px;
  text-align:center;
  line-height: 30px;
  left: 0;
  top: 0;
}
.books .chapte{
  margin-bottom: 14px;
}
  .nav{
    margin:0;
    padding: 0;
  }
  .contain{
    width:1300px;
    margin:0 auto;
  }
  .contains{
    padding:50px 0 0 25px;
  }
  .a{
    display:block;
  }
</style>
