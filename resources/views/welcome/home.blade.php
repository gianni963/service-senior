@extends('layouts.app')
@section('content')

<div class="welcome">

  <div class="col-md-12">

  <h1>Rechercher des prestataires près de chez vous</h1>
  <p>Entrez le type de service que vous désirez ainsi que votre commune</p>

    <form action="{{ route('annonces.category','category') }}" method="post">
        <div class="col-xs-4">
          @include('welcome.partials.form_searchcategory')
        </div>
        <div class="col-xs-4">
          @include('welcome.partials.form_searchzone')
        </div>
        <br/>
          <div class="form-group">
            <button style="margin-top : 5px;" type="submit" class="btn btn-default">Rechercher une annonce</button>
          </div>
        {{ csrf_field() }}
    </form>


    </div>
    <div class="col-md-6">
        <h3>Devenez prestataire et proposez vos services</h2>
        <p style="font-size: 18px; font-weight: bold;">Postez une annonce ou répondez directement à une annonce postée par un sénior</p>
        <div class="prestataire_image">
        <img src="{{ asset('img/prestataire2.png') }}" alt="aide senior" >

      </div>
      <p style="font-size: 18px; font-weight: bold;">Inscrivez-vous gratuitement en tant que prestataire pour pouvoir répondre ou postez une annonce</p>
    </div>

    <div class="col-md-6">
      <h3>Vous avez besoin d'une aide à domicile? <br/> Recherchez un prestataire</h3>
      <p style="font-size: 18px; font-weight: bold;">Vous pouvez recherchez une annonce parmi les annonces proposées par les prestataires ou postez votre annonce.</p>
      <div class="senior_image">
        <img src="{{ asset('img/senior2.jpg') }}" alt="aide senior" >
      </div>
      <p style="font-size: 18px; font-weight: bold;">Inscrivez-vous gratuitement en tant que sénior pour trouvez un service.</p>
    </div>

  </div>
   <!--    <div id="locationField">
      <input id="autocomplete" placeholder="Enter your address"
             type="text"></input>
  </div>

</div>   
<Pay></Pay>
    <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      autocomplete;
 

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.

         var options = {
        types: ['(cities)'],
        componentRestrictions: {country: "be"}
       };
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            options);

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
       
      }

    


    </script>
 -->
@endsection