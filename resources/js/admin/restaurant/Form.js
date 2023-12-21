import AppForm from "../app-components/Form/AppForm";

Vue.component("restaurant-form", {
    mixins: [AppForm],
    data: function() {
        const defaultOpeningTime = "09:00:00";
        const defaultClosingTime = "19:00:00";
        return {
            form: {
                title: "",
                location: "London, United Kingdom",
                sub_title: "",
                description: "",
                enabled: true,
                phone_number: "",
                alternate_phone_number: "",
                link: "",
                email: "",
                instagram: "",
                facebook: "",
                youtube: "",
                latitude: 51.5,
                longitude: 0.1276,
                monday_open_time: defaultOpeningTime,
                monday_close_time: defaultClosingTime,
                tuesday_open_time: defaultOpeningTime,
                tuesday_close_time: defaultClosingTime,
                wednesday_open_time: defaultOpeningTime,
                wednesday_close_time: defaultClosingTime,
                thursday_open_time: defaultOpeningTime,
                thursday_close_time: defaultClosingTime,
                friday_open_time: defaultOpeningTime,
                friday_close_time: defaultClosingTime,
                saturday_open_time: defaultOpeningTime,
                saturday_close_time: defaultClosingTime,
                sunday_open_time: defaultOpeningTime,
                sunday_close_time: defaultClosingTime
            },
            mediaCollections: ["cover", "gallery", "pdf"]
        };
    },
    mounted() {
        this.loadGoogleMaps(() => {
            this.initMap();
        });
    },

    methods: {
        loadGoogleMaps(callback) {
            if (!window.google) {
                const script = document.createElement("script");
                script.src =
                    "https://maps.googleapis.com/maps/api/js?key=AIzaSyDvwIEcRlC_KgvbiWh8eZvXlUB0YcP2bVA&libraries=places&v=weekly";
                script.async = true;
                script.defer = true;
                script.onerror = () => {
                    console.error("Error loading Google Maps API.");
                };
                document.head.appendChild(script);

                script.onload = () => {
                    callback();
                };
            } else {
                callback();
            }
        },
        initMap() {
            // Initialize map with default or saved coordinates
            const initialLatLng = {
                lat: parseFloat(this.form.latitude) || 51.5,
                lng: parseFloat(this.form.longitude) || 0.1276
            };

            const map = new google.maps.Map(document.getElementById("map"), {
                center: initialLatLng,
                zoom: 12
            });

            const marker = new google.maps.Marker({
                position: initialLatLng,
                map: map,
                draggable: true
            });

            // Function to update form fields from marker position
            const updateFormLocation = position => {
                this.form.latitude = position.lat();
                this.form.longitude = position.lng();
            };

            // Event listener for marker dragend event
            marker.addListener("dragend", event => {
                const newPosition = marker.getPosition();
                updateFormLocation(newPosition);
            });

            // Event listener for map click event
            map.addListener("click", event => {
                const clickedLatLng = event.latLng;
                marker.setPosition(clickedLatLng);
                updateFormLocation(clickedLatLng);
            });

            // Create and add a search input box to the map
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards the map's viewport
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });

            // Array to store search result markers
            const searchMarkers = [];

            // Event listener for places changed event from the search box
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length === 0) {
                    return;
                }

                // Clear old search result markers
                searchMarkers.forEach(searchMarker => {
                    searchMarker.setMap(null);
                    // Add a click event listener to each search result marker
                    searchMarker.addListener("click", () => {
                        // Get the clicked marker's position
                        const clickedLatLng = searchMarker.getPosition();

                        // Update the form's location fields with the clicked latitude and longitude
                        updateFormLocation(clickedLatLng);
                    });
                });
                searchMarkers.length = 0;

                // Fit the map to the bounds of the search results
                const bounds = new google.maps.LatLngBounds();

                places.forEach(place => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }

                    // Create a marker for each place in the search results
                    const searchMarker = new google.maps.Marker({
                        map: map,
                        icon: {
                            url: place.icon,
                            size: new google.maps.Size(71, 71),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(25, 25)
                        },
                        title: place.name,
                        position: place.geometry.location
                    });

                    // Add a click event listener to each search result marker
                    searchMarker.addListener("click", () => {
                        // Get the clicked marker's position
                        const clickedLatLng = searchMarker.getPosition();

                        // Update the form's location fields with the clicked latitude and longitude
                        updateFormLocation(clickedLatLng);
                    });

                    // Extend bounds to include this marker
                    bounds.extend(place.geometry.location);
                    searchMarkers.push(searchMarker);
                });

                // Fit the map to the bounds of the search results
                map.fitBounds(bounds);
            });
        }
    }
});
