@extends('layout')

@section('content')
    <style>
        .content img {
            max-width: 100% !important;
        }
    </style>
    <div class="bg-gray-100 ">
        <div class="mx-auto max-w-7xl  bg-no-repeat bg-opacity-70 bg-auto"
             style="background-image: url('{{$theme('images/banner.jpg')}}')">
            <div class="bg-gray-100 bg-opacity-80">
                <div
                    class="flex flex-col justify-center items-center text-center bg-gradient-to-r from-gray-100 via-transparent to-gray-100"
                    style="height: 200px; ">
                    <div class=" text-gray-900 text-2xl mb-4 font-bold">
                        {{$classInfo->name}}
                    </div>
                    <div class="text-gray-500">
                        <div class=" flex flex-row gap-2">
                            <div>
                                <a href="{{route('web.index')}}" class="hover:underline" >首页</a>
                            </div>
                            @articleclass(['limit' => 0, 'parent' => $classInfo->class_id])
                            <div>&rsaquo;&rsaquo;</div>
                            <div><a class="hover:underline" href="{{route('web.article.list', ['id' => $item->class_id])}}">{{$item->name}}</a> </div>
                            @endarticleclass
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto  max-w-7xl mt-6 min-h-screen">

        <div class="bg-white p-4 mt-5 overflow-x-hidden">
            <div class="text-2xl text-center">{{$info->title}}</div>
            <div class="text-center text-gray-500 mt-5 flex justify-center gap-4">
                <div>发布: {{$info->created_at->format('Y-m-d H:i')}}</div>
                <div>编辑: {{$info->auth ?: '未知'}}</div>

                {{--查询文章标签--}}
                @if($info->tags->count())
                    <div>关键词:
                    @foreach($info->tags as $vo)
                            <a class="hover:underline mr-1 text-blue-600" href="{{route('web.article.tags', ['tag' => $item->name])}}">{{$vo->name}}</a>
                    @endforeach
                    </div>
                @endif
            </div>
            <div class="flex flex-col gap-6 pb-6 mt-5 text-base mt-2 content">
                {!! $info->content !!}
            </div>
        </div>

    </div>
@endsection
