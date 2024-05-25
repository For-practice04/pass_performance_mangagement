<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            生徒情報
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 py-24 mx-auto">

                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-wrap -m-2">
                                    <div class="p-2 w-full">
                                        <form method="get" action="{{route('admissions.edit',['id'=>$details['student']->id])}}">
                                            @csrf
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">学籍番号</label>
                                                <div class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:bg-gray-300 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$details['student']->id}}</div>
                                            </div>
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">氏名</label>
                                                <div class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$details['student']->name}}</div>
                                            </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="name" class="leading-7 text-sm text-gray-600">性別</label><br>
                                            <div class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$details['student']->gender}}</div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="birth_date" class="leading-7 text-sm text-gray-600">生年月日</label><br>
                                            <div class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$details['student']->birth_date}}</div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="name" class="leading-7 text-sm text-gray-600">部活</label><br>
                                            <div class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$details['student']->club}}部</div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="name" class="leading-7 text-sm text-gray-600">通塾有無</label><br>
                                            <div class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$details['student']->cram_school}}</div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            @foreach($details['universities'] as $university)
                                            @if($university->name)
                                            <h3 class="font-semibold mt-5 text-l text-gray-800 dark:text-gray-200 leading-tight">
                                                合格大学
                                            </h3>
                                            @endif
                                            <div class="flex flex-wrap">
                                                <div class="mt-5">
                                                    <span class="mr-5">{{$university->name}}</span>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="flex mt-8">
                                                <div class="p-2">
                                                    <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集</button>
                                                </div>
                                                </form>
                                                <form method="get" action="{{route('admissions.pass_edit',['id'=>$details['student']->id])}}">
                                                    @csrf
                                                    <div class="p-2">
                                                        <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">実績変更</button>
                                                    </div>
                                                </form>
                                                <form method="post" action="{{route('admissions.destroy',['id'=>$details['student']->id])}}">
                                                    @csrf
                                                    <div class="p-2">
                                                        <button class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>