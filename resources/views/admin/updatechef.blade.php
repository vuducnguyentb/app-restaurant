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
                                <h4 class="card-title">Update food chef</h4>
                                <form class="forms-sample" action="{{url('/updatefoodchef/'.$foodchef->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Write a name" value="{{$foodchef->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Speciality</label>
                                        <input  class="form-control" id="exampleInputPassword4" type="text" name="speciality" placeholder="Description" value="{{$foodchef->speciality}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <img src="/chefimage/{{$foodchef->image}}" name="imageOld"alt="">
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
