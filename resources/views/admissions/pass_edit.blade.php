<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            合格実績変更画面
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
                                    <div class="p-2 w-full mb-8">
                                        <div class="p-2 w-full mb-8">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-xl text-gray-600">学籍番号:</label>
                                                <span class="w-full  ml-8 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-xl outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$studentInfo['student']->id}}</span>
                                            </div>
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-xl text-gray-600">氏名:</label>
                                                <span class="w-full ml-14 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-xl outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$studentInfo['student']->name}}</span>
                                            </div>
                                        </div>
                                        @foreach($studentInfo['universities'] as $university)

                                        <form method="post" action="{{route('admissions.pass_update',['id'=>$studentInfo['student']->id])}}">
                                            <div class="flex">
                                                <div class="relative">
                                                    <strong for="name" class="leading-7 text-xl text-gray-600">合格大学{{$loop->iteration}}:</strong>
                                                </div>
                                                @csrf
                                                <input type="hidden" name="beforeEditUniversity" value={{$university->id}}>
                                                <input type="hidden" name="id" value={{$studentInfo['student']->id}}>
                                                <div class="relative">
                                                    <div class="mt-[-8px]">
                                                        <select name="afterEditUniversity" class="leading-7 border-1 ml-8 text-xl text-gray-600">
                                                            <option value="1" @if($university->name==="大学1") selected @endif>大学1</option>
                                                            <option value="2" @if($university->name==="大学2") selected @endif>大学2</option>
                                                            <option value="3" @if($university->name==="大学3") selected @endif>大学3</option>
                                                            <option value="4" @if($university->name==="大学4") selected @endif>大学4</option>
                                                            <option value="5" @if($university->name==="大学5") selected @endif>大学5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="relative">
                                                    <button class="ml-12 text-white bg-indigo-500 border-0 px-5 focus:outline-none hover:bg-indigo-600 rounded text-xl">変更</button>
                                                </div>
                                        </form>

                                        <form method="post" action="{{route('admissions.pass_destroy',['id'=>$studentInfo['student']->id])}}">
                                            @csrf
                                            <div class="relative">
                                                <button class="ml-12 text-white bg-red-500 border-0  px-5 focus:outline-none hover:bg-red-600 rounded text-xl">削除</button>
                                            </div>
                                            <input type="hidden" name="beforeEditUniversity" value={{$university->id}}>
                                            <input type="hidden" name="id" value={{$studentInfo['student']->id}}>
                                    </div>
                                    </form>
                                    @endforeach
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