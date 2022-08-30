<x-frontend.layout.master >

    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                   
                    <div class="col-lg-3 order-2 order-lg-1">
                        <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
                        <div class="card sidebar-menu mb-4" style="height:50" >
                            <div class="card-header">
                                <h3 class="h4 card-title" style="text-align: center"><b>{{ $resort->title }}</b></h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled" style="margin-bottom: 1000px">
                                    <h4>Rent</h4>
                                    <p class="price">{{ $resort->rent."$" }}</p>
                                    <h4>Description</h4>
                                    <p>{{ $resort->description }}</p>
                                    <a href="{{route('bookings.index',['resort' => $resort->id])}}" class="btn btn-primary">
                                        Booking Now</a>
                                  </ul>
                             
                            </div>
                        </div>


                     
                    </div>
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="card-header">
                            <h3 class="h4 card-title" style="text-align: center"><b>Resort Photoes</b></h3>
                            <ul style="display:flex; list-style-type: none;">
                                @foreach ($resort->resourt_images as $resourt_image)
                                    <li style="margin-right:20px" ><a href="{{ route('frontend.resort.detail', ['resort' => $resort->id]) }}"><img src="{{ asset('storage/'.$resourt_image->image_uri) }}" alt="{{$resort->title}}" height="220" width="150" ></a></li>
                                @endforeach
                            </ul>
                        </div> 
                       
                </div>
            </div>
        </div>
    </div>
    @push('js')
       
        <script>
            const form = document.forms['addToCartForm'];
    
            const apiUrl = '/resorts/{{$resort->id}}/cart';
            form.addEventListener('submit', function(e) {
                e.preventDefault();
    
                const qtyInput = document.querySelector('input[name=qty]').value;
                const reqBody = JSON.stringify({
                    qty: qtyInput
                })
    
                fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: reqBody
                    })
                    .then(res => {
                        return res.json();
                    })
                    .then(result => {
                        if (result.status) {
                            const cartItemCountElement = document.querySelector('#cartItemCount');
                            console.log(cartItemCountElement);

                            cartItemCountElement.innerText = parseInt(cartItemCountElement.innerText) + 1;
                            document.querySelector('#addToCartBtn').setAttribute('disabled', 'disabled')
                            alert(result.message);
                        }
                    })
            });
        </script>
    @endpush
</x-frontend.layout.master>
