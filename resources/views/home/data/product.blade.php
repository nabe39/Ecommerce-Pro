<section class="product_section layout_padding" id="our_products">
    <div class="container" id="data-wrapper">
       <div class="heading_container heading_center">
          <h2>
             Our <span>Products</span>
          </h2>
          <div class="col">
            <form action="{{url('product_search')}}" method="get">
               @csrf
               <input class="placeholder col-7 rounded-pill input" type="text" name="search" placeholder="Search for something....">
               <input type="submit" value="search" class="rounded-pill">
            </form>
          </div>
          {{-- categories --}}
       <div class="row mt-4">
         <div class="col-12">
            <button class="tag-button active" data-tag="all"> All </button>
            @foreach($categories as $category)
            <button class="tag-button text-capitalize" data-tag="{{$category->category_name}}">{{$category->category_name}}</button>
            <!-- Add more buttons for your tags here -->
            @endforeach
         </div>
         <div class="posts-container col-12 d-flex flex-row flex-wrap ">
            @foreach ($product as $products)
            <div class="post col-sm-6 col-md-4 col-lg-4 "  data-tags="{{$products->category}}">
               <div class="box shadow mb-5 bg-white rounded ">
                  <div class="option_container">
                     <div class="options">
                        <a href="{{url('product_details',$products->id)}}" class="option1 btn" id="idProduct">
                          Details
                        </a>
                        {{-- fix UI/ add to cart --}}
                        <form action="{{url('add_cart',$products->id)}}" method="post">
                          @csrf
                          <div class="row">
                             <div class="col-md-4">
                                <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                             </div>
                             <div class="col-md-4">
                                <input  <?php echo $products->quantity == 0 ? "disabled" : ""; ?> type="submit" value="Add to Cart" class="option2 rounded-pill <?php echo $products->quantity == 0 ? 'disabled-btn' : ''; ?>">   </div>
                          </div>
                        </form>
                        {{-- fix UI --}}
                     </div>
                  </div>
                  <img  src="product/{{$products->image}}" class="card-img-top" alt="...">
                  <div class="card-body card-home">
                    <h5 class="card-title">{{$products->title}}</h5>
                    <p class="card-text">{{$products->description}}</p>
                 </div>
                  <div class="d-flex justify-content-between">
                    @if($products->quantity == 0)
                    <h5> Sold out </h5>
                    @else
                    <h5><i style="color:black" class="bi bi-cart "></i> {{$products->quantity}}</h5>
                    @endif
                    @if($products->discount_price !=null)
                    <h5 style="text-decoration: line-through; opacity:0.5">
                       {{$products->price}}$
                    </h5>
                    <h5 class="card-text pl-2">
                       {{$products->discount_price}}$
                    </h5>
                    @else
                    <h5>
                       {{$products->price}}$
                    </h5>
                  @endif
  
                 </div>
               </div>
            </div>
            @endforeach
         </div>


      </div>
      <button id="loadMoreButton">Load More</button>
         {{-- <div class="pagination">
            <ul class="pagination">
                {{ $product->links() }}
            </ul>
        </div> --}}
 </section>