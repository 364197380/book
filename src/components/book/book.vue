<template>
  <div class="contain contains">
    <div v-show="false">{{a}}</div>
    <!--书籍详情-->
    <div class="book"  v-if="data">
      <div class="left"></div>
      <div class="right">

        <div>
          <span class="name">{{data.bookname}}</span>
          <span class="author">{{data.author}}&nbsp&nbsp著</span>
          <div class="midden">
            <span class="type">{{data.type}}</span>
          </div>
          <div class="desc">{{data.desc}}</div>
          <div class="floor">
            <div class="count">
              {{data.count}}<span>万字</span>
            </div>
            <div class="hit">
              {{data.hit}}<span>万总点击</span>
            </div>
          </div>
          <div class="bottom">
            <div class="read" >立即阅读</div>
            <div class="into" @click = "jiaru()">加入书架</div>
          </div>
        </div>
      </div>
      <div class="star">
        <div style="text-align:center">9.2</div>
        <div class="st">
          <ul>
           <li v-for="r in rating" class='glyphicon' :class="{'glyphicon-star':r,'glyphicon-star-empty':!r}"></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="zuopi">
      <div class="mulu" :class="{clic:hit[0]}" @click="hits(0)">目录</div>
      <div class="dicus" :class="{clic:hit[1]}" @click="hits(1)">作品讨论</div>
    </div>
    <div class="xiangqing">
      <!--小说章节-->
      <div class="mu" v-show="hit[0]">
        <div class="top">正文卷·共124卷</div>
        <div>
          <ul>
            <li v-for="datas in data.chapter" v-if ="data.chapter"><router-link :to="{path:'/read',query:{bid:data.bookid,tid:datas.book_text_id}}">{{datas.title}}</router-link></li>
          </ul>
        </div>
      </div>
      <div class="dic" v-show="hit[1]">
        <!--讨论区-->
        <div class="top">作品讨论区《{{data.bookname}}》</div>
        <div class="yap">
          <div v-show="yao" @click="yaoa()">
            <button class="btn btn-success">发表意见</button>
          </div>
          <div class="form-group" v-show="!yao">
            <label for="write">标题</label>
            <input type="text" id="write" class="form-control" v-model="title">
            <label for="write1">内容</label>
            <textarea cols="70" rows="10" class="form-control" id="write1" v-model="content"></textarea>
            <button @click="queding()" class="btn btn-default">发布</button>
            <button class="btn btn-default"  @click="yaoa()">取消</button>
         </div>
        </div>
        <div>
          <ul>
            <li v-for="dis in data.ratings">
              <div class="left"></div>
              <div class="right1">
                <div class="top1">{{dis.disename}}<span class="hah"> 发表了评论</span></div>
                <div class="center">
                  {{dis.content}}
                </div>
                <div class="bottom">
                  <span>{{dis.times}}</span>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
  .book .desc{
    font-size:20px;
    font-weight:100;
    line-height:23px;
    margin:15px 0;
    word-wrap: break-word;
  }
  .book{
    margin:30px 20px 30px 0;
    position:relative;
  }
  .book .left,.right{
    display:inline-block;
    width:150px;
    height:230px;
    vertical-align:top;
  }
  .book .left{
    background-color:grey;
    margin-right:20px;
  }
  .book .right{
    width:700px;
    position: relative;
  }
  .book .right .name{
    font-size: 30px;
    font-weight:700;
    height:35px;
    line-height:35px;
  }
  .author{
    margin-left:50px;
    font-size:18px;
  }
  .book .midden{
    margin:10px 0;
  }
  .type{
    font-size:15px;
    line-height:30px;
    border-radius:40%;
    border:rgba(255,0,0,.5) 1px solid;
    padding: 5px 10px;
    color:red;
  }
  .floor{
    margin:10px 0;
  }
  .floor .count,.floor .hit{
    display:inline-block;
    vertical-align:top;
    font-weight:700;
    margin-right:50px;
    position:relative;
    padding-right:30px;
    font-size:22px;
  }
  .floor .hit{
    padding-right:56px;
  }
  .floor span{
    vertical-align:center;
    font-size:10px;
    position:absolute;
    top:6px;
    right: 0;
    color:grey
  }
  .bottom{
    color:black
  }
  .bottom div{
    display:inline-block;
    margin-right: 20px;
  }
  .bottom .into{
    border:blue 1px solid;
    display:inline-block;
    padding:8px 20px;
    font-size:17px;
    width: 110px;
    cursor:pointer
  }
  .bottom .read{
    color:white;
    width: 110px;
    font-size:17px;
    padding:8px 20px;
    background-color:red;
    cursor:pointer
  }
  .star{
    position:absolute;
    font-size:35px;
    font-weight:700;
    top:0;
    right: 100px;
  }
  .glyphicon-star-empty{
    font-size: 22px;
    color:grey;
  }
  .glyphicon-star{
    font-size: 22px;
    color: #ffb935;
  }
  .zuopi{
    border-bottom:rgba(128,128,128,.5) 1px solid;
    margin-top:60px;
  }
  .zuopi div{
    display:inline-block;
    padding:10px 30px;
    color:grey;
    cursor:pointer;
  }
  .zuopi div:hover{
    color:red;
  }
  .zuopi .clic{
    border-bottom:red 1px solid;
    color:red;
  }
  .xiangqing{
    margin-top:80px;
    position:relative;
  }
  .mu,.dic{
    position:absolute;
    width:100%
   }
  .xiangqing .top{
    font-size: 22px;
    font-weight:700;
    border-bottom:grey 1px solid;
    padding-bottom:10px;
  }
  .mu ul{
    overflow: hidden;
  }
  .mu ul>li{
    float:left;
    width: 425px;
    border-bottom:rgba(128,128,128,.3) 1px solid;
    padding:10px 0;
  }
  .mu li a{
    font-size: 18px;
    text-decoration:none;
    color:black;
  }
  .mu li a:hover{
    color:red;
  }
  .dic ul{
    margin:30px 0;
  }
  .dic .left{
    border-radius:50%;
    background-color:grey;
    height:60px;
    width:60px;
    margin-right:10px;
  }
  .dic .left,.dic .right1{
    display:inline-block;
    vertical-align:top;
  }
  .dic ul>li{
    padding:10px 0;
    border-bottom:rgba(128,128,128,.3) 1px solid;
  }
  .dic{
    font-size: 15px;
  }
  .dic .right1{
    width: 700px;
  }
  .dic .top1{
    color:blue;
    margin-bottom: 10px;
  }
  .hah{
    color:grey;
    font-size: 13px;
  }
  .dic .center{
    font-size: 18px;
    margin-bottom: 15px;
    word-wrap:break-word;
  }
  .dic .bottom{
    color:grey;
  }
  textarea{
    resize:none
  }
  .form-control{
    width: 500px;
  }
  .yap{
    margin: 20px 0;
  }
</style>

<script>
    export default {
        props: {},
        data() {
            return {
              rating:[true,true,true,true,false],
              hit:[true,false],
              a:true,
              title:null,
              content:null,
              yao:true,
                data:null
            }
        },
        created:function(){
            let id;
            let that = new FormData();
            let thiss = this;
            id = this.$route.query.id;
            console.log(id);
            this.$http.get('gp/php/chapte.php?id='+id,that).then(function(data){
                thiss.data = data.data;
                console.log(data.data);
            }).catch(function(error){
                console.log(error);});
        },
      methods:{
          // tab切换
          hits:function(index){
            this.a = !this.a;
            this.hit[0] = this.hit[1] = false;
            this.hit[index] = true;
          },
          // 评论
          queding:function(){
            if(this.title != null&&this.content != null){
                let that = new FormData();
                let thiss = this;
                let id = this.$route.query.id;
                console.log(id);
                this.$http.get('gp/php/rating.php?id='+id+'&title='+this.title+'&content='+this.content+'&name=haha',that).then(function(data){
                    thiss.yao = true;
                    thiss.a = !thiss.a;
                    thiss.data.ratings.push({title:thiss.title,content:thiss.content,data:'2018-5-5',name:'haha'});
                    thiss.title = '';
                    thiss.content = '';
                }).catch(function(error){
                    console.log(error);})
            }
            else
              alert('请完整的输入内容')
          },
          yaoa:function(){
            this.yao = !this.yao;
          },
          // 加入书架
          jiaru:function () {
              let userid  = this.$store.state.id;
              let that = new FormData();
              let thiss = this;
              let id = this.$route.query.id;
              console.log(id);
              this.$http.get('gp/php/jiaru.php?bookid='+id+'&userid='+userid+'&type='+this.$store.state.type,that).then(function(data){
                  console.log(data.data);
              }).catch(function(error){
                  console.log(error);})
          }
      }
    }
</script>
