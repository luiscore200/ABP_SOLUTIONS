<?php

namespace App\Livewire;
use App\Models\City;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Mail;
use App\Mail\CityInfoEmail;




class CityInfoComponent extends Component
{
    use LivewireAlert;

    public $countries = [];
    public String $selectedCountry="";
    public String $selectedState="";
    public $data=[];
    public $data2=[];
    public $selectedCity="";
    public $infoCity=[];
    public $ajusted;
    public $user;
    public $inList=0;
    
    

  
    public function mount(){
    $this->countries =$this->fetchData("","","countries");
    $this->user=auth()->user()->id;
    $this->inList = City::where('user_id', $this->user)->count();
   

    }

    public function fetchCity(String $name){

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.api-ninjas.com/v1/city?name=' . urlencode($name),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_HTTPHEADER => array(
            'X-Api-Key: eTb4wZhMEh4VBuueVcq6hg==OdB3Z2yFJB0dHm42'),
        ));
        
            $response = curl_exec($curl);
            $data = json_decode($response, true);
        
            curl_close($curl);
         
            return $data;

     }
    public function fetchData(String $country,String $state,String $type)
    {
        $curl = curl_init();
        $url ="";
        if($type=="countries"){
            $url= 'https://api.countrystatecity.in/v1/countries';
        }elseif($type=="states"){
            $url ='https://api.countrystatecity.in/v1/countries/'.$country.'/states';
        }elseif($type=="cities.country"){
            $url='https://api.countrystatecity.in/v1/countries/'.$country.'/cities';
        }elseif($type=="cities.state"){
            $url='https://api.countrystatecity.in/v1/countries/'.$country.'/states/'.$state.'/cities';
        }

    curl_setopt_array($curl, array(
    CURLOPT_URL => $url , 
    CURLOPT_RETURNTRANSFER => true, 
    CURLOPT_HTTPHEADER => array(
    'X-CSCAPI-KEY: QkpTWVU5czBLVG5KTkh1MEF1NmtsbDBralJxOWtJRUhweWE1YWdkVw==' ),
    ));

    $response = curl_exec($curl);
    $data = json_decode($response, true);

    curl_close($curl);
 
    return $data;
    }


    public function search(){
        if($this->selectedCity || $this->selectedCity!=""){
        $this->infoCity= $this->fetchCity($this->selectedCity);
  
          $this->prueba();
        
//dd($this->infoCity);  

        }
      
        
    }
    public function prueba(){
        $this->dispatch('post-created'); 
      
//$this->dispatch('open-modal');

    }

    public function saveCity(){
        $this->user=auth()->user()->id;
        
      
        $this->inList = City::where('user_id', $this->user)->count();

        if($this->inList>=5){
       
                $this->alert('warning','You cannot save any more cities, you have already reached the limit.',[
                    'position' => 'bottom-end',
                    'timer' => 3000,
                    'toast' => true,
                    'timerProgressBar' => true,
                   ]);
        }else {
         //   dd("si puede");

         if(City::where('name', $this->infoCity[0]['name'])->first()){
           
            $this->alert('warning','the city is already registered',[
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
               ]);

         }else{


            $response=  City::create([
                'user_id'=>$this->user,
                'name' => $this->infoCity[0]['name'],
                'latitude' => $this->infoCity[0]['latitude'],
                'longitude' => $this->infoCity[0]['longitude'],
                'country' => $this->infoCity[0]['country'],
                'population' => $this->infoCity[0]['population'],
                'is_capital' => $this->infoCity[0]['is_capital'],
            ]);

           // $this->sendCityInfoEmail($response->id);

            if ($response) {
        
                $this->alert('success', 'The city was successfully saved.',[
                    'position' => 'bottom-end',
                    'timer' => 3000,
                    'toast' => true,
                    'timerProgressBar' => true,
                   ]);                
            } else {
          
                $this->alert('danger','There was a problem guarding the city. Please try again.',[
                    'position' => 'bottom-end',
                    'timer' => 3000,
                    'toast' => true,
                    'timerProgressBar' => true,
                   ]);
                
            }


         }
        }  
    }
    public function sendCityInfoEmail($cityId)
    {
        $city = City::findOrFail($cityId);
        $user = auth()->user();

        Mail::to($user->email)->send(new CityInfoEmail($city));

    }
    


    public function render()
    {   
        if ($this->selectedCountry && $this->selectedCountry !== "") {
            $result = $this->fetchData($this->selectedCountry, "", "states");
            if (empty($result)) {
               $this->data= $result;
            } else {
                $this->data = $result;
    
                if ($this->selectedState && $this->selectedState !== "" && $this->selectedState !== "not found") {
                    $this->data2 = $this->fetchData($this->selectedCountry, $this->selectedState, "cities.state");
                }
            }
        }
    
        return view('livewire.city-info-component');
    }
}
