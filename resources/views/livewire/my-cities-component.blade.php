<div>


<table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Population</th>
                        <th scope="col">Country</th>
                        <th scope="col">Is_capital</th>
                        <th scope="col" style="width: 120px;">Actions</th> <!-- Reducir el ancho de la columna -->
                      </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($cities as $option)
                        <tr >
                            
                            <th scope="row">{{ $option['id']}}</th>
                            <td>{{ $option['name']}}</td>
                            <td>{{ $option['latitude']}}</td>
                            <td>{{ $option['longitude']}}</td>
                            <td>{{ $option['population']}}</td>
                            <td>{{ $option['country']}}</td>
                            @if(!$option['is_capital'])
                            
                            <td>No</td>
                            @else
                            <td>Si</td>
                            @endif
                            
                        
                          <td class="text-end">
                            <div class="btn-group text-end" role="group" aria-label="First group" >
                               <button type="button" class="btn btn-outline-secondary"  wire:confirm="Are you sure you want to delete this city?" wire:click="deleteCity({{ $option['id']}})">Delete</button>
                              </div>
                          </td>
                          </tr>

                          @endforeach
                    </tbody>
                  </table>
           
    <script>
     
    </script>




</div>
