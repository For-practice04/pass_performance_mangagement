<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            合格実績入力画面
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
                                        <form method="post" action="{{route('admissions.pass_store')}}">
                                            @csrf
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">学籍番号:</label>
                                                <span class="w-full  focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$student->id}}</span>
                                            </div>
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">氏名:</label>
                                                <span class="w-full  focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$student->name}}</span>
                                            </div>
                                    </div>

                                    <div class="p-2 w-full flex">
                                        <div class="relative mr-4">
                                            <label for="university1" class="leading-7 text-sm text-gray-600">合格大学1</label><br>
                                            <select name="university1">
                                                <option value=""></option>
                                                <option value="1">大学1</option>
                                                <option value="2">大学2</option>
                                                <option value="3">大学3</option>
                                                <option value="4">大学4</option>
                                                <option value="5">大学5</option>
                                            </select>
                                        </div>
                                        <div class="relative mr-4">
                                            <label for="university2" class="leading-7 text-sm text-gray-600">合格大学2</label><br>
                                            <select name="university2">
                                                <option value=""></option>
                                                <option value="1">大学1</option>
                                                <option value="2">大学2</option>
                                                <option value="3">大学3</option>
                                                <option value="4">大学4</option>
                                                <option value="5">大学5</option>
                                            </select>
                                        </div>
                                        <div class="relative mr-4">
                                            <label for="university3" class="leading-7 text-sm text-gray-600">合格大学3</label><br>
                                            <select name="university3">
                                                <option value=""></option>
                                                <option value="1">大学1</option>
                                                <option value="2">大学2</option>
                                                <option value="3">大学3</option>
                                                <option value="4">大学4</option>
                                                <option value="5">大学5</option>
                                            </select>
                                        </div>
                                        <div class="relative mr-4">
                                            <label for="university4" class="leading-7 text-sm text-gray-600">合格大学4</label><br>
                                            <select name="university4">
                                                <option value=""></option>
                                                <option value="1">大学1</option>
                                                <option value="2">大学2</option>
                                                <option value="3">大学3</option>
                                                <option value="4">大学4</option>
                                                <option value="5">大学5</option>
                                            </select>
                                        </div>
                                        <div class="relative">
                                            <label for="university5" class="leading-7 text-sm text-gray-600">合格大学5</label><br>
                                            <select name="university5">
                                                <option value=""></option>
                                                <option value="1">大学1</option>
                                                <option value="2">大学2</option>
                                                <option value="3">大学3</option>
                                                <option value="4">大学4</option>
                                                <option value="5">大学5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{$student->id}}">
                                    <div class="p-2 w-full">
                                        <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">確定</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>