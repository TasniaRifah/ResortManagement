<x-backend.layout.master>
    {{-- <x-slot:title>
    resorts
        </x-slot:> --}}
        <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    resort Details
                    <!-- <a href="{{ route('resorts.create') }}" class="btn btn-sm btn-primary">Add New</a> -->
                    <!-- <a href="{{ route('resorts.index') }}" class="btn btn-sm btn-primary">list</a> -->
                    <x-backend.utilities.link-index href="{{route('resorts.index')}}" text="resorts List "/>
                </div>
                <div class="card-body">
                    @if (session('massage'))
                        <div class="alert alert-success" role="alert">
                            {{ session('massage') }}

                        </div>
                    @endif
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>

                                <th>Name</th>
                                <td>{{ $resort->title }}</td>

                            </tr>
                            <tr>

                                <th>Rent</th>
                                <td>{{ $resort->rent }}</td>

                            </tr>

                            <tr>

                                <th>Images</th>
                                <td>
                                    <ul>
                                        @foreach ($resort->resourt_images as $resourt_image)
                                            <li><img src="{{ asset('storage/'.$resourt_image->image_uri) }}" alt="{{$resort->title}}" height="50"></li>
                                        @endforeach
                                    </ul>
                                </td>

                            </tr>
                           
                           
                            <tr>

                                <th>Description</th>
                                <td>{{ $resort->description}}</td>

                            </tr>

                            <tr>

                                <th>created_at</th>
                                <td>{{ $resort->created_at }}</td>
                            </tr>
                            <tr>

                                <th>updated_at</th>
                                <td>{{ $resort->updated_at }}</td>
                            </tr>
                        </thead>


                    </table>
                    <x-backend.utilities.link-edit href="{{route('resorts.edit',['resort'=>$resort->id])}}" />

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
