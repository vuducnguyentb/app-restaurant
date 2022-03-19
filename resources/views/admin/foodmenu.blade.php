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
                    <div class="col-12 grid-margin stretch-card">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Food</h4>
                                <form class="forms-sample" action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName1">Title</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="title" placeholder="Write a title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Price</label>
                                        <input class="form-control" id="exampleInputEmail3" type="number" name="price" placeholder="price">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Description</label>
                                        <input  class="form-control" id="exampleInputPassword4" type="text" name="description" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image"  class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                            <span class="input-group-append">
                                     <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Add New</button>
                                </form>
                            </div>
                        </div>
                    </div>
{{--                   list foods--}}
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">List Foods</h4>
                                </p>
                                <div class="table-responsive">
                                    <table class="table table-dark w-100" >
                                        <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Food name </th>
                                            <th> Price </th>
                                            <th> Description </th>
                                            <th> Image </th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($foods as $key=>$item)
                                        <tr>
                                            <td> {{$key}} </td>
                                            <td> {{$item->title}} </td>
                                            <td>{{$item->price}}</td>
                                            <td >
                                                <p style="word-wrap: break-word; width: 200px;white-space:nowrap; overflow: hidden;">
                                                    {{$item->description}}
                                                </p>
                                            </td>
                                            <td>
                                                <img class=" rounded " src="/foodimage/{{$item->image}}" alt="">
                                            </td>
                                            <td>
                                                <a  class="btn btn-outline-danger btn-fw" href="{{url('/deletemenu',$item->id)}}">Delete</a>
                                                <a  class="btn btn-outline-warning btn-fw" href="{{url('/updateview',$item->id)}}">Update</a>
                                            </td>
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
