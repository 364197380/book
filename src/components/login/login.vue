<template>
  <div class="login" v-if="chu">
    <div  class="admin" >
      <div v-show="false">
       {{a}}
      </div>
      <div class="ad">
        <div @click="chux(0)" :class="{act:xian[0]}">登 陆</div>
        <div @click="chux(1)" :class="{act:xian[1]}">注 册</div>
      </div>
      <div class="bot">
        <div class="container" v-show="xian[0]">
          <div class="row">
            <label for="writex" class="col-xs-4" >账 号:</label>
            <input type="text" id="writex" class="col-xs-7"  v-model="user">
          </div>
          <div class="row">
            <label for="write1" class="col-xs-4">密 码:</label>
            <input type="password" id="write1" class="col-xs-7"  v-model="pwd">
          </div>
          <div class="user">
            读者<input type="radio" value = "1" name="user" v-model="radio">&nbsp&nbsp
            作者<input type="radio" value =" 2" name="user" v-model="radio">
          </div>
          <div class="button">
            <button type="button" class="btn btn-success" @click="login()">登 陆</button>
            <button type="button" class="btn btn-danger" @click="cancel()">取 消</button>
          </div>
        </div>
        <div class="container" v-show="xian[1]">
          <div class="row">
            <label for="writ" class="col-xs-4" >账 号:</label>
            <input type="text" id="writ" class="col-xs-5" v-model="user1">
          </div>
          <div class="row">
            <label for="writ1" class="col-xs-4" >密 码:</label>
            <input type="password" id="writ1" class="col-xs-5"  v-model="pwd1" @input="check()">
          </div>
          <div class="row">
            <label for="writ2" class="col-xs-4" >确认密码:</label>
            <input type="password" id="writ2" class="col-xs-5"  v-model="pwd2" @input="check()">
            <span class="error" v-show="ok[1]">密码不一致</span>
            <span class="glyphicon glyphicon-ok" v-show="ok[0]"></span>
          </div>
          <div class="user">
            读者<input type="radio" value = "1" name="user1" v-model="radios">&nbsp&nbsp
            作者<input type="radio" value =" 2" name="user1" v-model="radios">
          </div>
          <div class="button">
            <button class="btn btn-success" @click="registe()">注 册</button>
            <button class="btn btn-danger" @click="cancel()">取 消</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
  .login{
    position:fixed;
    z-index:999;
    top:0;
    bottom: 0;
    width: 100%;
    background-color:rgba(0,0,0,.5);
  }
  .container{
    width: 400px;
    padding: 30px;
  }
  .row{
    margin-bottom: 20px;
  }
  .admin{
    position:absolute;
    height: 300px;
    width: 400px;
    background:white;
    top:50%;
    left: 50%;
    margin: -150px 0 0 -200px;
  }
  .ad>div{
    /*position:absolute;*/
    flex:1;
    font-size: 20px;
    text-align:center;
    height:40px;
    line-height: 40px;
    cursor:pointer;
  }
  .ad{
    display:flex;
  }
  .act{
    border-bottom:red 2px solid;
  }
  .btn{
    margin: 15px 0 0 60px;
   }
  .bot{
    font-size: 16px;
    position:relative;
  }
  .bot>div{
    position:absolute;
  }
  .glyphicon-ok{
    color:green;
    font-size: 15px;
    position:absolute;
    right: 50px;
    bottom: 3px;
  }
  .row{
    position:relative;
  }
  .error{
    position: absolute;
    right: 5px;
    font-size: 15px;
    bottom: 3px;
    color: #ff0428
  }
  .user{
    padding-left: 130px;
  }
  .bot .button{
    position:absolute;
    left: 50px;
    bottom:0px;
  }
  .admin .container{
    height: 240px;
    width: 400px;
  }
</style>

<script>
    export default {
        props: {},
        data() {
            return {
              chu:false,
              xian:[true,false],
              a:false,
              pwd:'',
              pwd1:'',
              pwd2:'',
              ok:[false,false],
              user:'',
              user1:'',
              radio:'1',
              radios:'1'
            }
        },
        methods:{
          chux:function(index){
            this.a = !this.a;
            this.xian[0] = false;
            this.xian[1] = false;
            this.xian[index] = true;
          },
          login:function(){
              if(this.user!=''&&this.pwd!=''){
                  let id;
                  let that = new FormData();
                  let thiss = this;
                  this.$http.get('gp/php/login.php?name='+this.user+'&pwd='+this.pwd+'&type='+this.radio,that).then(function(data){
                      if(data.data){
                          console.log(data.data.id);
                          alert('登陆成功');
                          thiss.chu = false;
                          let can = {username:thiss.user,
                              password:thiss.pwd,
                              id:data.data.id,
                              type:thiss.radio,
                              sex:data.data.sex,
                              nickname:data.data.nickname,
                              desc:data.data.desc};
                          sessionStorage.setItem('user',thiss.user);
                          sessionStorage.setItem('pwd',thiss.pwd);
                          sessionStorage.setItem('id',data.data.id);
                          sessionStorage.setItem('type',thiss.radio);
                          sessionStorage.setItem('sex',data.data.sex);
                          sessionStorage.setItem('nickname',data.data.nickname);
                          sessionStorage.setItem('desc',data.data.desc);
                          console.log(thiss.$store.state.id);
                          thiss.$store.commit('LogingAgree',can);
                      }
                      else
                          alert('用户名或密码错误');
                  }).catch(function(error){
                      console.log(error);});
              }

          },
          check:function(){
            this.ok[0] = false;
            this.ok[1] = false;
            if(this.pwd1==''||this.pwd2=='')
              return;
            if(this.pwd1 == this.pwd2) {
              console.log("yes");
              this.ok[0] = true
            }
            else{
              console.log("no");
              this.ok[1] = true
            }
          },
            show:function () {
                this.chu = true;
            },
            cancel:function () {
                this.chu = false;
            },
            registe:function(){
                if(this.pwd1 == this.pwd2&&this.pwd1!='' && this.user1!=''){
                    let id;
                    let that = new FormData();
                    let thiss = this;
                    this.$http.get('gp/php/register.php?name='+this.user1+'&pwd='+this.pwd1+'&type='+this.radios,that).then(function(data){
                        if(data.data){
                            alert('注册成功');
                        }
                        else{
                            alert('用户名已存在');
                            thiss.user1 = '';
                            thiss.pwd1 = thiss.pwd2 = '';
                        }
                    }).catch(function(error){
                        console.log(error);});
                }
            }
        }
    }
</script>
