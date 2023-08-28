<!-- Search -->
{{--submit search redirect to the homepage --}}
<form action="/">
    <div class="relative border-2 border-gray-100 m-2 rounded-lg">
        <div class="absolute top-1 left-3">
            <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
        </div>
        <input type="text" name="search" class="h-8 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
            placeholder="Search services" />
        <div class="absolute top-1 -right-24">
            <button type="submit" class="h-6 w-20 text-white rounded-lg bg-accent hover:bg-onhover">
                Search
            </button>
        </div>
    </div>
</form>