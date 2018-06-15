<template>
    <div class="contain contains" id="author">
    <div v-show="false">{{a}}</div>
    <div class="name">欢迎回来,{{$store.state.nickname}}</div>
    <div class="zuopi">
      <div class="mulu" :class="{clic:hit[0]}" @click="hits(0)">小说目录</div>
      <div class="dicus" :class="{clic:hit[1]}" @click="hits(1)">发布新书</div>
    </div>
    <div class="one" v-show="hit[0]">
      <ul class="bookli" v-if="data!={}">
        <li class="books" v-for = "(datas,index) in data">
          <div class="lefts"></div>
          <div class="right">
            <div>
              <span class="name">{{datas.bookname}}</span>
                <span class="type">{{datas.type}}</span>
              </div>
              <div class="desc">{{datas.bookdesc}}</div>
              <div class="bottomss">
                <div class="up" @click="geng(index)">更新章节</div>
              </div>
          </div>
          <div class="u" v-show = "show[index]">
            <update :bid="datas.bookid"></update>
          </div>
        </li>
      </ul>
    </div>
    <div class="two contain" v-show="hit[1]">
      <div class="form-group" >
      <label for="write">书名</label>
      <input type="text" id="write" class="form-control" v-model='name'>
        <label for="type">类型</label>
        <select id="type" class="ty" @change="selec($event)">
          <option value="1">玄幻</option>
          <option value="2">武侠</option>
          <option value="3">都市</option>
          <option value="4">奇幻</option>
          <option value="5">仙侠</option>
          <option value="6">现实</option>
          <option value="7">军事</option>
          <option value="8">历史</option>
          <option value="9">科幻</option>
          <option value="10">体育</option>
          <option value="11">女生</option>
        </select>
        <div><label for="write1">简介</label></div>
        <textarea cols="70" rows="10" class="form-control" id="write1" v-model='desc'></textarea>
        <button @click="queding()" class="btn btn-default">发布</button>
        <button class="btn btn-default"  @click="cancel()">取消</button>
      </div>
    </div>
    </div>
</template>

<style>
  .books .lefts{
    background-color:grey;
    margin-right:20px;
    height: 200px;
    display:inline-block;
    width:150px;
    vertical-align:top;
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
  .up{
    border:blue 1px solid;
    display:block;
    padding:8px 20px;
    font-size:17px;
    cursor:pointer;
  }
  .one,.two{
    position:absolute;
  }
  textarea{
    resize:none
  }
  .ty{
    margin: 20px 0;
  }
  .u{
    margin-top: 20px;
  }
  .one .bottomss{
    position: absolute;
    bottom: 30px;
  }
</style>

<script>
  import update from'@/components/author/update'
  import axios from'axios'
  import Vue from 'vue'
  Vue.prototype.$http = axios;

    export default {
        props: {},
        data() {
            return {
              hit:[true,false],
              a:true,
              type:1,
              name:'',
              desc:'',
              data:{},
                show:[],
            }
        },
      components:{
          update:update
      },
        created:function(){
            let id;
            let that = new FormData();
            let thiss = this;
            id = this.$route.query.uid;
            console.log(id);
            this.$http.get('gp/php/author.php?uid='+this.$store.state.id,that).then(function(data){
                thiss.data = data.data;
                console.log(data.data);
                for(let i = 0,len = thiss.data.length;i<len;i++){
                    thiss.show[i] = false;
                }
            }).catch(function(error){
                console.log(error);});
        },
      methods: {
        hits: function (index) {
          this.a = !this.a;
          this.hit[0] = this.hit[1] = false;
          this.hit[index] = true;
        },
        selec:function(e){
          this.type = e.target.value;
         console.log(this.type);
        },
        queding:function(){
//          console.log(this.name);
          this.a = !this.a;
          // this.hit[1] = false;
          // this.hit[0] = true;
            console.log(this.name);
          if(this.name!=''&&this.desc!=''&&this.type!=''){
              console.log(this.name);
              let id;
              let that = new FormData();
              let thiss = this;
              id = this.$route.query.id;
              console.log(id);
              this.$http.get('gp/php/fabu.php?id='+this.$store.state.id+'&bookname='+this.name+'&desc='+this.desc+'&typeid='+this.type).then(function(data){
              }).catch(function(error){
                  console.log(error);});
          }
        },
        cancel:function(){
          this.a = !this.a;
          this.hit[1] = false;
          this.hit[0] = true
        },
        geng:function(index){
            this.a = !this.a;
            this.show[index] = !this.show[index];
        }
      }
    }
</script>
