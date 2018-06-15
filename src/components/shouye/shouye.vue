<template>
    <div class="contains contain">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators轮播指标 -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides 轮播项目-->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="./uuuuu.jpg" alt="...">
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="./u=751086591,3109780881&fm=27&gp=0.jpg" alt="...">
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="./u=3085166675,667273056&fm=27&gp=0.jpg" alt="...">
                    <div class="carousel-caption">

                    </div>
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "shouye",
        data:function () {
            return{

            }
        }
    }
</script>

<style >
    .carousel {
        height: 400px;
        width: 900px;
        margin:50px auto
    }
    .carousel .item {
        height: 400px;
        width: 100%;
    }
    .carousel .item img {
        width: 100%;
    }
    .carousel .right{
        height: 400px;
    }
</style>