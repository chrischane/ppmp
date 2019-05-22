@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$ppmp_item->item->description}}</div>

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

                    <p>
                        <strong>Quarter: </strong> {{$ppmp_item->quarter}}
                    </p>
                    <p>
                        <strong>Amount: </strong> Php {{number_format($ppmp_item->amount, 2, '.', ',')}}
                    </p>
                    <p>
                        <strong>Quantity: </strong> {{$ppmp_item->quantity . ' ' . $ppmp_item->item->unit}}
                    </p>
                    <p>
                        <strong>Unit Price: </strong> {{$ppmp_item->unit_price}}
                    </p>
                    <p>
                        <strong>Specification: </strong> {{$ppmp_item->item->specification}}
                    </p>
                    <p>
                        <strong>Remarks: </strong> {{$ppmp_item->remarks ? $ppmp_item->remarks : 'N/A'}}
                    </p>

                    @if( Auth::user()->cost_center->cc_name == 'Bids and Awards Committee' && !$ppmp_item->remarks )
                        <a href="{{route('ppmp-item-mark', ['ppmp_item_id'=>$ppmp_item->ppmp_item_id])}}">
                            <button type="button" class="btn btn-success btn-sm">Mark As Uploaded</button>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
