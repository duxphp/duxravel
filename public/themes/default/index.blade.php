@extends('layout')


@section('content')
    <div class="bg-gray-100 ">
        <div class="mx-auto max-w-7xl  bg-no-repeat bg-opacity-70 bg-auto"
             style="background-image: url('{{$theme('images/banner.jpg')}}')">
            <div class="bg-gray-100 bg-opacity-80">
                <div
                    class="flex flex-col justify-center items-center text-center bg-gradient-to-r from-gray-100 via-transparent to-gray-100"
                    style="height: 500px; ">

                    <div class=" text-gray-900 text-3xl lg:text-5xl font-bold">
                        欢迎使用 <span class="text-blue-600">{{config('app.name')}}</span>
                    </div>
                    <div class="mt-12 flex gap-4 justify-center items-center">
                        <a href="/admin" class="bg-blue-600 py-2 px-5 text-white rounded-3xl cursor-pointer hover:bg-blue-700">登录后台</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto max-w-7xl mt-10 px-4">
        <div class="flex py-6">
            <div class="flex-grow font-black text-lg">推荐内容 <span
                    class="ml-2 font-normal text-gray-300">Picture article</span></div>
            <div class="flex-none"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            @article(['limit' => 4])
            <div class=" p-4 border border-gray-300 hover:border-gray-400 ">
                <a href="{{route('web.article.info', ['id' => $item->article_id])}}"
                   class="block bg-cover bg-center bg-gray-200 h-36" style="background-image: url('{{$item->image ?: route('service.image.placeholder', ['w' => 150, 'h' => 150, 't' => '暂无'])}}')"></a>
                <a href="{{route('web.article.info', ['id' => $item->article_id])}}"
                   class="block mt-4 font-bold h-12 leading-6 text-base hover:underline" title="{{$item->title}}">
                    {{Str::limit($item->title, 60)}}
                </a>
                <div class="text-gray-400 mt-2  h-12 leading-6">{{Str::limit($item->description, 100)}}</div>
                <div class="flex items-center gap-2 mt-2 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <div>{{$item->views->pv}}</div>
                </div>
            </div>
            @endarticle
        </div>


        @articleclass(['limit' => 4, 'item' => $class])
        <div class="mt-8">
            <div class="flex py-6">
                <div class="flex-grow font-black text-lg">
                    <a href="{{route('web.article.list', ['id' => $class->class_id])}}"
                       class="hover:underline">{{$class->name}}</a>
                    <span
                        class="ml-2 font-normal text-gray-300">{{$class->subname}}</span>
                </div>
                <div class="flex-none">
                    <a href="{{route('web.article.list', ['id' => $class->class_id])}}" class="hover:underline">更多 →</a>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-6">
                @article(['limit' => 6, 'sub' => $class->class_id])
                <div class="flex items-center gap-4">
                    <a href="{{route('web.article.list', ['id' => $class->class_id])}}"
                       class="block flex-none bg-cover bg-center bg-gray-200 w-28 h-28"
                       style="background-image: url('{{$item->image ?: route('service.image.placeholder', ['w' => 150, 'h' => 150, 't' => '暂无'])}}')"></a>
                    <div class="flex-grow w-10">
                        <div class=" font-medium text-base mt-2 truncate">
                            <a href="{{route('web.article.info', ['id' => $item->article_id])}}"
                               class="block hover:underline">
                                {{$item->title}}
                            </a>
                        </div>
                        <div class="text-gray-400 mt-2  h-12 leading-6 overflow-hidden">{{Str::limit($item->description, 180)}}</div>
                        <div class="flex mt-2">
                            <div class="flex-grow">
                                <div class="text-gray-500">
                                    <a class="text-blue-600 hover:underline"
                                       href="{{route('web.article.list', ['id' => $item->class[0]->class_id])}}">{{$item->class[0]->name}}</a>
                                    <span class="mx-2 text-gray-300">/</span> {{$item->created_at->format('m-d, Y')}}
                                </div>
                            </div>
                            <div class="flex-none">
                                <div class="flex items-center gap-2 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <div>{{$item->view}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endarticle
            </div>
        </div>
        @endarticleclass
    </div>
@endsection
