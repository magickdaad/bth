<x-app-layout>
    <div class="content flex justify-between items-start pl-[180px]">
        <table class="table-auto text-left ">
            <thead>
            <tr>
                <th class="py-[10px] w-[165px]">Артикул</th>
                <th class="py-[10px] w-[158px]">Название</th>
                <th class="py-[10px] w-[150px]">Статус</th>
                <th class="py-[10px] w-[158px]">Атрибуты</th>
            </tr>
            </thead>
            <tbody class="bg-[#C4C4C4] ">
            @foreach($products as $product)
                <tr>
                    <td class="py-[19px]"><a href="{{route('products.show',$product->id)}}">{{$product->article}}</a>
                    </td>
                    <td class="py-[19px]">{{$product->name}}</td>
                    <td class="py-[19px]">{{$product->status}}</td>
                    @if ($product->data === null)
                        <td class="py-[19px]">
                            -
                        </td>
                    @else
                        <td class="py-[19px]">
                            @foreach($product->data as $name => $value)
                                <p>{{$name}}: {{$value}}</p>
                            @endforeach
                        </td>
                    @endif

                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('products.create')}}"
           class="bg-[#0FC5FF] py-[10px] text-center  w-[135px] rounded-md mt-[18px] text-white">Добавить</a>
    </div>
</x-app-layout>
