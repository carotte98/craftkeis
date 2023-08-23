@props(['category'])

@php 
    $categoryName = DB::table('categories')
    ->select('categories.name')
    ->where('categories.id', '=', "$category")
    ->get();
@endphp

<a href="?category={{$category}}">{{$categoryName[0]->name}}</a>
