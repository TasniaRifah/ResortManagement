<x-backend.layout.master>
    {{-- <x-slot:title>
        Roles
        </x-slot:> --}}

            <div class="card mb-4">

                <div class="card-header">
                    <i class="fas fa-table "></i>
                    Role List
                    <x-backend.utilities.link-create href="{{route('roles.create')}}" text="Add Role"/>
                    
           
                </div>
                <div class="card-body">
                  <x-backend.alerts.message type="success" :message="session('message')" class="text-dark"/>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-.5">SL#</th>
                                <th class="col-md-9">Role Name</th>
                             

                            </tr>
                        </thead>

                        <tbody>
                            {{-- {{dd($categories)}} --}}

                            @foreach($roles as $role)
                            <tr>
                                <td>{{$loop->iteration}} </td>
                                <td>{{$role->name}}</td>
                                
                              
                                
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
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
            <script src="{{asset('ui/backend/js/datatables-simple-demo.js')}}"></script>
            @endpush
</x-backend.layout.master>