<template>
  <div class="munes">
    <login ref="log"></login>
    <nav class="navbar navbar-inverse header">
      <ul class="nav nav-pills contain ">
        <li>
          <router-link to="/" class="zuob">
            <div>
              <span class="glyphicon glyphicon-th-list left"></span>
              <span class="rigth">作品分类</span>
            </div>
          </router-link>
        <div>
          <ul class="select">
            <li><div class="top">玄幻</div><div class="bottom">1</div></li>
            <li><div class="top">武侠</div><div class="bottom">1</div></li>
            <li><div class="top">都市</div><div class="bottom">1</div></li>
            <li><div class="top">奇幻</div><div class="bottom">1</div></li>
            <li><div class="top">仙侠</div><div class="bottom">1</div></li>
            <li><div class="top">现实</div><div class="bottom">1</div></li>
            <li><div class="top">现实</div><div class="bottom">1</div></li>
            <li><div class="top">军事</div><div class="bottom">1</div></li>
            <li><div class="top">历史</div><div class="bottom">1</div></li>
            <li><div class="top">科幻</div><div class="bottom">1</div></li>
            <li><div class="top">体育</div><div class="bottom">1</div></li>
            <li><div class="top">女生</div><div class="bottom">1</div></li>
          </ul>
        </div></li>
        <li><router-link to="/all" >全部作品</router-link></li>
        <li><router-link to="/rank" >排行</router-link></li>
        <li><router-link to="/complete">完本</router-link></li>
        <li><div class="a" @click="enter('/booktik','1')" :class="{yeee:ffff[0]}">我的书架</div></li>
        <li><div class="a" @click="enter('/author','2')" :class="{yeee:ffff[1]}">作家专区</div></li>
      </ul>
    </nav>
    <router-view></router-view>
  </div>
</template>

<style>
  .header{
    margin: 0;
    padding: 0;
  }
  .munes{
    font-size:20px;
    position:relative;
  }
  .nav-pills>li a{
    margin:0;
    padding:0 50px;
    line-height: 50px;
    display:block;
    color: white;
  }
  .nav>li a:hover,.nav li a:visited{
    background: #ff113a
  }
  .nav>li:first-child{
    margin:0;
    width:200px;
    line-height: 50px;
    color: white;
    cursor:pointer
  }
  .nav{
    overflow: hidden;
  }
  .select{
    color:gray;
    overflow:hidden;
    padding-top:10px;
    position:absolute;
    display:none;
  }
  .select>li{
    float:left;
    width: 100px;
    height:50px
  }
  .select>li .top{
    height:30px;
    line-height:30px;
  }
  .select>li .bottom{
    height:20px;
    font-size:10px;
    line-height:20px;
    color:gray;
  }
  .zuob{
    position:relative;
  }
  .nav>li:first-child .left{
    position:absolute;
    left:28px;
    top:13px
  }
  .a{
    margin:0;
    padding:0 50px;
    line-height: 50px;
    display:block;
    color: white;
    cursor:pointer;
  }
  .a:hover{
    background: #ff113a
  }
  .yeee{
    background-color: #ff113a
  }
  /*.nav>li:first-child:hover ul{*/
    /*display:none;*/
  /*}*/
</style>
<script>
  import login from'../login/login'
    export default {
        props: {

        },
        data() {
            return {
              content:'书架',
                ffff:[false,false]
            }
        },
        components:{
          login:login
        },
        methods:{
          touch: function(dd){
            this.content = dd;
          },
          enter:function (paths,type) {
              if (this.$store.state.username != null){
                  if (type == '2') {
                      if (parseInt(this.$store.state.type) == parseInt(type)) {
                          this.ffff[0] = this.ffff[1] = false;
                          this.ffff[1] =true;
                          this.$router.push({path: paths, query: {uid: this.$store.state.id}})
                      }
                      else
                          alert('您不是签约作者，无法进入');
                  }
                  if (type == '1') {
                      this.ffff[0] = this.ffff[1] = false;
                      this.ffff[0] =true;
                      this.$router.push({path: paths, query: {uid: this.$store.state.id}})
                  }
              }
              else{
                      this.$refs.log.show();
              }

          }
        }
    }
</script>
