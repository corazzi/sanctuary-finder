const selectors = {
    values: {
        latitude: '[data-latitude]',
        longitude: '[data-longitude]',
    },

    locationInput: '[data-location]',

    submit: '[data-submit]',
};

export default class CurrentLocation {
    static init() {
        const locationInput = document.querySelector(selectors.locationInput);
        const submit = document.querySelector('[data-submit]');

        locationInput.classList.add('opacity-50');
        locationInput.setAttribute('disabled', 'disabled');

        navigator.geolocation.getCurrentPosition(function (position) {
            document.querySelector(selectors.values.latitude).value = position.coords.latitude;
            document.querySelector(selectors.values.longitude).value = position.coords.longitude;
        });
    }
}
