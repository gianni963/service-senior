
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




