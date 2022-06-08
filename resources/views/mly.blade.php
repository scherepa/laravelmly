@php
$perPage = 100;
$totalPages = ceil($all / $perPage);
$page = isset($_GET["page"]) ? ($_GET["page"] - 1) : 0;
@endphp
@extends('layouts.app')
@section('content')
<div class="sm:pt-0 text-center p-12">
    <div>{{$all}} real ids</div>
    @if($page < $totalPages ) <p>page{{$page +1}} from {{$totalPages}} pages</p>
        @endif

</div>

@if($page < $totalPages ) <div class="grid grid-cols-2  gap-2 md:grid-cols-4 md:gap-4 md:px-12">
    @foreach ($tdata[$page] as $d)<div class="text-center">{{$d}}
    </div>
    @endforeach
    </div>
    @else
    <div class="text-center h1">There no more pages</div>
    @endif
    <div class="flex  md:px-12 justify-between pt-12">
        <a href="/?page={{$page}}" class=" w-4/12 {{$page > 0 ? '' : 'hidden'}}">
            <div class="bg-indigo-500 text-white rounded py-2 text-center">PREV</div>
        </a>
        <a href="/?page={{$page+2}}" class=" w-4/12 {{$page < $totalPages-1 ? '' : 'hidden'}}">
            <div class="bg-indigo-500 text-white rounded py-2 text-center">NEXT</div>
        </a>
    </div>

    @endsection