<template>
  <div>
    <!--小说模板-->
    <div class="tik">
      <ul>
        <li class="books" v-if="dat" v-for="datas in dat">
          <router-link :to="{path:'/book',query:{id:datas.bookid}}"> <div class="left"><div class="update">更新</div></div></router-link>
          <div class="right">
            <div>
              <span class="name">{{datas.bookname}}</span>
              <span class="author">{{datas.author}}&nbsp&nbsp著</span>
              <div class="midden">
                <span class="type">{{datas.typename}}</span>
              </div>
              <div class="desc">{{datas.bookdesc}}</div>
              <div class="chapte">2天前更新&nbsp&nbsp已更新至{{datas.nowtit}}</div>
              <div class="bottom" v-if ="type == '2'">
                <div class="red"><router-link :to="{path:'/read',query:{bid:datas.bookid,tid:datas.read_id}}">继续阅读</router-link></div>
                <div class="into">取消书架</div>
              </div>
              <div class="bottom" v-else>
                <div class="red"><router-link :to="{path:'/read',query:{bid:datas.bookid,tid:1}}">点击阅读</router-link></div>
                <div class="into">加入书架</div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<style >
  .bottom .into{
    border:blue 1px solid;
    display:inline-block;
    padding:8px 20px;
    font-size:17px;
    width: 110px;
    cursor:pointer
  }
  .bottom .red a{
    color:white;
    display:block;
    font-size:17px;
    background-color:red;
    border:none
  }
</style>

<script>
    export default {
        props: {
            dat:{},
            type:null
        },
        data() {
            return {}
        },
        created:function () {
            console.log(this.dat);
        }
    }
</script>
