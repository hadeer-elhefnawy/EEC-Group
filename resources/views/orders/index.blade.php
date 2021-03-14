@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All orders</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('orders.create') }}"> Create New order</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Order No</th>
            <th>request date</th>
            <th>department</th>
            <th>section</th>
            <th class="hidden">item category</th>
            <th>action</th>
        </tr>
        @foreach ($orders as $order)

        <tr>
            <td>{{$order->order_number}}</td>
            <td>
                <input type="text" class="form-control" value="{{date('Y-m-d')}}" disabled>
            </td>
            <td> {{ $order->department->name}}</td>
            <td>{{ $order->section->name}}</td>
            <td class="hidden">
                @foreach($order->products as $product)
               <p>{{ $product->category->name}}</p>
            @endforeach
            </td>
            <td>

                <form action="{{ route('orders.destroy',$order->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('orders.show',$order->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>

        </tr>
        @endforeach

        {{-- @foreach ($orders as $order)
        <tr>
            <td>
                <form action="{{ route('orders.destroy',$order->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('orders.show',$order->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach --}}
    </table>



@endsection
