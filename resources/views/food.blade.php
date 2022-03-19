<!-- ***** Menu Area Starts ***** -->
<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">
                @foreach($foods as $key=>$item)
                    <form action="{{url('/addcart',$item->id)}}" method="post">
                        @csrf
                <div class="item">
                    <div class='card' style="background-image: url('/foodimage/{{$item->image}}');">
                        <div class="price"><h6>{{$item->price}}$</h6></div>
                        <div class='info'>
                            <h1 class='title'>{{$item->title}}</h1>
                            <p class='description'>{{$item->description}}</p>
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="btn-shopcart d-flex justify-content-between">
                            <input type="number" name="quantity" min="1" value="1"  class="form-control" style="border-radius: 5px">
                            <input type="submit" class="btn btn-outline-warning" value="add cart" class="form-control">
                        </div>

                    </form>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- ***** Menu Area Ends ***** -->
