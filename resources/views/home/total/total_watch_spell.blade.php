<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no user-scalable=no">
    <script src="{{url('https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js')}}"></script>
    <script src="{{url('https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{url('https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('resources/views/home/css/style.css')}}" type="text/css">
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
    <title>短语详解</title>
</head>
<body>
<nav class="navbar">
    <div class="top_bg">
        <span>
            <a href="{{url('/')}}"><img src="/resources/views/home/img/picture.jpg" alt="" class="top_img"></a>
            <a href="{{url('/train_conf')}}" class="btn btn-primary" id="conf_all" role="button" target="_top">
                <p class="conf_name">{{$topic->top_name}}</p>
            </a>
                <a href="{{url('/setting')}}" class="top_a"><img src="/resources/views/home/img/user.png" alt=""
                                                                 class="top_user"></a>
        </span>
    </div>
</nav>
<section>
    <div class="container" id="con_bottom2" style="margin-left: 0px;">
        <div>
            <h3 class="ws_name">{{$total[$id]->ws_mean}}</h3>
            <h3 class="ws_name2">{{$total[$id]->ws_name}}</h3>
        </div>
        <div>
            @if(session('right')==0)
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(1)">{{$total[$id]->ws_right}}</a>
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(0)">{{$total[$id]->ws_error1}}</a>
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(0)">{{$total[$id]->ws_error2}}</a>
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(0)">{{$total[$id]->ws_error3}}</a>
            @elseif(session('right')==1)
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(0)">{{$total[$id]->ws_error1}}</a>
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(1)">{{$total[$id]->ws_right}}</a>
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(0)">{{$total[$id]->ws_error2}}</a>
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(0)">{{$total[$id]->ws_error3}}</a>
            @elseif(session('right')==2)
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(0)">{{$total[$id]->ws_error1}}</a>
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(0)">{{$total[$id]->ws_error2}}</a>
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(1)">{{$total[$id]->ws_right}}</a>
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(0)">{{$total[$id]->ws_error3}}</a>
            @elseif(session('right')==3)
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(0)">{{$total[$id]->ws_error1}}</a>
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(0)">{{$total[$id]->ws_error2}}</a>
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(0)">{{$total[$id]->ws_error3}}</a>
                <a href="javascript:" target="_top" class="btn btn-primary" id="chose2" role="button"
                   onclick="check(1)">{{$total[$id]->ws_right}}</a>
            @endif
        </div>
    </div>
    <div class="container">
        @if($id == 1)

            <a href="{{url('total_all/'.$topic->top_id.'_'.$id)}}" target="_top"
               class="btn btn-primary"
               id="word_left2"
               role="button">None</a>
        @else
            <?php $n = $id - 1?>
            <a href="{{url('total_all/'.$topic->top_id.'_'.$n)}}" target="_top"
               class="btn btn-primary"
               id="word_left2"
               role="button"><span class="glyphicon glyphicon-arrow-left" style="color: #666;">　</span>previous</a>
        @endif
        @if($id==18)
            <a href="{{url('total_all/'.$topic->top_id.'_'.$id)}}" target="_top"
               class="btn btn-primary"
               id="word_right2"
               role="button">None<span class="glyphicon glyphicon-arrow-right" style="color: #666;"></span></a>
        @else
            <?php $m = $id + 1?>
            <a href="{{url('total_all/'.$topic->top_id.'_'.$m)}}" target="_top"
               class="btn btn-primary"
               id="word_right2"
               role="button">next one&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-arrow-right" style="color: #666;"></a>
        @endif
    </div>
</section>
<?php session(['next' => $id + 1])?>
<section>
    <div class="col-md-12" style="padding: 0;">
        <div class="container" style="padding: 0;">
            <div class="col-md-6">
                <a href="{{url('/')}}" target="_top" class="btn btn-primary"
                   id="read_all"
                   role="button">返回首页</a>
            </div>
            <div class="col-md-6">
                <a href="{{url('top_total/'.$get_text_id->text_id)}}" target="_top" class="btn btn-primary"
                   id="read_all"
                   role="button">返回列表</a>
            </div>
        </div>
    </div>
</section>
<script>
    function check(flag) {
        if (flag == 1) {
            layer.msg('&nbsp;right!&nbsp;&nbsp;&nbsp;选择正确！', {icon: 6, time: 1500});

            window.setInterval(function () {
                window.location.href = "{{url('total_all/'.$topic->top_id.'_'.session('next'))}}";
            }, 1500);

        }
        else {
            layer.msg('&nbsp;wrong!&nbsp;&nbsp;&nbsp;选择错误！', {icon: 5, time: 1500});
        }
    }
</script>
</body>
</html>