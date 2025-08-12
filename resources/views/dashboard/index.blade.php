@extends('layouts.app')
@section('content_title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <p>Selamat Datang <strong>{{ auth()->user()->name }}</strong></p>
            </div>
        </div>
    </div>
@endsection