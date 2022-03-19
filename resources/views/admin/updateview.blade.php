<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('admin.admincss')
</head>
<body>
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
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Update food</h4>
                                <form class="forms-sample" action="{{url('/update/'.$food->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName1">Title</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="title" placeholder="Write a title" value="{{$food->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Price</label>
                                        <input class="form-control" id="exampleInputEmail3" type="number" name="price" placeholder="price" value="{{$food->price}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Description</label>
                                        <input  class="form-control" id="exampleInputPassword4" type="text" name="description" placeholder="Description" value="{{$food->description}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <img src="/foodimage/{{$food->image}}" name="imageOld"alt="">
                                        <input type="file" name="image"  class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                            <span class="input-group-append">
                                     <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Updated</button>
                                </form>
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

@include("admin.adminscript")


</body>
</html>
