@extends('layouts.app')

@section('content')
@auth
<link-shortner></link-shortner>

@if ($errors->any())
<div class="container">
    @foreach ($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
    @endforeach
</div>
@endif

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Your Shorted Links') }}</div>

                <div class="card-body">
                    @if ($user_links)
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <td>Short Link</td>
                                <td>Destination</td>
                                <td>Hits</td>
                                <td style="width: 300px">Last Click Location</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_links as $link)
                            <tr>
                                <td><a target="_blank"
                                        href="{{config('app.url')}}/go/{{$link->short}}">{{config('app.url')}}/go/{{$link->short}}</a>
                                </td>
                                <td>{{$link->destination}}</td>
                                <td>{{$link->hits}}</td>
                                <td>
                                    @if ($link->last_location)
                                <a class="btn btn-primary mb-2" data-toggle="collapse" href="#locationCollapse{{$link->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        View Location Details
                                    </a>
                                    <div class="collapse" id="locationCollapse{{$link->id}}">
                                        <table class="table table-dark table-striped table-responsive">
                                        @foreach ($link->last_location as $key => $value)
                                        <tr>
                                            <td>{{ucfirst($key)}}: </td>
                                            <td>{{$value}}</td>
                                        </tr>
                                        @endforeach
                                        </table>
                                    </div>
                                    @endif

                                </td>
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


@endauth


@endsection
