<x-frontend.layout.master>
    <div id="all">
        <div id="content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <!-- breadcrumb-->
                {{-- <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li aria-current="page" class="breadcrumb-item active">Checkout - Address</li>
                  </ol>
                </nav> --}}
              </div>
              <div id="checkout" class="col-lg-9">
                <div class="box">
                  <form method="post" action="{{ route('booking') }}">
                    @csrf
                    <h1>Fill up the booking form</h1>

                    <div class="content py-3">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="firstname">Username</label>
                              <input id="firstname" type="text" class="form-control" value="{{old('name', $user->name)}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" value="{{old('email', $user->email)}}">
                          </div>
                        </div>
                      </div>
                      <!-- /.row-->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="company">Resort Name</label>
                            <input id="company" type="text" class="form-control" value="{{old('title', $resort->title)}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="street">Rent</label>classWiseStudentType
                            <input id="street" type="number" class="form-control" name="rent" value="{{old('rent', $resort->rent)}}">
                            <input  type="hidden" id="resort_id" name="resort_id" class="form-control" value="{{ $resort->id}}">
                          </div>
                        </div>
                      </div>
                      <!-- /.row-->
                      <div class="row">
                        {{-- <div class="col-md-6 col-lg-3">
                          <div class="form-group">
                            <label for="city">Company</label>
                            <input id="city" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <div class="form-group">
                            <label for="zip">ZIP</label>
                            <input id="zip" type="text" class="form-control">
                          </div>
                        </div> --}}
                        <div class="col-md-6 col-lg-3">
                          <div class="form-group">
                            <label for="from_date">From (Date)</label>
                            <input id="from_date" name="from_date" type="date" type="datetime-local"class="form-control"/>
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <div class="form-group">
                            <label for="to_date">To (Date)</label>
                            <input id="to_date" name="to_date" type="date" type="datetime-local"class="form-control"/>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <p class="text-danger" id="is_avalable"></p>
                        </div>
                        {{-- <div class="col-md-6">
                          <div class="form-group">
                            <label for="phone">Telephone</label>
                            <input id="phone" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" class="form-control">
                          </div> --}}
                        </div>
                      </div>
                      <!-- /.row-->
                      <div class="box-footer d-flex justify-content-between"><a href="{{ route('frontend.resort.detail', ['resort' => $resort->id]) }}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Resort Details</a>
                        <button id="confirmBtn" type="submit" class="btn btn-primary" onclick="return confirm('Email has already sent')">Confrim</button>
                      </div>
                    </div>
                   
                  </form>
                </div>
                <!-- /.box-->
              </div>
              <!-- /.col-lg-9-->
              {{-- <div class="col-lg-3">
                <div id="order-summary" class="card">
                  <div class="card-header">
                    <h3 class="mt-4 mb-4">Order summary</h3>
                  </div>
                  <div class="card-body">
                    <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>Order subtotal</td>
                            <th>$446.00</th>
                          </tr>
                          <tr>
                            <td>Shipping and handling</td>
                            <th>$10.00</th>
                          </tr>
                          <tr>
                            <td>Tax</td>
                            <th>$0.00</th>
                          </tr>
                          <tr class="total">
                            <td>Total</td>
                            <th>$456.00</th>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div> --}}
              <!-- /.col-lg-3-->
            </div>
          </div>

        </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
        $('#to_date').change(function(){
            var fromDate = $('#from_date').val();
            var resortId = $('#resort_id').val();
            var toDate = $(this).val();
            if(fromDate && toDate){
               console.log('From Date:', fromDate, toDate);
               $.get("{{ route('check.available')}}",{from_date:fromDate, to_date: toDate, resort_id: resortId},function(data){
                    console.log(data);
                   
                    if(data === " "){
                     
                      $('#is_avalable').empty().text(" ");
                      document.getElementById("confirmBtn").disabled = false;
                    } else{
                      $('#is_avalable').empty().text(data);
                      document.getElementById("confirmBtn").disabled = true;
                   

                    }
                    // $('#typeId').empty().html(data);
                    // $('#overlay .loader').hide();
                })
                
            }
        })
      </script>
</x-frontend.layout.master>