<template>
  <div>
    <div class="login">
      <div class="log" >
        <span v-if="!$store.state.username" @click = 'login()'>还未登陆，请先登陆</span>
        <span v-else><router-link to="/user">欢迎回来： <span class="glyphicon glyphicon-user"></span>&nbsp{{$store.state.nickname}}</router-link></span>
      </div>
    </div>
    <login ref="logi"></login>
    <div class="search contain">
      <input type="text" name="search" id="search" placeholder="搜索" v-model = "searchs">
      <span class="glyphicon glyphicon-search" @click="search()"></span>
    </div>
  </div>
</template>

<style>
  .glyphicon-search{
    position:absolute;
    background:red;
    color:white;
    height: 35px;
    width: 35px;
    font-size: 20px;
    line-height: 35px;
    top:25px;
    text-align:center;
    cursor:pointer;
  }
  .glyphicon-search:hover{
    background: #ffa0a3;
  }
  .search{
    padding: 25px 0;
    position:relative;
    text-align:center;
  }
  .search input{
    width:350px;
    height:35px;
    line-height:40px;
    border:1px solid gray;
    -webkit-appearance: none;
    outline:0;
    text-indent:1em;
  }
  .login{
      padding: 20px 50px;
      position:relative;
      background:linear-gradient(
        to bottom,
        rgba(128, 128, 128, 0.17),
        #8f8f8f
      );
    }
  .log{
    position: absolute;
    right: 200px;
    cursor:pointer;
    top: 10px;
    font-size: 15px;
    }
  .log a{
    color:black;
    text-decoration:none;
  }
  .glyphicon-user{
    font-size: 14px;
  }
</style>

<script>
  import login from'../login/login'
    export default {
        props: {},
        data() {
            return {
                searchs:''
            }
        },
      methods:{
          search:function(){
              if(this.searchs != '')
                this.$router.push({path:'/search',query:{sec:this.searchs}});
              this.searchs = '';
              sessionStorage.setItem('user',this.$store.state.username);
              sessionStorage.setItem('pwd',this.$store.state.password);
              sessionStorage.setItem('id',this.$store.state.id);
              sessionStorage.setItem('type',this.$store.state.type);
              sessionStorage.setItem('sex',this.$store.state.sex);
              sessionStorage.setItem('nickname',this.$store.state.nickname);
              sessionStorage.setItem('desc',this.$store.state.desc);
              location.reload();
          },
          login:function(){
              this.$refs.logi.show();
          }
      },
        components:{
            login:login
        }
    }
</script>
