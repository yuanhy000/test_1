@extends('layouts.admin')
@section('content')

    <!--顶部导航 开始-->
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 单词管理
    </div>
    <!--顶部导航 结束-->

    <!--结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3>单词列表</h3>
            </div>
            <!--编辑导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/word/create')}}"><i class="fa fa-plus"></i>添加单词</a>
                    <a href="{{url('admin/word')}}"><i class="fa fa-recycle"></i>全部单词</a>
                    <a href="{{url('admin/word')}}"><i class="fa fa-refresh"></i>更新单词</a>
                </div>
            </div>
            <!--编辑导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">

                    <tr>
                        <th class="tc">ID</th>
                        <th>名称</th>
                        <th>音标</th>
                        <th>释义</th>
                        <th>章节id</th>
                        <th>上传时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach( $data as $v)
                        <tr>
                            <td class="tc">{{$v->word_id}}</td>
                            <td>{{$v->word_name}}</td>
                            <td>{{$v->word_mark}}</td>
                            <td>{{$v->word_mean}}</td>
                            <td>{{$v->top_id}}</td>
                            <td>{{date('Y-m-d',$v->word_time)}}</td>
                            <td>
                                <a href="{{url('admin/word/'.$v->word_id.'/edit')}}">修改</a>
                                <a href="javascript:" onclick="delArt({{$v->word_id}})">删除</a>
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
        function delArt(word_id) {
            layer.confirm('您确定要删除该单词吗？', {
                btn: ['确定', '取消']
            }, function () {
                $.post("{{url('admin/word/')}}/" + word_id, {
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