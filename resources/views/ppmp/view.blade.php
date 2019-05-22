@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">PPMP #{{ $ppmp->ppmp_id  }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Cost Center</th>
                                <th scope="col">Item</th>
                                <th scope="col">Quarter</th>
                                <th scope="col">Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $ppmp->ppmp_items()->get() as $ppmp_item )
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('ppmp-item-view', ['ppmp_item_id'=>$ppmp_item->ppmp_item_id])}}">{{$ppmp_item->ppmp_item_id}}</a>
                                    </th>
                                    <td>{{$ppmp_item->ppmp->cost_center()->first()->cc_name}}</td>
                                    <td>{{$ppmp_item->item->description}}</td>
                                    <td>{{$ppmp_item->quarter}}</td>
                                    <td>{{$ppmp_item->remarks ? $ppmp_item->remarks : 'N/A'}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
