<x-backend.layout.master>
   

        <div class="card mb-4">
        <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Resorts List
            <x-backend.utilities.link-create href="{{route('resorts.create')}}" text="Add Resort"/>
            
             
        
                            
                        
                                <div class="search-container">
                             
                                          <form action="{{ route('resorts.index') }}" method="GET" role="search">
                                    <input type="text" placeholder="Search.." name="search" value={{$search}}>
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                  </form>
                                </div>
                           
                
        
           
        </div>
        <div class="card-body">

    <x-backend.alerts.message type="success" :message="session('message')"/>

        <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-0.5">SL#</th>
                                <th class="col-md-1">Title</th>
                             
                                <th class="col-md-1">Rent</th>
                  
                                <th class="col-md-1">Images</th>
                                <th class="col-md-2.5">Description</th> 
                                <th class="col-md-0.5">Is_Active</th>
                               
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                           
                            
                            @foreach ($resorts as $resort)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $resort->title }}</td>
                                    <td>{{ $resort->rent }}</td>
                                    <td> 
                                        <ul>
                                            @foreach ($resort->resourt_images as $resourt_image)
                                                <li><img src="{{ asset('storage/'.$resourt_image->image_uri) }}" alt="{{$resort->title}}" height="50"></li>
                                            @endforeach
                                        </ul>
                                </td>
                                    

                                    
                                    <td>{{ $resort->description }}</td>
                                    <td>{{ $resort->is_active? 'Active' : 'In Active'}}</td>
                                 
                                    <td style="text-align:center; padding-left:0; padding-right:0;">
                                        <x-backend.utilities.link-show href="{{ route('resorts.show', ['resort'=>$resort->id]) }}" text="Show" />
                                        <x-backend.utilities.link-edit href="{{ route('resorts.edit', ['resort'=>$resort->id]) }}" text="Edit" />
                                        <x-backend.forms.delete action="{{ route('resorts.destroy', ['resort' => $resort->id]) }}"/>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $resorts->links() }}
                </div>
            </div>

            @push('css')
                <style>
                    /* body{
                        background-color: blue;
                    } */
                </style>
            @endpush
            @push('js')
                <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
                <script src="{{ asset('ui/backend/js/datatables-simple-demo.js') }}"></script>
            @endpush
</x-backend.layout.master>
