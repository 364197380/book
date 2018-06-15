<template>
  <div class="contain contains complete">
    <div class="sort">
      <div v-show="false">{{a}}</div>
      <ul>
        <li :class="{ activ:type[0]}" @click="sorts('renqi',0)">人气排序</li>
        <li :class="{ activ:type[1]}" @click="sorts('updatetime',1)">更新时间</li>
        <li :class="{ activ:type[2]}" @click="sorts('shouc',2)">总收藏</li>
        <li :class="{ activ:type[3]}" @click="sorts('count',3)">总字数</li>
        <li :class="{ activ:type[4]}" @click="sorts('hits',4)">点击量</li>
      </ul>
    </div>
    <div class="booklie" v-if = 'data'>
      <ul>
        <li class="book" v-for=" datas in data">
          <router-link :to="{path:'/book',query:{id:datas.bookid}}"><div class="lft"></div></router-link>
          <div class="rght">
            <div>
              <div class="nme">{{datas.bookname}}</div>
              <div class="mdden">
                <span class="athor">{{datas.author}}</span>
                <span class="tpe">{{datas.type}}</span>
                <span class="satus">{{datas.state}}</span>
              </div>
              <div class="dsc">{{datas.desc}}</div>
            </div>
            <div class="cunt">{{datas.count}} 万字</div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<style scoped>
  .complete{
    position: relative;
    padding-bottom: 80px;
  }
  .all{
    position: relative;
    padding-bottom: 80px;
  }
  .sort ul>li{
    color:grey;
    font-size:16px;
    float:left;
    margin-right:30px;
    cursor:pointer;
  }
  .all{
    position: relative;
    padding-bottom: 80px;
  }
  .sort ul>li{
    color:grey;
    font-size:16px;
    float:left;
    margin-right:30px;
    cursor:pointer;
  }
  .sort>ul{
    overflow: hidden;
  }
  .booklie>ul .book{
    float: left;
    margin:30px 20px 30px 0;
    width:600px;
  }
  .booklie>ul .book .lft,.rght{
    display:inline-block;
    width:130px;
    height:160px;
    vertical-align:top;
  }
  .booklie>ul .book .lft{
    background-color:grey;
    margin-right:20px;
  }
  .booklie>ul .book .rght{
    width:300px;
    position: relative;
  }
  .booklie>ul .book .right .nme{
    font-size: 20px;
    font-weight:700;
    height:35px;
    line-height:35px;
  }
  .booklie>ul .book .mdden{
    font-size:15px;
    color:grey;
    height:35px;
    line-height:35px;
  }
  .booklie>ul .book .dsc{
    font-size:15px;
    font-weight:100;
    line-height:20px;
    word-wrap: break-word;
  }
  .booklie>ul .book .cunt{
    position:absolute;
    font-size:15px;
    color:grey;
    bottom: 0;
  }
  .sort ul .activ{
    color: #ff3845;
    font-size:18px;
    font-weight:700
  }
</style>

<script>
    export default {
        props: {},
        data() {
            return {
              sort:'renqi',
              type:[true,false,false,false,false],
              a:true,
              data:{}
            }
        },
        created:function(){
            let that = new FormData();
            let thiss = this;
            this.$http.post('gp/php/complete.php',that).then(function(data){
                thiss.data = data.data;
                console.log(data.data);
            }).catch(function(error){
                console.log(error);});
            this.step=[1,2,3];
            this.stepbs=[true,false,false]
        },
      methods:{
        sorts:function(sot,id){
          this.a = !this.a;
          let i;
          let count;
          this.sort = sot;
          for(i = 0,count = this.type.length;i<count;i++){
            this.type[i] = false;
          }
          this.type[id] = true;
          console.log(this.type[id]);
        }
      }
    }
</script>
