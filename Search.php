<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" xmlns:display="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js"

            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js"

            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js"

            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/Search.css"  media="all"/>
    <meta charset="UTF-8">
    <title>Search</title>
</head>
<body>
<header id="header1" class="container-fluid">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark row fixed-top">
        <!-- Brand -->
        <a class="navbar-brand col-sm-4" href="#" id="h2">Art Store
            <span id="span2">Shopping for happiness</span>
        </a>

        <!-- Links -->
        <ul class="navbar-nav col-sm-8">
            <li class="nav-item col-sm-2">
                <a class="nav-link" href="Home.html">首页</a>
            </li>
            <li class="nav-item col-sm-2">
                <a class="nav-link" href="Details.html">详情</a>
            </li>
            <li class="nav-item col-sm-2">
                <a class="nav-link" href="#">发布艺术品</a>
            </li>
            <li class="nav-item col-sm-2">
                <a class="nav-link" href="LogIning.html">注册</a>
            </li>
        </ul>
    </nav>
</header><br>

<main class="container-fluid">
    <form class="row" id="shiftLine">
        <div class="col-sm-9"></div>
        <label class="col-sm-2">
            <input type="search" name="googlesearch">
            <a href="Check.html">
                <input type="button" value="搜索">
            </a>
        </label>
    </form>

    <div class="row">
        <h2 id="h4" class="col-sm-7">搜索结果：</h2>
        <form id="former">
            排序方式：
            <label>
                <input type="radio" name="sex" value="male" checked>价格
            </label>
            <label>
                <input type="radio" name="sex" value="male" checked>热度
            </label>
            <label>
                <input type="radio" name="sex" value="male" checked>标题
            </label>
        </form>
    </div>

    <div id="div2" class="row text-center">
        <div class="div3 col-sm-3">
            <img src="images/works/square-small/096030.jpg" class="img1">
            <div class="div4">
                <p>A Man with...</p>
                <p>Paul Cézanne</p>
                <p>The portrait was eloquently described by Paul Cézanne</p>
            </div>
            <button type="button" onclick="" class="btn btn-outline-secondary">查看</button>
            <button type="button" onclick="" class="btn btn-outline-secondary">热度：0</button>
        </div>

        <div class="div5 col-sm-3">
            <img src="images/works/square-small/096040.jpg" class="img1">
            <div class="div4">
                <p>A Sunday...</p>
                <p>Paul Cézanne</p>
                <p>Seurat spent over two years painting. A Sunday</p>
            </div>
            <button type="button" onclick="" class="btn btn-outline-secondary">查看</button>
            <button type="button" onclick="" class="btn btn-outline-secondary">热度：0</button>
        </div>

        <div class="div6 col-sm-3">
            <img src="images/works/square-small/096010.jpg" class="img1">
            <div class="div4">
                <p>Abstract S...</p>
                <p>Paul Cézanne</p>
                <p>It has been proposed that Abstract Spend + Sou</p>
            </div>
            <button type="button" onclick="" class="btn btn-outline-secondary">查看</button>
            <button type="button" onclick="" class="btn btn-outline-secondary">热度：0</button>
        </div>


        <div class="div3 col-sm-3">
            <img src="images/works/square-small/001050.jpg" class="img1">
            <div class="div4">
                <p>Acrobat an...</p>
                <p>Paul Cézanne</p>
                <p>There is no introduction for this art</p>
            </div>

            <button type="button" onclick="" class="btn btn-outline-secondary">查看</button>
            <button type="button" onclick="" class="btn btn-outline-secondary">热度：0</button>
        </div>

        <div class="div5 col-sm-3">
            <img src="images/works/square-small/002030.jpg" class="img1">
            <div class="div4">
                <p>Ad Parnassum</p>
                <p>Paul Cézanne</p>
                <p>There is no introduction for this art</p>
            </div>

            <button type="button" onclick="" class="btn btn-outline-secondary">查看</button>
            <button type="button" onclick="" class="btn btn-outline-secondary">热度：0</button>
        </div>

        <div class="div6 col-sm-3">
            <img src="images/works/square-small/002040.jpg" class="img1">
            <div class="div4">
                <p>Adoration...</p>
                <p>Paul Cézanne</p>
                <p>Adoration in the Forest is a pai...</p>
            </div>

            <button type="button" onclick="" class="btn btn-outline-secondary">查看</button>
            <button type="button" onclick="" class="btn btn-outline-secondary">热度：0</button>
        </div>


        <div class="div3 col-sm-3">
            <img src="images/works/square-small/005010.jpg" class="img1">
            <div class="div4">
                <p>Adoration...</p>
                <p>Paul Cézanne</p>
                <p>The Adoration of the Magi is a painting b...</p>
            </div>

            <button type="button" onclick="" class="btn btn-outline-secondary">查看</button>
            <button type="button" onclick="" class="btn btn-outline-secondary">热度：0</button>
        </div>

        <div class="div5 col-sm-3">
            <img src="images/works/square-small/005050.jpg" class="img1">
            <div class="div4">
                <p>Age of Inn...</p>
                <p>Paul Cézanne</p>
                <p>The age of Innocence is an oil on canvas...</p>
            </div>

            <button type="button" onclick="" class="btn btn-outline-secondary">查看</button>
            <button type="button" onclick="" class="btn btn-outline-secondary">热度：0</button>
        </div>

        <div class="div6 col-sm-3">
            <img src="images/works/square-small/006030.jpg" class="img1">
            <div class="div4">
                <p>Alba Madonna</p>
                <p>Paul Cézanne</p>
                <p>The Alba Madonna is a painting by the It's</p>
            </div>

            <button type="button" onclick="" class="btn btn-outline-secondary">查看</button>
            <button type="button" onclick="" class="btn btn-outline-secondary">热度：0</button>
        </div>
    </div>

    <nav class="text-center">
        <ul class="pagination">
            <li><a href="#">«</a></li>
            <li><a href="#" class="active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">7</a></li>
            <li><a href="#">8</a></li>
            <li><a href="#">9</a></li>
            <li><a href="#">10</a></li>
            <li><a href="#">11</a></li>
            <li><a href="#">12</a></li>
            <li><a href="#">13</a></li>
            <li><a href="#">14</a></li>
            <li><a href="#">15</a></li>
            <li><a href="#">16</a></li>
            <li><a href="#">17</a></li>
            <li><a href="#">18</a></li>
            <li><a href="#">19</a></li>
            <li><a href="#">20</a></li>
            <li><a href="#">21</a></li>
            <li><a href="#">22</a></li>
            <li><a href="#">23</a></li>
            <li><a href="#">24</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </nav>
</main>

</body>
</html>
