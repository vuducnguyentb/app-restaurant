<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.admincss')
</head>
<body>

<!-- container-scroller -->
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
@include('admin.navbar')

<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <!-- partial -->
        <div class="main-panel p-0">
            <div class="content-wrapper">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('deleted'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('deleted') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">List Orders</h4>
                                <form action="{{url('/search')}}" method="get">
                                    @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search name or food name..." name="search">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary" type="submit">Search</button>
                                        </div>

                                    </div>
                                </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-dark">
                                        <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Name </th>
                                            <th> Phone </th>
                                            <th> Address </th>
                                            <th>Foodname</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $key=>$item)
                                            <tr>
                                                <td> {{$key}} </td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->phone}}</td>
                                                <td>{{$item->address}}</td>
                                                <td>{{$item->foodname}}</td>
                                                <td>{{$item->price}}$</td>
                                                <td>{{$item->quantity}}</td>
                                                <td>{{$item->price * $item->quantity}}$</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- partial -->
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@include("admin.adminscript")

</body>
</html>
