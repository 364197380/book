<template>
  <div class="contain contains">
    <div class="search">
      搜索 <span class="sec">{{this.$route.query.sec}}</span> 所得的结果
    </div>
    <div>
      <books :dat="data" :type="1"></books>
    </div>
  </div>
</template>

<style>
  .search{
    margin-bottom: 20px;
  }
    .sec{
        color:red;
    }
</style>

<script>
  import books from'../books/books'
    export default {
        props: {},
        data() {
            return {
                data:{}
            }
        },
        created:function(){
            let that = new FormData();
            let thiss = this;
            this.$http.get('gp/php/search.php?sec='+this.$route.query.sec,that).then(function(data){
                thiss.data = data.data;
                console.log(data.data);
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
      components:{
        books:books
      },
        watch:{

        }
    }
</script>
