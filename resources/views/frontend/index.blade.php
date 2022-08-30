<!-- navbar-->
<x-frontend.layout.master>
    <div id="all">
        <div id="content">

            <div id="hot">
                <div class="box py-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="mb-0">Resort</h2>
                            </div>
                        </div>
                    </div>
                </div>
<div style="display: flex" >
  @foreach ($resorts as $resort)
  <div class="card">
    <div class="card-header">
      {{$resort->title}}
    </div>
    <div class="card-body">
      <p class="card-text">  
        
        <ul style="display:flex; list-style-type: none;">
          @foreach ($resort->resourt_images as $resourt_image)
              <li style="margin-right:20px" ><a href="{{ route('frontend.resort.detail', ['resort' => $resort->id]) }}"><img src="{{ asset('storage/'.$resourt_image->image_uri) }}" alt="{{$resort->title}}" height="50" ></a></li>
          @endforeach
      </ul>
      </p>
      <h5 class="card-title">{{$resort->rent}}</h5>
      <p class="card-text">  {{$resort->description}}</p>
      <a href="{{ route('frontend.resort.detail', ['resort' => $resort->id]) }}" class="btn btn-primary">View Details</a>
    </div>
  </div>
  @endforeach
</div>
               
               
                {{-- <div class="container">
                  <div class="resort-slider owl-carousel owl-theme">
                    @foreach ($resorts as $resort)
                    <div class="item">
                      <div class="resort">
                          <div class="flip-container">
                              <div class="flipper">
                                @foreach ($resort->resourt_images as $resourt_image)
                                {{-- <li><img src="" alt="" ></li> --}}
                    
                                  {{-- <div class="front"><a href="detail"><img
                                              src="{{ asset('storage/'.$resourt_image->image_uri) }}" alt="{{$resort->title}}"
                                              class="img-fluid" height="50" ></a></div>
                                  <div class="back"><a href="detail"><img
                                              src="{{ asset('ui/frontend/img/resort_2.jpg') }}" alt=""
                                              class="img-fluid"></a></div>
                              </div><a href="detail.html" class="invisible"><img
                                      src="{{ asset('ui/frontend/img/resort2.jpg') }}" alt=""
                                      class="img-fluid"></a>
                          </div>
                          @endforeach
                          <div class="text">
                              
                              <p class="price">
                              <a href="">{{$resort->title}}</a>
                            </p>
                              <p class="price">
                                  <del></del>
                              </p>
                              <p class="price">
                               <a href="" class="btn-primary btn-sm btn">View Details</a>
                            </p>
                          </div> --}}
                          <!-- /.text-->
                          
                          <!-- /.ribbon-->
                      {{-- </div> --}}
                      <!-- /.resort-->
                      {{-- @endforeach
                  </div>  --}}
                 
                     








                      <!-- /.resort-slider-->
                  </div>
                  <!-- /.container-->
              </div> 
             
</x-frontend.layout.master>
