@extends('layout')

@section('content')
    <div class="bg-gray-100 ">
        <div class="mx-auto max-w-7xl  bg-no-repeat bg-opacity-70 bg-auto"
             style="background-image: url('{{$theme('images/banner.jpg')}}')">
            <div class="bg-gray-100 bg-opacity-80">
                <div
                    class="flex flex-col justify-center items-center text-center bg-gradient-to-r from-gray-100 via-transparent to-gray-100"
                    style="height: 200px; ">
                    <div class=" text-gray-900 text-lg lg:text-2xl mb-4 font-bold">
                        {{$tag}} 相关文章
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto  max-w-7xl flex space-x-6 mt-6 lg:min-h-screen">
        <div class="lg:w-3/4">
            <div class="flex flex-col gap-6 pb-6 mt-5">
                @article(['limit' => 10, 'page' => true, 'tag' => $tag])

                <div class="flex items-start gap-4">
                    <div class="flex-none w-36 h-36 bg-gray-100 bg-cover bg-center"
                         style="background-image: url('{{$item->image ?: route('service.image.placeholder', ['w' => 150, 'h' => 150, 't' => '暂无'])}}')"></div>
                    <div class="flex-grow">
                        <div class="text-gray-500">
                            <a href="{{route('web.article.list', ['id' => $class->class_id])}}" class="text-blue-600 hover:underline">{{$item->class[0]->name}}</a> <span
                                class="mx-2 text-gray-300">/</span> {{date('m-d, Y')}}
                        </div>
                        <div>
                            <div class="mt-2 text-lg font-medium text-black">
                                <a href="{{route('web.article.info', ['id' => $item->article_id])}}" class="hover:underline">{{$item->title}}</a>
                            </div>
                            <div class="mt-2 text-gray-500 overflow-hidden h-14 leading-7">
                                {!! $item->description !!}
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
            <div class="flex justify-center">@paginate('paginate')</div>
        </div>


        <div class="lg:w-1/4 hidden lg:block">
            <div class="text-lg font-bold">热门标签</div>
            <div class="mt-6 flex flex-wrap gap-2">
                {{--标签列表--}}
                @tags()
                <a href="{{route('web.article.tags', ['tag' => $item->name])}}" class="cursor-pointer block py-2 px-4 bg-blue-200 rounded text-blue-600">{{$item->name}}</a>
                @endtags
            </div>
        </div>
    </div>

@endsection
