<div class="mb-4">


    <div class="form-group">
        <label for="selectCountry">Select a country:</label>
        <select class="form-control" wire:model.live="selectedCountry" id="selectCountry">
        <option value="" selected>select an option</option>
            @foreach ($countries as $option)
                <option value="{{ $option['iso2'] }}">{{ $option['name'] }}</option>
            @endforeach
        </select> 
    </div>
    @if($selectedCountry || $selectedCountry != "")
    <div class="form-group">
        <label for="selectOption">Select a State:</label>
        <select class="form-control" wire:model.live="selectedState" id="selectOption">
        <option value="" selected>select an option</option>
            @foreach ($data as $option)
                <option value="{{ $option['iso2'] }}">{{ $option['name'] }}</option>
            @endforeach
        </select> 
    </div>

      @endif

      @if($selectedState || $selectedState != "" )
    <div class="form-group">
        <label for="selectOption">Select a City:</label>
        <select class="form-control" wire:model.live="selectedCity" id="selectOption">
        <option value="" selected>select an option</option>
            @foreach ($data2 as $option)
                <option value="{{ $option['name'] }}">{{ $option['name'] }}</option>
            @endforeach
        </select> 
    </div>
    <div class="mt-4">
    <button type="submit" class="btn btn-outline-primary" wire:click="search" wire:disabled="!selectedCity">More info</button>
     <div>

      @endif
      

    
      
      @component('components.infoCityModal')
      
    
      @slot('tittle','Info City') 
     
      
      @slot('content')  <!-- 
    0 => array:6 [▼
    "name" => "Sincelejo"
    "latitude" => 9.2994
    "longitude" => -75.3958
    "country" => "CO"
    "population" => 279031
    "is_capital" => false
  ]
-->      <div class="modal-body ">



            @if ($selectedCity || $selectedCity != "")
                @if (isset($infoCity) && !empty($infoCity))
                    <p><strong>Nombre:</strong> {{ $infoCity[0]['name'] }}</p>
                    <p><strong>Population:</strong> {{ $infoCity[0]['population'] }}</p>
                    <p><strong>Latitude:</strong> {{ $infoCity[0]['latitude'] }}</p>
                    <p><strong>Longitude:</strong> {{ $infoCity[0]['longitude'] }}</p>
                    <p><strong>Country:</strong> {{ $infoCity[0]['country'] }}</p>
                    <p><strong>its a capital:</strong>@if(!$infoCity[0]['is_capital']) No @else Yes @endif</p>
                   
                @else
                    <p>No information found...</p>
                @endif
            @endif
        </div>
         @endslot
    

      
      
      @endcomponent



    <script>
       document.addEventListener('livewire:init', () => {
       Livewire.on('post-created', (event) => {

          var myModal = new bootstrap.Modal('#exampleModal');
          myModal.show();

       });
    });
    </script>


  
    


</div>
