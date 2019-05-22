@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>PPMP Table</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Cost Center</th>
                                <th scope="col">Fund Source</th>
                                <th scope="col">Acc ID</th>
                                <th scope="col">Type</th>
                                <th scope="col">Year</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $ppmps as $ppmp )
                            <tr>
                                <th scope="row">
                                    <a href="{{route('ppmp-view', ['ppmp_id'=>$ppmp->ppmp_id])}}">{{$ppmp->ppmp_id}}</a>
                                </th>
                                <td>{{$ppmp->cost_center->cc_name}}</td>
                                <td>{{$ppmp->fund_source->fs_name}}</td>
                                <td>{{$ppmp->account->account_name}}</td>
                                <td>{{$ppmp->type}}</td>
                                <td>{{Carbon\Carbon::parse($ppmp->year)->format('Y')}}</td>
                                <td>
                                    <a href="{{route('ppmp-generate-report', ['ppmp_id'=>$ppmp->ppmp_id])}}" target="_blank">
                                        Generate Report
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@if( Auth::user()->cost_center->cc_name != 'Bids and Awards Committee' )
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Request</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @elseif (session('success_message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success_message') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('ppmp-store') }}">
                        @csrf

                        <item-request :items="{{$items}}" :ppmps="{{$ppmps}}"></item-request>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Request!
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
