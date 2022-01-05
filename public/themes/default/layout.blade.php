<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$meta->title}}</title>
    <meta name="keywords" content="{{$meta->keywords}}">
    <meta name="description" content="{{$meta->description}}">
    <link href="https://lib.baomitu.com/tailwindcss/2.2.4/tailwind.min.css" rel="stylesheet">
</head>
<body class="text-sm text-gray-600">
<div class="mx-auto max-w-7xl  items-center gap-4 py-6 flex px-4" x-data="{menu: false}">
    {{--LOGO--}}
    <a href="/" class="flex-none flex  items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 202.97 197.7" class="h-8 w-8 fill-current text-blue-600">
            <path
                d="M170,94.52l-35.9-20.73-24.34,14,11.62,6.71a5,5,0,0,1,0,8.66L32.5,154.52a5,5,0,0,1-7.5-4.33V99.61a6.44,6.44,0,0,1,0-1.52V47.51a5,5,0,0,1,7.5-4.33l35,20.23,24.32-14L7.5.68A5,5,0,0,0,0,5V192.69A5,5,0,0,0,7.5,197L170,103.18A5,5,0,0,0,170,94.52Z"></path>
            <path
                d="M32.93,103.18l35.9,20.73,24.34-14-11.62-6.71a5,5,0,0,1,0-8.66l88.92-51.34a5,5,0,0,1,7.5,4.33V98.09a6.44,6.44,0,0,1,0,1.52v50.58a5,5,0,0,1-7.5,4.33l-35-20.23-24.32,14L195.47,197a5,5,0,0,0,7.5-4.33V5a5,5,0,0,0-7.5-4.33L32.93,94.52A5,5,0,0,0,32.93,103.18Z"></path>
        </svg>
        <div class="text-2xl  text-gray-900">{{config('app.name')}}</div>
    </a>
    {{--移动端菜单开关--}}
    <div class="flex-grow justify-end flex lg:hidden">
        <div @click="menu = true" class="cursor-pointer text-gray-500">
            <svg class="h-6 w-6 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
                 aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </div>
    </div>
    {{--移动端菜单--}}
    <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right lg:hidden " x-show="menu" x-cloak>
        <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">

            {{--菜单头部--}}
            <div class="px-5 pt-4 flex items-center justify-between">
                <a href="/" class="flex-none flex  items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 202.97 197.7"
                         class="h-8 w-8 fill-current text-blue-600">
                        <path
                            d="M170,94.52l-35.9-20.73-24.34,14,11.62,6.71a5,5,0,0,1,0,8.66L32.5,154.52a5,5,0,0,1-7.5-4.33V99.61a6.44,6.44,0,0,1,0-1.52V47.51a5,5,0,0,1,7.5-4.33l35,20.23,24.32-14L7.5.68A5,5,0,0,0,0,5V192.69A5,5,0,0,0,7.5,197L170,103.18A5,5,0,0,0,170,94.52Z"></path>
                        <path
                            d="M32.93,103.18l35.9,20.73,24.34-14-11.62-6.71a5,5,0,0,1,0-8.66l88.92-51.34a5,5,0,0,1,7.5,4.33V98.09a6.44,6.44,0,0,1,0,1.52v50.58a5,5,0,0,1-7.5,4.33l-35-20.23-24.32,14L195.47,197a5,5,0,0,0,7.5-4.33V5a5,5,0,0,0-7.5-4.33L32.93,94.52A5,5,0,0,0,32.93,103.18Z"></path>
                    </svg>
                    <div class="text-2xl  text-gray-900">{{config('app.name')}}</div>
                </a>
                <div class="-mr-2">
                    <button type="button"
                            @click="menu = false"
                            class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-500">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
            {{--菜单列表--}}
            <div class="px-2 pt-2 pb-3 space-y-1">
                <ul x-data="{open: 0}">
                    <li>
                        <a href="{{route('web.index')}}"
                           class="block px-3 py-2 hover:bg-blue-600 hover:text-white text-base">首页</a>
                    </li>
                    @articleclass()
                    <li @click="open = {{$item->class_id}}">
                        <a href="{{$item->children->count() ? 'javascript:;' : route('web.article.list', ['id' => $item->class_id])}}"
                           class="block px-3 py-2 flex items-center hover:bg-blue-600 hover:text-white text-base">
                            <div class="flex-grow">
                                {{$item->name}}
                            </div>
                            <div class="flex-none">
                                @if($item->children->count())
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 9l-7 7-7-7"/>
                                    </svg>
                                @endif
                            </div>
                        </a>
                        @if($item->children->count())
                            <div x-cloak class="p-2" x-show="open === {{$item->class_id}}">
                                <ul>
                                    @foreach($item->children as $vo)
                                        <li><a href="{{route('web.article.list', ['id' => $vo->class_id])}}"
                                               class="block px-4 py-2 hover:bg-blue-600 hover:text-white text-base">{{$vo->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>
                    @endarticleclass
                </ul>
            </div>
        </div>
    </div>

    {{--pc端菜单--}}
    <div class="flex-grow ml-10 w-1 hidden lg:block" x-data="{open: 0}">
        <ul class="flex flex-nowrap gap-10 items-center">
            <li class="whitespace-nowrap">
                <a class="block flex gap-3 items-center" href="{{route('web.index')}}">首页</a>
            </li>
            @articleclass(['limit' => 4])
            <li class="whitespace-nowrap relative" @mouseleave="open = 0">
                <a class="block flex gap-3 items-center" @mouseover="open = {{$item->class_id}}"
                   href="{{route('web.article.list', ['id' => $item->class_id])}}">{{$item->name}}
                    @if($item->children->count())
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    @endif
                </a>
                @if($item->children->count())
                    <div x-cloak class="z-10 absolute w-52 bg-white shadow p-2 " x-show="open === {{$item->class_id}}">
                        <ul>
                            @foreach($item->children as $vo)
                                <li><a href="{{route('web.article.list', ['id' => $vo->class_id])}}"
                                       class="block px-4 py-2 hover:bg-blue-600 hover:text-white">{{$vo->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </li>
            @endarticleclass
        </ul>
    </div>

    {{--搜索组件--}}
    <div class="flex-none hidden lg:block">
        <form action="{{route('web.article.search')}}" class="flex gap-4 border h-10  items-center px-2">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <input class="block h-8 outline-none w-24" type="text" name="keyword" value="{{$keyword}}">
        </form>
    </div>


</div>

{{--布局插槽--}}
@yield('content')

<div class="mt-16">
    <div class="mx-auto  max-w-7xl px-4">
        <div class=" flex flex-col lg:flex-row gap-8 py-6  border-t border-gray-200">
            {{--自定义菜单--}}
            <div class="flex-none">
                <div class="text-base font-bold">友情链接</div>
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-4 mt-6">
                    @menu(['id' => 1, 'limit' => 6])
                    <div>
                        <a href="{{$item->url}}" class="hover:underline" target="_blank">{{$item->name}}</a>
                    </div>
                    @endmenu
                </div>
            </div>
            <div class="flex-grow lg:justify-end flex">
                {{--反馈工具--}}
                <div class="lg:text-right">
                    <div class="text-base font-bold">建议和反馈</div>
                    <div class="text-sm mt-6">如果您对该产品有什么建议或者想法您可以采用以下方式跟我们进行沟通</div>
                </div>
            </div>
        </div>

        <div class=" border-t border-gray-200 py-4 flex items-center">
            <div class="flex-grow text-center lg:text-left">© Copyright 2021, All Rights Reserved</div>
            <div class="flex-none hidden lg:flex space-x-6">
                {{--自定义菜单--}}
                @menu(['id' => 2])
                <a href="{{$item->url}}" class="hover:underline">{{$item->name}}</a>
                @endmenu
            </div>
        </div>
    </div>
</div>

</body>
<script src="https://lib.baomitu.com/alpinejs/3.2.1/cdn.min.js" defer></script>
</html>
