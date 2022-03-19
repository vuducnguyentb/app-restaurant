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
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">List Reservations</h4>
                                </p>
                                <div class="table-responsive">
                                    <table class="table table-dark">
                                        <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Name </th>
                                            <th> Email </th>
                                            <th> Phone </th>
                                            <th> Date </th>
                                            <th> Time </th>
                                            <th> Message </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($reservations as $key=>$item)
                                            <tr>
                                                <td> {{$key}} </td>
                                                <td> {{$item->name}} </td>
                                                <td> {{$item->email}}</td>
                                                <td>{{$item->phone}}</td>
                                                <td>{{$item->date}}</td>
                                                <td>{{$item->time}}</td>
                                                <td>{{$item->message}}</td>
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
@include('admin.adminscript')
</body>
</html>
