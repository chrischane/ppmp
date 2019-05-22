<!DOCTYPE html>
<html>
<head>
<title>Generate Report - {{$ppmp->ppmp_id}}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body{
            overflow-x: scroll;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h3>Project Procurement Plan, {{Carbon\Carbon::parse($ppmp->year)->format('Y')}}</h3>
<p>Cost Center: {{$ppmp->cost_center->cc_name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   {{$ppmp->cost_center->cc_name . '-' . $ppmp->fund_source->fs_name}}</p>
<p>Source of Fund: {{strtoupper($ppmp->fund_source->fs_name)}}</p>
<p>PPMP ID: {{$ppmp->ppmp_id}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$ppmp->type}}</p>
<p>Account Code: {{$ppmp->account->account_id}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$ppmp->account->account_name}}</p>
<table>
    <tr>
        <th>Unit</th>
        <th>Details</th>
        <th>Unit Price</th>
        <th>Qty</th>
        <th>Amount</th>
        <th>First Quarter</th>
        <th>Second Quarter</th>
        <th>Third Quarter</th>
        <th>Fourth Quarter</th>
    </tr>
    @foreach( $ppmp->ppmp_items()->get() as $ppmp_item )
    <tr>
        <td>{{$ppmp_item->item->unit}}</td>
        <td>
            <strong>{{$ppmp_item->item->description}}</strong>
            <p>
                {{$ppmp_item->item->specification}}
            </p>
        </td>
        <td>Php {{number_format($ppmp_item->amount, 2, '.', ',')}}</td>
        <td>{{$ppmp_item->quantity}}</td>
        <td>{{$ppmp_item->amount}}</td>
        <td>{{$ppmp_item->quarter == 'FIRST QUARTER' ? $ppmp_item->quarter : ''}}</td>
        <td>{{$ppmp_item->quarter == 'SECOND QUARTER' ? $ppmp_item->quarter : ''}}</td>
        <td>{{$ppmp_item->quarter == 'THIRD QUARTER' ? $ppmp_item->quarter : ''}}</td>
        <td>{{$ppmp_item->quarter == 'FOURTH QUARTER' ? $ppmp_item->quarter : ''}}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
