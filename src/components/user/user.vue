<template>
    <div class="user contain contains">
        <div v-show="false">{{a}}</div>
        <div class="mulu">
            <ul >
                <li :class="{acti:ha[0]}" @click = "clicks(0)">我的信息</li>
                <li :class="{acti:ha[1]}" @click = "clicks(1)">修改信息</li>
            </ul>
        </div>
        <div class="xinxi" >
            <div class="xinxi" v-show="show[1]">
                <div class="name">
                    <div class="row">
                        <label for="writex" class="col-xs-2" >昵称:</label>
                        <input type="text" id="writex" class="col-xs-7"  v-model="name">
                    </div>
                </div>
                <div class="desc">
                    <div class="row">
                        <label for="write1" class="col-xs-2">个性签名:</label>
                        <textarea id = "write1" rows="2" cols="2" class="col-xs-7"  v-model="qianming"></textarea>
                    </div>
                </div>
                <div class="row">
                    <span class="col-xs-2 sex">性别：</span>
                    男：<input type="radio" value="男" v-model="sex">&nbsp&nbsp&nbsp
                    女：<input type="radio" value="女" v-model="sex">
                </div>
                <div>
                    <button class="btn btn-default" @click="sub()">提交</button>
                </div>
            </div>
            <div class="geren" v-show="show[0]">
                <div class="avata"></div>
                <div class="nickname">{{this.$store.state.nickname}}</div>
                <div class="secc">{{this.$store.state.sex}}</div>
                <div class="qian">{{this.$store.state.desc}}</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data:function(){
            return{
                id:'',
                ha:[true,false],
                a:true,
                sex:'',
                qianming:'',
                name:'',
                show:[true,false]
            }
        },
        created:function () {
            this.id = this.$store.state.id;
        },
        methods:{
            clicks:function (index) {
                this.a = !this.a;
                this.ha[0] = this.ha[1] = false;
                this.show[0] = this.show[1] = false;
                this.ha[index] = this.show[index] = true;
            },
            sub:function () {
                let that = new FormData();
                let thiss = this;
                this.$http.post('gp/php/xinxi.php?id='+this.$store.state.id+'&name='+this.name+'&sex='+this.sex+'&desc='+this.qianming+'&type='+this.$store.state.type,that).then(function(data){
                    let can = {
                        sex:thiss.sex,
                        desc:thiss.qianming,
                        nickname:thiss.name
                    };
                    thiss.$store.commit('update',can)
                }).catch(function(error){
                    console.log(error);});
            }
        }
    }
</script>

<style>
    .user{
        font-size: 20px;
        display:flex;
        justify-content:space-between;
    }
    .mulu{
        flex:1;
    }
    .xinxi{
        flex: 4;
        padding:0 100px;
    }
    .user .mulu li{
        border:1px black solid;
        padding: 5px 18px;
        cursor:pointer;
        margin-bottom: 15px;
        box-shadow:10px 10px 10px grey;
    }
    .user .mulu .acti{
        box-shadow:5px 5px 10px grey;
    }
    textarea{
        resize:none;
    }
    .xinxi>div{
        padding-bottom: 50px;
    }
    .sex{
        font-weight: 700;
    }
    .xinxi button{
        width: 100px;

    }
    .geren .avata{
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
        width: 100px;
        height: 100px;
        background-color:grey;
    }
    .geren .nickname{
        text-align:center;
        margin: 0 auto 50px;
    }
    .geren>div{
        margin: 0 auto 50px;
    }
    .geren .qian{
        text-align:center;
        word-wrap:break-word;
    }
    .geren .secc{
        text-align:center;
    }
</style>