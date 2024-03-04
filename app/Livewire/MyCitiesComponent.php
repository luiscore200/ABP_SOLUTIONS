<?php

namespace App\Livewire;
use App\Models\City;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class MyCitiesComponent extends Component
{
    use LivewireAlert;

    public $cities=[];
    public function mount(){
        $this->getCities();
    }
    public function getCities(){

        $this->cities = City::where('user_id',auth()->user()->id)->get();

    }

    public function deleteCity($id){
    $city=City::FindOrFail($id);

    if ($city) {
        $city->delete();
        $this->alert('success', 'City deleted successfully!',[
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
           ]);
        $this->getCities();
    
    }
    }
   

    public function render()
    {
        return view('livewire.my-cities-component');
    }
}
