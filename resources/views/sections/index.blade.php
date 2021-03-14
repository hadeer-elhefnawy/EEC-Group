@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All sections</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('sections.create') }}"> Create New category</a>
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
        @foreach ($section as $section)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $section->name}}</td>
            <td>
                <form action="{{ route('sections.destroy',$section->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('sections.show',$section->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('sections.edit',$section->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>



@endsection
