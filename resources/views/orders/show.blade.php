@extends('layouts.app')

@section('content')

    <div class="panel panel-headline">
        <h5 class="panel-heading" style="margin-top: 10px;">Show purchase request ({{$order->order_number}})</h5>
            <div class="panel-body col-lg-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td scope="col">Order Number</td>
                            <td scope="col">{{$order->order_number}}</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col">date</td>
                            <td scope="col"><input type="text" class="form-control" value="{{date('Y-m-d')}}"></td>
                        </tr>
                        <tr>
                            <td>department</td>
                            <td>{{ $order->department->name }}</td>
                        </tr>
                        <tr>
                            <td>section</td>
                            <td>{{ $order->section->name}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
    <div class="card col-lg-12">
        <h5 class="card-header" style="margin-top: 10px;">Show purchase request (request no)</h5>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">serial no</th>
                        <th scope="col">item name</th>
                        <th scope="col">item specification</th>
                        <th scope="col">quantity required to purchase</th>
                        <th scope="col">item price</th>
                      </tr>
                    </thead>
                    <tbody>
                         @foreach ($order->items as $product)
                      <tr>
                        <td>serial no</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->pivot->comment}}</td>
                        <td>{{$product->pivot->quantity}}x {{ $product->price }} L.E</td>
                        <td>{{$product->pivot->quantity * $product->price}} L.E</td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                <div class="pull-right" style="margin-right: 5rem">
                    <h3>Total Price : <span class="text-danger">{{$order->total_price}}</span> L.E</h3>
                </div>
            </div>
    </div>
    <div class="pull-right" style="padding-top: 3rem;margin-right: 5rem">
        <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
    </div>
    {{-- <div class="row col-lg-6">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td scope="col">request no</td>
                    <td scope="col">request no</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="col">date</td>
                    <td scope="col"><input type="text" class="form-control" value="{{date('Y-m-d')}}"></td>
                </tr>
                <tr>
                    <td>department</td>
                    <td>{{ $order->department_id }}</td>
                </tr>
                <tr>
                    <td>section</td>
                    <td>{{ $order->section_id}}</td>
                </tr>
            </tbody>
        </table>
    </div> --}}





@endsection
