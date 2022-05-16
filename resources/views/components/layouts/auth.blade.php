<x-layouts.base title="{{$title ?? 'Halftime Car Rental'}}">
    <section class="flex bg-gray-100 flex-col md:flex-row h-screen items-center">

        <div class=" hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
            <img src="https://source.unsplash.com/random" alt="" class="w-full h-full object-cover">
        </div>

        {{$slot}}

    </section>
</x-layouts.base>
