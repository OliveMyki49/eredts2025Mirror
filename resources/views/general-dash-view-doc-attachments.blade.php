@extends('layout.master')
@section('title', 'Department of Environment and Natural Resources')
@section('head_extension')
    {{-- Add styles here --}}
@endsection

@section('content')
    {{-- <div class="content" oncontextmenu="return false;"> --}}
    <div class="content">
        @foreach ($attachments as $dt)
            @php
                $path = $dt->file_path . '/' . $dt->file_name;
            @endphp
            @if (strpos($dt->file_name, '.pdf') !== false)
                
            @else
                {{ $path }} <br>
            @endif
        @endforeach
    </div>
@endsection
