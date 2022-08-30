<x-backend.layout.master>
    {{-- <x-slot:title>
        Edit resort
    </x-slot:title> --}}

    <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Edit Resort
                    <x-backend.utilities.link-index href="{{route('resorts.index')}}" text="Resorts List "/>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <x-backend.alerts.errors />
                    @endif
                                <form action="{{ route('resorts.update', ['resort' => $resort->id]) }}" method="post" enctype="multipart/form-data">
                                  
                                  @csrf
                                  @method('patch')
                                    <x-backend.forms.input name="title" type="text" :value="old('title', $resort->title)" />
                                    <x-backend.forms.input name="rent" type="number" :value="old('rent', $resort->rent)" />
                                    
                                        {{-- <label for="">Category Name</label>
                                      
                                        @foreach ($categories as $key=>$value)
                                        <div class="mb-3 form-check">
                                            <input name="category_ids[]" class="form-check-input" type="checkbox" value="{{ $key }}" id="{{ $key  }}" {{ in_array($key, $selectedCategories) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{ $key }}">
                                                {{ $value }}
                                            </label>
                                        </div>
                                        @endforeach --}}

                                        {{-- @error('category')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror --}}

                                        @foreach ($images as $image)
                                            <img src="{{ asset('/storage') . '/' . $image->image_uri }}" width="50" alt="">
                                        @endforeach
                                    
                                        <div class="input-group hdtuto control-group lst increment" >
                                            <input type="file" name="filenames[]" class="myfrm form-control">
                                            <div class="input-group-btn"> 
                                              <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                            </div>
                                          </div>
                                          <div class="clone hide">
                                            <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                              <input type="file" name="filenames[]" class="myfrm form-control">
                                              <div class="input-group-btn"> 
                                                <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                              </div>
                                            </div>
                                          </div>
                                  

                                    

                                    <x-backend.forms.textarea name="description" :value="old('description', $resort->description)"/>

                                    <label>Status</label>
                                    <div class="mb-3 form-check">
                                        <input name="is_active" class="form-check-input" type="checkbox" value="1" id="isActiveInput" {{ $resort->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label" for="isActiveInput">
                                            Active
                                        </label>
                                    </div>
                                    <x-backend.forms.submit text="Update"/>
                                   
                                </form>
                </div>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $(".btn-success").click(function(){ 
              var lsthmtl = $(".clone").html();
              $(".increment").after(lsthmtl);
          });
          $("body").on("click",".btn-danger",function(){ 
              $(this).parents(".hdtuto").remove();
          });
        });
    </script>
</x-backend.layout.master>
