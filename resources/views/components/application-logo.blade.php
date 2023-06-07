<img src="{{ url('chirpi.png') }}" alt="Chirpi" class="h-20 w-auto" />
@if(app()->environment('local'))
<div class="text-gray-500 fixed top-0 -ml-8 inset-x-1/2 cursor-help" title="Screen size indicator">
    <span class="sm:hidden">
        mobile[&lt;640px]
    </span>
    <span class="hidden sm:block md:hidden">
        small[&lt;768px]
    </span>
    <span class="hidden md:block lg:hidden">
        medium[&lt;1024px]
    </span>
    <span class="hidden lg:block xl:hidden">
        large[&lt;1280px]
    </span>
    <span class="hidden xl:block 2xl:hidden">
        XLarge[&lt;1536px]
    </span>
    <span class="hidden 2xl:block">
        XXLarge[&gt;1536px]
    </span>
</div>

@endif
