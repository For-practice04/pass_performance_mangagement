<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            生徒情報編集画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font relative">
                        @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                            <strong class="font-medium text-red-600">エラーが発生しました:</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="container px-5 py-24 mx-auto">

                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-wrap -m-2">
                                    <div class="p-2 w-full">
                                        <form method="post" action="{{route('admissions.update',['id'=>$student->id])}}">
                                            @csrf
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">氏名</label>
                                                <input type="text" id="name" name="name" value="{{$student->name}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="name" class="leading-7 text-sm text-gray-600">性別</label><br>
                                            男:<input type="radio" id="gender" name="gender" value="男" @if($student->gender==="男") checked @endif class="mx-1">
                                            女:<input type="radio" id="gender" name="gender" value="女" @if($student->gender==="女") checked @endif>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="birth_date" class="leading-7 text-sm text-gray-600">生年月日</label><br>
                                            <select name="birth_year">
                                                <option value=""></option>
                                                <option @if($birthDateYear==="1990" ) selected @endif value="1990">1990</option>
                                                <option @if($birthDateYear==="1991" ) selected @endif value="1991">1991</option>
                                                <option @if($birthDateYear==="1992" ) selected @endif value="1992">1992</option>
                                                <option @if($birthDateYear==="1993" ) selected @endif value="1993">1993</option>
                                                <option @if($birthDateYear==="1994" ) selected @endif value="1994">1994</option>
                                                <option @if($birthDateYear==="1995" ) selected @endif value="1995">1995</option>
                                                <option @if($birthDateYear==="1996" ) selected @endif value="1996">1996</option>
                                                <option @if($birthDateYear==="1997" ) selected @endif value="1997">1997</option>
                                                <option @if($birthDateYear==="1998" ) selected @endif value="1998">1998</option>
                                                <option @if($birthDateYear==="1999" ) selected @endif value="1999">1999</option>
                                                <option @if($birthDateYear==="2000" ) selected @endif value="2000">2000</option>
                                            </select>
                                            年
                                            <select name="birth_month">
                                                <option value=""></option>
                                                <option @if($birthDateMonth==="1" ) selected @endif value="1">1</option>
                                                <option @if($birthDateMonth==="2" ) selected @endif value="2">2</option>
                                                <option @if($birthDateMonth==="3" ) selected @endif value="3">3</option>
                                                <option @if($birthDateMonth==="4" ) selected @endif value="4">4</option>
                                                <option @if($birthDateMonth==="5" ) selected @endif value="5">5</option>
                                                <option @if($birthDateMonth==="6" ) selected @endif value="6">6</option>
                                                <option @if($birthDateMonth==="7" ) selected @endif value="7">7</option>
                                                <option @if($birthDateMonth==="8" ) selected @endif value="8">8</option>
                                                <option @if($birthDateMonth==="9" ) selected @endif value="9">9</option>
                                                <option @if($birthDateMonth==="10" ) selected @endif value="10">10</option>
                                                <option @if($birthDateMonth==="11" ) selected @endif value="11">11</option>
                                                <option @if($birthDateMonth==="12" ) selected @endif value="12">12</option>
                                            </select>
                                            月
                                            <select name="birth_day">
                                                <option value=""></option>
                                                <option @if($birthDateDay==="1" ) selected @endif value="1">1</option>
                                                <option @if($birthDateDay==="2" ) selected @endif value="2">2</option>
                                                <option @if($birthDateDay==="3" ) selected @endif value="3">3</option>
                                                <option @if($birthDateDay==="4" ) selected @endif value="4">4</option>
                                                <option @if($birthDateDay==="5" ) selected @endif value="5">5</option>
                                                <option @if($birthDateDay==="6" ) selected @endif value="6">6</option>
                                                <option @if($birthDateDay==="7" ) selected @endif value="7">7</option>
                                                <option @if($birthDateDay==="8" ) selected @endif value="8">8</option>
                                                <option @if($birthDateDay==="9" ) selected @endif value="9">9</option>
                                                <option @if($birthDateDay==="10" ) selected @endif value="10">10</option>
                                                <option @if($birthDateDay==="11" ) selected @endif value="11">11</option>
                                                <option @if($birthDateDay==="12" ) selected @endif value="12">12</option>
                                                <option @if($birthDateDay==="13" ) selected @endif value="13">13</option>
                                                <option @if($birthDateDay==="14" ) selected @endif value="14">14</option>
                                                <option @if($birthDateDay==="15" ) selected @endif value="15">15</option>
                                                <option @if($birthDateDay==="16" ) selected @endif value="16">16</option>
                                                <option @if($birthDateDay==="17" ) selected @endif value="17">17</option>
                                                <option @if($birthDateDay==="18" ) selected @endif value="18">18</option>
                                                <option @if($birthDateDay==="19" ) selected @endif value="19">19</option>
                                                <option @if($birthDateDay==="20" ) selected @endif value="20">20</option>
                                                <option @if($birthDateDay==="21" ) selected @endif value="21">21</option>
                                                <option @if($birthDateDay==="22" ) selected @endif value="22">22</option>
                                                <option @if($birthDateDay==="23" ) selected @endif value="23">23</option>
                                                <option @if($birthDateDay==="24" ) selected @endif value="24">24</option>
                                                <option @if($birthDateDay==="25" ) selected @endif value="25">25</option>
                                                <option @if($birthDateDay==="26" ) selected @endif value="26">26</option>
                                                <option @if($birthDateDay==="27" ) selected @endif value="27">27</option>
                                                <option @if($birthDateDay==="28" ) selected @endif value="28">28</option>
                                                <option @if($birthDateDay==="29" ) selected @endif value="29">29</option>
                                                <option @if($birthDateDay==="30" ) selected @endif value="30">30</option>
                                                <option @if($birthDateDay==="31" ) selected @endif value="31">31</option>
                                            </select>
                                            日
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="name" class="leading-7 text-sm text-gray-600">部活</label><br>
                                            <select name="club">
                                                <option value=""></option>
                                                <option value="バスケ" @if($student->club==="バスケ") selected @endif>バスケ</option>
                                                <option value="サッカー" @if($student->club==="サッカー") checked @endif>サッカー</option>
                                            </select>
                                            部
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="name" class="leading-7 text-sm text-gray-600">通塾有無</label><br>
                                            <input type="radio" name="cram_school" value="通塾あり" @if($student->cram_school==="通塾あり") checked @endif>通塾有り
                                            <input type="radio" name="cram_school" value="通塾なし" @if($student->cram_school==="通塾なし") checked @endif>通塾無し
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集完了</button>
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