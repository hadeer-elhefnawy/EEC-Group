@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All departments</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('departments.create') }}"> Create New department</a>
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
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($department as $dep)
        <tr>
            <td>{{ $dep->id }}</td>
            <td>{{ $dep->name}}</td>
            <td>
                <form action="{{ route('departments.destroy',$dep->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('departments.show',$dep->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('departments.edit',$dep->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>



@endsection
