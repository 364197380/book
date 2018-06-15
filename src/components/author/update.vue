<template>
  <div>
    <div class="form-group" >
      <label for="ved">标题</label>
      <input type="text" id="ved" class="form-control" v-model='title'>
      <div><label for="tes">内容</label></div>
      <textarea cols="70" rows="10" class="form-control" id="tes" v-model='content'></textarea>
      <button class="btn btn-default" @click="re()">确定</button>
      <button class="btn btn-default"  @click="cancel()">取消</button>
    </div>
  </div>
</template>

<style>

</style>

<script>
    export default {
        props: {
          bid:''
        },
        data() {
            return {
              title:'',
              content:'',
                id:null,
            }
        },
      methods:{
          re:function(){
              if(this.title != '' && this.content != '' ){
                  this.title =  this.title.toString();
                  this.content = this.content.toString();
                  let that = new FormData();
                  let text = '?id='+this.bid+'&title='+this.title+'&content='+this.content;
                  this.$http.get('gp/php/updata.php'+text,that).then(function(data){
                      console.log(data.data);
                  }).catch(function(error){
                      console.log(error);});
              }
              else
                  console.log("请输入");
          },
          cancel:function(){
          }
      }
    }
</script>
