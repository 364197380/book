<template>
  <!--书架-->
  <div class="booktik contain contains">
    <div class="name">欢迎回来 {{$store.state.nickname}}</div>
    <div><books :dat = 'data' :type = '2'></books></div>
  </div>

</template>

<style>
  .booktik{
    font-size: 20px;
  }
  .name{
    font-weight: 700;
    font-size: 25px;
  }
</style>

<script>
  import books from'../books/books'
    export default {
        props: {},
        data() {
            return {
                data:null
            }
        },
        created:function(){
            let id = this.$store.state.id;
            console.log(id);
            let type = this.$store.state.type;
            let that = new FormData();
            let thiss = this;
            this.$http.get('gp/php/booktik.php?id='+id+'&type='+type,that).then(function(data){
                thiss.data = data.data;
                // console.log(data.data);
            }).catch(function(error){
                console.log(error);});
        },
      components:{
          books:books
      }
    }
</script>
