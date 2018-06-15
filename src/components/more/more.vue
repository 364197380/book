<template>
  <div class="more contain contains">
    <div class="booklie">
      <ul>
        <li class="book">
          <div class="a">
            <div class="left"></div>
            <div class="right">
              <div>
                <div class="name">圣墟</div>
                <div class="midden">
                  <span class="author">辰东</span>
                  <span class="type">玄幻</span>
                  <span class="status">连载中</span>
                </div>
                <div class="desc">在破败中崛起，在寂灭中复苏。沧海成尘，雷电枯竭，那一缕幽雾又一次临近大地，世间的枷锁被打开了，一个全新的世界就此揭开神秘的一角……</div>
              </div>
              <div class="count"><router-link to="#">最新更新 阴阳篇<span class="new">2018-04-24 11:49</span></router-link></div>
            </div>
          </div>
          <div class="b">
              <div class="lef"><router-link to="/rank/book">书籍详情</router-link></div>
              <div class="righ"><router-link to="#">加入书架</router-link></div>
          </div>
        </li>
      </ul>
      <div class="step">
        <ul>
          <li :class="{stepon:stepbs[0]}" @click='nextstep(step[0])'>{{step[0]}}<span v-show="steps>=5">...</span></li>
          <li :class="{stepon:stepbs[1]}" @click='nextstep(step[1])'>{{step[1]}}</li>
          <li :class="{stepon:stepbs[2]}" @click='nextstep(step[2])'>{{step[2]}}</li>
          <li :class="{stepon:stepbs[3]}" @click='nextstep(step[3])'>{{step[3]}}</li>
          <li :class="{stepon:stepbs[4]}" @click='nextstep(step[4])'>{{step[4]}}</li>
          <li :class="{stepon:stepbs[5]}" @click='nextstep(step[5])'>{{step[5]}}</li>

        </ul>
      </div>
    </div>
  </div>
</template>

<style scoped>
  .more{
    padding-bottom: 80px;
  }
  .booklie{
    overflow: hidden;
  }
  .book .desc{
    font-size:15px;
    font-weight:100;
    line-height:20px;
  }
  .book .count{
    position:absolute;
    font-size:15px;
    bottom: 0;
  }
  .book{
    margin:30px 20px 30px 0;
  }
  .book .left,.right{
    display:inline-block;
    width:130px;
    height:160px;
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
    font-size: 20px;
    font-weight:700;
    height:35px;
    line-height:35px;
  }
  .book .midden{
    font-size:15px;
    color:grey;
    height:35px;
    line-height:35px;
  }
  .step{
    position:absolute;
    bottom:20px;
    right: 50px;
  }
  .step ul{
    overflow: hidden;
  }
  .step ul li{
    float:left;
    margin-right: 10px;
    cursor:pointer;
    width: 25px;
    height:25px;
    line-height:25px;
    text-align:center;
  }
  .stepon{
    background:red;
    color:white;
  }
  .a{
    display:inline-block;
    vertical-align:bottom;
    margin-right:100px;
  }
  .b{
    display:inline-block;
    vertical-align:bottom;
  }
  .b .righ,.b .lef{
    display:inline-block;
    vertical-align:center;
    font-size:16px;
  }
  .b .lef a{
    display:block;
    padding:10px 15px;
    background-color:red;
    color:white;
    margin-right:20px;
    text-decoration:none;
  }
  .b .righ a{
    display:block;
    padding:10px 15px;
    border:blue 1px solid;
    text-decoration:none;
  }
  .new{
    color:grey;
    margin-left:20px;
  }
</style>

<script>
    export default {
        props: {},
        data() {
            return {
              step:[1,2,3,4,5,6],
              steps:0,
              stepbs:[true,false,false,false,false,false],
            }
        },
        methods:{
          nextstep:function(st){
            this.a=!this.a;
            this.steps=st;
            for(let i = 0,count = this.stepbs.length;i<count;i++){
              this.stepbs[i] = false;
            }
            if (st >= 5) {
              this.stepbs[3] = true;
              this.step[3] = st;
              this.step[2] = st - 1;
              this.step[1] = st - 2;
              this.step[4] = st + 1;
              this.step[5] = st + 2;
            }
            else {
              this.step = [1, 2, 3, 4, 5, 6];
              this.stepbs[st - 1] = true;
            }
          }
        }
    }
</script>
