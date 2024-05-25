<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            合格実績管理画面
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="get" action="{{route('admissions.create')}}">
                        @csrf
                        <div class="pl-4 lg:w-2/3 w-full  justify-start">
                            <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">生徒情報入力</button>
                        </div>
                    </form>
                    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">学籍番号</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">氏名</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">性別</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">生年月日</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">部活</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">詳細</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">実績</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td class="px-4 py-3">{{$student->id}}</td>
                                    <td class="px-4 py-3">{{$student->name}}</td>
                                    <td class="px-4 py-3">{{$student->gender}}</td>
                                    <td class="px-4 py-3 text-lg text-gray-900">{{$student->birth_date}}</td>
                                    <td class="px-4 py-3 text-lg text-gray-900">{{$student->club}}</td>
                                    <td class="px-4 py-3 text-lg text-gray-900"><a class="text-blue-500" href="{{route('admissions.show',['id'=>$student->id])}}">詳細情報</a></td>
                                    <td class="px-4 py-3 text-lg text-gray-900"><a class="text-blue-500" href="{{route('admissions.pass_regist',['id'=>$student->id])}}">登録</a></td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</x-app-layout>