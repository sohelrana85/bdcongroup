<div class="banner-area-three banner-bg home">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($slider as $key => $item)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
              <img src="{{ asset($item->image) }}" class="d-block w-100" alt="...">
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon slider-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon slider-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- <div class="container">
        <div class="banner-content banner-content-three"> --}}
            
            {{-- <span>Since 2002</span>
            <h1>Good Planning Means Success In Business</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce molestie varius leo, non laoreet
                purus viverra id.</p>
            <div class="banner-btn">
                <a href="contact.html" class="contact-btn">Contact Us</a>
                <a href="#" class="get-btn">Get A Quote</a>
            </div> --}}
        {{-- </div>
    </div> --}}
</div>