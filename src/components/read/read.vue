<template>
  <div class="read" v-if="data">
    <div class="contain contains">
      <div class="cont">
        <div class="title">
          <div class="title" >
            <div class="title">{{data.bookname}}</div>
          </div>
          <div class="title">{{data.title}}</div>
          <span>作者：{{data.author}}</span>
          <span>更新于：{{data.updatet}}</span>
        </div>
        <div class="content" ref='con'>
        </div>
        <div class="bottomer">
          <button class="btn btn-default left" v-show = 'parseInt(this.$route.query.tid) > 1' @click="forback()">上一章</button>
          <button class="btn btn-default center" @click="mulu()">目录</button>
          <button class="btn btn-default right" @click="next()" v-if = 'parseInt(this.$route.query.tid) < data.now '>下一章 </button>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
  .read{
    padding-bottom: 50px;
  }
  .title{
    text-align:center;
    font-size:30px;
    font-weight:700;
    margin-bottom:50px;
  }
  p{
    text-indent:2em;
    line-height: 40px;
    font-size: 22px;
  }
  .content{
    padding-bottom:50px;
  }
  .cont{
    padding:0 70px;
  }
  .title span{
    font-size: 20px;
    font-weight: 100;
  }
  .bottomer{
    position:relative;
    width:100%;
    height: 100px;
  }
  .bottomer .left,.bottomer .right,.bottomer .center{
    position:absolute;
    width: 130px;
    height: 30px;
  }
  .bottomer .center{
    left: 450px;
   }
  .bottomer .right{
    right: 50px;
  }
</style>

<script>
    export default {
        props: {},
        data() {
            return {
              message:null,
                data:null,
                now:0
            }
        },
        created:function(){
            let id;
            let bookid = this.$route.query.bid;
            let that = new FormData();
            let thiss = this;
            id = this.$route.query.tid;
            id = '?btid='+id+'&bookid='+bookid;
            this.$http.get('gp/php/text.php'+id,that).then(function(data){
                thiss.data = data.data;
                thiss.message = thiss.data.content;
                thiss.now = data.data.now;
                let patt = new RegExp('\n\n',"g");
                let result;
                while ((result = patt.exec(thiss.message)) != null) {
                    thiss.message = thiss.message.replace('\n\n','<br><p>');
                }
                thiss.message = '<p>'+thiss.message;
            }).catch(function(error){
                console.log(error);});
            if(sessionStorage.getItem('user')){
                let can = {
                    username:sessionStorage.getItem('user'),
                    password:sessionStorage.getItem('pwd'),
                    id:sessionStorage.getItem('id'),
                    type:sessionStorage.getItem('type'),
                    sex:sessionStorage.getItem('sex'),
                    nickname:sessionStorage.getItem('nickname'),
                    desc:sessionStorage.getItem('desc')
                };
                this.$store.commit('LogingAgree',can);
            }
        },
        mounted:function(){
            let that = this;
            let hh = setInterval(function(){
                if(that.message!=null){
                    that.$refs['con'].innerHTML = that.message;
                    clearInterval(hh);
                }
            },200)
        },
        methods:{
            next:function(){
                let id = parseInt(this.$route.query.tid)+1;
                this.$router.push({path:'/read',query:{bid:this.$route.query.bid,tid:id}});
                sessionStorage.setItem('user',this.$store.state.username);
                sessionStorage.setItem('pwd',this.$store.state.password);
                sessionStorage.setItem('id',this.$store.state.id);
                sessionStorage.setItem('type',this.$store.state.type);
                sessionStorage.setItem('sex',this.$store.state.sex);
                sessionStorage.setItem('nickname',this.$store.state.nickname);
                sessionStorage.setItem('desc',this.$store.state.desc);
                location.reload();
            },
            forback:function(){
                let id = parseInt(this.$route.query.tid)-1;
                this.$router.push({path:'/read',query:{bid:this.$route.query.bid,tid:id}});
                sessionStorage.setItem('user',this.$store.state.username);
                sessionStorage.setItem('pwd',this.$store.state.password);
                sessionStorage.setItem('id',this.$store.state.id);
                sessionStorage.setItem('type',this.$store.state.type);
                sessionStorage.setItem('sex',this.$store.state.sex);
                sessionStorage.setItem('nickname',this.$store.state.nickname);
                sessionStorage.setItem('desc',this.$store.state.desc);
                location.reload();
            },
            mulu:function(){
                this.$router.push({path:'/book',query:{id:this.$route.query.bid}});
            },
            read:function () {

            }
        }
    }
</script>
