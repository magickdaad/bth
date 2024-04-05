<x-product-layout>
    <div class="flex justify-between mb-[30px]">
        <h1 class="text-xl font-bold text-white ">Добавить продукт</h1>
        <a href="{{route('products.index')}}">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.5 7.5L7.5 22.5" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M7.5 7.5L22.5 22.5" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>
        </a>
    </div>
    <form class="create-form" action="{{route('products.store')}}" method="post">
        @csrf
        <div class="mb-[15px]">
            <label for="article" class="block text-sm font-medium leading-6 text-white">Артикул</label>
            <div class="mt-2">
                <input type="text" name="article" id="article"
                       class="block w-[470px] rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <x-input-error :messages="$errors->get('article')" class="mt-2"/>
            </div>
        </div>
        <div class="mb-[15px]">
            <label for="name" class="block text-sm font-medium leading-6 text-white">Название</label>
            <div class="mt-2">
                <input type="text" name="name" id="name"
                       class="block w-[470px] rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
        </div>
        <div class="mb-[15px]">
            <label for="status" class="block text-sm font-medium leading-6 text-white">Статус</label>
            <div class="mt-2">
                <select name="status" id="status"
                        class="block w-[470px] rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <option value="available">Доступен</option>
                    <option value="unavailable">Не доступен</option>
                </select>
            </div>
        </div>
        <div class="attributes mb-[30px]">
            <h5 class="attributes_title text-sm font-bold text-white">Артрибуты</h5>
            <div class="attributes__content">

            </div>
            <x-input-error :messages="$errors->get('data')" class="mt-2"/>
            <a href="#" class="attributes__add underline decoration-dotted text-[9px] text-[#0FC5FF]">+ Добавить
                атрибут</a>
        </div>
        <button type="submit" class="bg-[#0FC5FF] py-[10px] text-center  w-[135px] rounded-md text-white">Добавить
        </button>
    </form>
</x-product-layout>

