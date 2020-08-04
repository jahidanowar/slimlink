@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Your Shorted Links</h4>

                    @if ($user_links)

                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Short Link</td>
                                        <td>Destination</td>
                                        <td>Hits</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_links as $link)
                                        <tr>
                                        <td><a target="_blank" href="{{config('app.url')}}/go/{{$link->short}}">{{config('app.url')}}/go/{{$link->short}}</a></td>
                                            <td>{{$link->destination}}</td>
                                            <td>{{$link->hits}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
