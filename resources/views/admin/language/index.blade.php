@extends('layouts.admin')
@section('content')

    <!--顶部导航 开始-->
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 训练管理
    </div>
    <!--顶部导航 结束-->

    <!--结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3>训练列表</h3>
            </div>
            <!--编辑导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/language/create')}}"><i class="fa fa-plus"></i>添加训练</a>
                    <a href="{{url('admin/language')}}"><i class="fa fa-recycle"></i>全部训练</a>
                    <a href="{{url('admin/language')}}"><i class="fa fa-refresh"></i>更新训练</a>
                </div>
            </div>
            <!--编辑导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">

                    <tr>
                        <th class="tc">ID</th>
                        <th>正确选项</th>
                        <th>错误选项1</th>
                        <th>错误选项2</th>
                        <th>上传时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach( $data as $v)
                        <tr>
                            <td class="tc">{{$v->lan_id}}</td>
                            <td>{{$v->lan_right}}</td>
                            <td>{{$v->lan_error1}}</td>
                            <td>{{$v->lan_error2}}</td>
                            <td>{{date('Y-m-d',$v->lan_time)}}</td>
                            <td>
                                <a href="{{url('admin/language/'.$v->lan_id.'/edit')}}">修改</a>
                                <a href="javascript:" onclick="delArt({{$v->lan_id}})">删除</a>
                            </td>
                        </tr>
                    @endforeach

                </table>

                <div class="page_list">
                    <!-- 分页实现 -->
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </form>
    <!--结果页面 列表 结束-->

    <style>
        .result_content ul li span {
            font-size: 15px;
            padding: 6px 12px;
        }
    </style>
    <script>
        function delArt(lan_id) {
            layer.confirm('您确定要删除该训练吗？', {
                btn: ['确定', '取消']
            }, function () {
                $.post("{{url('admin/language/')}}/" + lan_id, {
                    '_method': 'delete',
                    '_token': "{{csrf_token()}}"
                }, function (data) {
                    if (data.status == 0) {
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    } else {
                        layer.msg(data.msg, {icon: 5});
                    }
                })
            }, function () {

            })
        }
    </script>
@endsection