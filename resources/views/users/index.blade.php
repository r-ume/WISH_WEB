@extends('layouts.common')

@section('title', 'WISH_WEB Residents')

@include('layouts.head')

@include('layouts.header')

@section('content')
    <!-- Content area -->
    <div class="ui container content">
        <div class="ui stackable doubling grid">
            <!-- Middle Content -->
            <div class="sixteen wide column" align="center">
                <div class="ui horizontal divider"><h2>Residents</h2></div>
                <br>
                <div class="ui four column stackable doubling grid" id="sortable-list">
                    @foreach($users as $user)
                        <div class="column">
                            <img class="ui rounded image" src= {{ $user->image }} alt="">
                            <div class="ui header">{{ $user->first_name }}</div>
                            <p>{{ $user->floor }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@include('layouts.footer')