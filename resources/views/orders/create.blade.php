
@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="panel">
        <div class="row">
            <div class="col-lg-12 margin-tb" style="padding-left: 3rem;">
                <div class="pull-left">
                    <h2>Add New order</h2>
                </div>
                <div class="pull-right" style="padding-right: 3rem;padding-top: 3rem">
                    <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('orders.store') }}" method="POST" style="padding: 3rem">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>date:</strong>
                        <input type="text" name="date" class="form-control" placeholder="date" value="{{date('Y-m-d')}}"
                               disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>username:</strong>
                        <input type="text" name="username" class="form-control" placeholder="username"
                               value="{{ Auth::user()->name }}" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>department:</strong>
                        <select class="form-select form-control" aria-label="Default select example" name="department_id">
                            <option selected>choose..</option>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>section:</strong>
                        <select class="form-select form-control" aria-label="Default select example" name="section_id">
                            <option selected>choose..</option>
                            @foreach($sections as $section)
                                <option value="{{$section->id}}">{{$section->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>items</h2>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <h6>item details</h6>

                <table class="table table-bordered" id="myTable">
                    <tr>
                        <td id="cat0">
                            <strong>category:</strong>
                            <select class="form-select form-control" aria-label="Default select example"
                                    name="items[item0][category_id]">
                                <option selected>choose..</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td id="item0">
                            <strong>item:</strong>
                            <select class="form-select form-control" aria-label="Default select example"
                                    name="items[item0][product_id]">
                                <option selected>choose..</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td id="qnt0">
                            <input type="number" min="1" name="items[item0][quantity]" class="form-control"
                                   placeholder="QT required to purchase..">
                        </td>
                        <td id="delbtn">
                            <input type="button" value="Delete" onclick="deleteRow(this)">
                        </td>
                    </tr>
                    <tr>
                        <td id="cmnt">
                            <textarea class="form-control" style="height:50px" name="items[item0][comment]"
                                      placeholder="comments.."></textarea>
                        </td>
                        <td id="priceqnt">
                            <input type="number" min="0" name="items[item0][price]" class="form-control"
                                   placeholder="price for each QT..">
                        </td>
                        <td id="totalPrice">
                            <input type="number" name="items[item0][total_price]" class="form-control"
                                   placeholder="total items value.." disabled>
                        </td>

                    </tr>

                </table>
                <button type="button" class="btn btn-dark" onclick="addRow()">+Add row</button>


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">save order</button>
                </div>
            </div>

        </form>


        <script>
            function addRow() {

                if (typeof addRow.counter == 'undefined') {
                    addRow.counter = 0;
                }
                addRow.counter++;
                var table = document.getElementById("myTable");
//   console.log(table);
                var row = table.insertRow(table.length);
                var cell0 = row.insertCell(0);
                var cell1 = row.insertCell(1);
                var cell2 = row.insertCell(2);
                var cell3 = row.insertCell(3);
//
                var row2 = table.insertRow(table.length);
// // alert(table.length);
                var cell4 = row2.insertCell(0);
                var cell5 = row2.insertCell(1);
                var cell6 = row2.insertCell(2);


                cell0.innerHTML = `<strong>category:</strong>
                <select class="form-select form-control" aria-label="Default select example" name="items[item` + addRow.counter + `][category_id]">
                    <option selected>choose..</option>
                    @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                </select>`;

                cell1.innerHTML = ` <strong>item:</strong>
                <select class="form-select form-control" aria-label="Default select example" name="items[item` + addRow.counter + `][product_id]">
                    <option selected>choose..</option>
                  @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                </select>`;
                cell2.innerHTML = `<input type="text" name="items[item` + addRow.counter + `][quantity]" class="form-control" placeholder="QT required to purchase..">`;
                cell3.innerHTML = `<input type="button" value="Delete" onclick="deleteRow(this)">`;

                cell4.innerHTML = `<textarea class="form-control" style="height:50px" name="items[item` + addRow.counter + `][comment]" placeholder="comments.."></textarea>`;

                cell5.innerHTML = `<input type="text" name="items[item` + addRow.counter + `][price]" class="form-control" placeholder="price for each QT..">`;

                cell6.innerHTML = `<input type="text" name="items[item` + addRow.counter + `][total_price]" class="form-control" placeholder="total items value.." disabled>`;


            }

            function deleteRow(r) {
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("myTable").deleteRow(i);
                document.getElementById("myTable").deleteRow(i++);

            }


        </script>
        </div>
    </div>
@endsection
