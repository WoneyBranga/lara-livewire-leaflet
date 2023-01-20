<div>
    <div class="grid grid-cols-5 gap-0">

        <div class="col-span-3">
            <div class="h-[500px]"
                 id='map'
                 wire:ignore>x</div>
        </div>
        <div class="col-span-2">

            <div class="m-4 bg-sky-100 p-2 text-xs shadow">
                <ul>Localização do Cliente:
                    <li>Latitude: {{ $lat }}</li>
                    <li>Longitude: {{ $long }}</li>
                </ul>
            </div>

            <div class="m-4 bg-sky-100 p-2 text-xs shadow">
                <ul>Base mais próxima:
                    <p>Ponto mais Proximo: {{ $pontoProximoNome }}</p>
                    <p>Ponto mais Proximo Lat: {{ $pontoProximoLat }}</p>
                    <p>Ponto mais Proximo Long: {{ $pontoProximoLong }}</p>
                </ul>
            </div>

            <div class="m-4 bg-red-200 p-2 text-xs shadow">

                <p>Distanicia Reta: {{ round($distanciaReta / 1000, 2) }} Km</p>

                <p>Distancia Rodoviaria: {{ $distanciaRodovia }}</p>

                <p>Conta Qualquer = {{ $distanciaRodovia }} * R$ 10.000 = : {{ 10000 * $distanciaRodovia }}</p>

                <p>Test: {{ $test }}</p>
            </div>

        </div>
    </div>

</div>

@push('scripts')
    <script>
        var redIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var greenIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var map = L.map('map').setView([-27.592591, -48.585223], 12);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);


        document.addEventListener('livewire:load', () => {




            var geocoder = L.Control.geocoder({
                    defaultMarkGeocode: false,
                    placeholder: "Informe um endereço..."
                })

                .on('markgeocode', function(e) {
                    var bbox = e.geocode.bbox;
                    var poly = L.polygon([
                        bbox.getSouthEast(),
                        bbox.getNorthEast(),
                        bbox.getNorthWest(),
                        bbox.getSouthWest()
                    ]);
                    map.fitBounds(poly.getBounds());
                }).addTo(map);


            // var marker = L.marker([-48.585223, -27.592591]).addTo(map);

            // var circle = L.circle([51.508, -0.11], {
            //     color: 'red',
            //     fillColor: '#f03',
            //     fillOpacity: 0.5,
            //     radius: 500
            // }).addTo(map);

            // var polygon = L.polygon([
            //     [51.509, -0.08],
            //     [51.503, -0.06],
            //     [51.51, -0.047]
            // ]).addTo(map);





            // const geoJson = {
            //     "type": "FeatureCollection",
            //     "features": [{
            //             "type": "Feature",
            //             "geometry": {
            //                 "coordinates": [
            //                     "106.73830754205",
            //                     "-6.2922403995615"
            //                 ],
            //                 "type": "Point"
            //             },
            //             "properties": {
            //                 "message": "Mantap",
            //                 "iconSize": [
            //                     50,
            //                     50
            //                 ],
            //                 "locationId": 30,
            //                 "title": "Hello new",
            //                 "image": "1a1eb1e4106fff0cc3467873f0f39cab.jpeg",
            //                 "description": "Mantap"
            //             }
            //         },
            //         {
            //             "type": "Feature",
            //             "geometry": {
            //                 "coordinates": [
            //                     "106.68681595869",
            //                     "-6.3292244652013"
            //                 ],
            //                 "type": "Point"
            //             },
            //             "properties": {
            //                 "message": "oke mantap Edit",
            //                 "iconSize": [
            //                     50,
            //                     50
            //                 ],
            //                 "locationId": 29,
            //                 "title": "Rumah saya Edit",
            //                 "image": "0ea59991df2cb96b4df6e32307ea20ff.png",
            //                 "description": "oke mantap Edit"
            //             }
            //         },
            //         {
            //             "type": "Feature",
            //             "geometry": {
            //                 "coordinates": [
            //                     "106.62490035406",
            //                     "-6.3266855038639"
            //                 ],
            //                 "type": "Point"
            //             },
            //             "properties": {
            //                 "message": "Update Baru",
            //                 "iconSize": [
            //                     50,
            //                     50
            //                 ],
            //                 "locationId": 22,
            //                 "title": "Update Baru Gambar",
            //                 "image": "d09444b68d8b72daa324f97c999c2301.jpeg",
            //                 "description": "Update Baru"
            //             }
            //         },
            //         {
            //             "type": "Feature",
            //             "geometry": {
            //                 "coordinates": [
            //                     "106.72391468711",
            //                     "-6.3934163494543"
            //                 ],
            //                 "type": "Point"
            //             },
            //             "properties": {
            //                 "message": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            //                 "iconSize": [
            //                     50,
            //                     50
            //                 ],
            //                 "locationId": 19,
            //                 "title": "awdwad",
            //                 "image": "f0b88ffd980a764b9fca60d853b300ff.png",
            //                 "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            //             }
            //         },
            //         {
            //             "type": "Feature",
            //             "geometry": {
            //                 "coordinates": [
            //                     "106.67224158205",
            //                     "-6.3884963990263"
            //                 ],
            //                 "type": "Point"
            //             },
            //             "properties": {
            //                 "message": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            //                 "iconSize": [
            //                     50,
            //                     50
            //                 ],
            //                 "locationId": 18,
            //                 "title": "adwawd",
            //                 "image": "4c35cb1b76af09e6205f94024e093fe6.jpeg",
            //                 "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            //             }
            //         },
            //         {
            //             "type": "Feature",
            //             "geometry": {
            //                 "coordinates": [
            //                     "106.74495523289",
            //                     "-6.3642034511073"
            //                 ],
            //                 "type": "Point"
            //             },
            //             "properties": {
            //                 "message": "awdwad",
            //                 "iconSize": [
            //                     50,
            //                     50
            //                 ],
            //                 "locationId": 12,
            //                 "title": "adawd",
            //                 "image": "7c8c949fd0499eb50cb33787d680778c.jpeg",
            //                 "description": "awdwad"
            //             }
            //         }
            //     ]
            // };

            // const loadLocations = () => {
            //     geoJson.features.forEach((location) => {
            //         const {
            //             geometry,
            //             properties
            //         } = location

            //         const {
            //             iconSize,
            //             locationId,
            //             title,
            //             image,
            //             description
            //         } = properties

            //         let markerElement = document.createElement('div')
            //         markerElement.className = 'marker' + locationId
            //         markerElement.id = locationId
            //         markerElement.style.backgroundImage =
            //             'url(https://docs.mapbox.com/help/demos/custom-markers-gl-js/mapbox-icon.png)'
            //         markerElement.style.backgroundSize = 'cover'
            //         markerElement.style.width = '50px'
            //         markerElement.style.hight = '50px'

            //         console.log(geometry.coordinates)
            //         L.marker([geometry.coordinates[1], geometry.coordinates[0]],
            //                 'https://docs.mapbox.com/help/demos/custom-markers-gl-js/mapbox-icon.png')
            //             .bindPopup('teste')
            //             .addTo(map);
            //     })
            // }
            // loadLocations()









            console.log('ini livewire', @this.test);


            map.on('click', (e) => {
                const longitude = e.latlng.lng
                const latitude = e.latlng.lat

                @this.lat = latitude;
                @this.long = longitude;

                // L.marker([latitude, longitude], {
                //     icon: greenIcon
                // }).addTo(map);

                var consulta = @this.getPontoProximo()
                // @this.getHora();

                // console.log(consulta)
                // console.log(@this.get('pontoProximoNome'))
            });

            // map.on('click', onMapClick);
            // var popup = L.popup();

            // function onMapClick(e) {
            //     popup
            //         .setLatLng(e.latlng)
            //         .setContent("You clicked the map at " + e.latlng.toString())
            //         .openOn(map);
            // }

            // marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
            // circle.bindPopup("I am a circle.");
            // polygon.bindPopup("I am a polygon.");


            // var popup = L.popup()
            //     .setLatLng([51.513, -0.09])
            //     .setContent("I am a standalone popup.")
            //     .openOn(map);










            document.addEventListener('teste', event => {

                var tooltip = L.tooltip([@this.lat, @this.long], {
                        opacity: 0.8
                    })
                    .setContent("Ponto BASE de para análise.")
                    .addTo(map);

                var tooltip = L.tooltip([event.detail.response.latitude, event.detail.response
                        .longitude
                    ], {
                        opacity: 0.8
                    })
                    .setContent("Estação mais próxima do ponto BASE<br> Nome: <b>" +
                        event.detail.response.estacao + '</b><br> Distância reta: <b>' +
                        (event.detail.response.distancia) + 'Km </b>')
                    .addTo(map);

                var routeControl = L.Routing.control({
                    waypoints: [
                        L.latLng(@this.lat, @this.long),
                        L.latLng(event.detail.response.latitude, event.detail.response
                            .longitude)
                    ],
                    routeWhileDragging: false,
                    lineOptions: {
                        styles: [{
                            color: 'red',
                            opacity: 0.9,
                            weight: 5
                        }]
                    },
                    show: false,
                }, ).addTo(map);


                map.fitBounds(map.getBounds());


                routeControl.on('routesfound', function(e) {
                    var routes = e.routes;
                    var summary = routes[0].summary;

                    console.log('Distancia Rodoviaria' + summary.totalDistance / 1000 +
                        ' Km, tempo' + Math
                        .round(summary.totalTime % 3600 / 60) + ' minutes');

                    @this.distanciaRodovia = (summary.totalDistance / 1000);
                });





                // L.Routing.control({
                //     waypoints: [
                //         L.latLng(@this.lat, @this.long),
                //         L.latLng(event.detail.response.latitude, event.detail.response
                //             .longitude)
                //     ],
                //     routeWhileDragging: true,
                //     lineOptions: {
                //         styles: [{
                //             color: 'red',
                //             opacity: 1,
                //             weight: 10
                //         }]
                //     },
                //     createMarker: function(i, waypoint, n) {
                //         const marker = L.marker(waypoint.latLng, {
                //             draggable: true,
                //             bounceOnAdd: false,
                //             bounceOnAddOptions: {
                //                 duration: 1000,
                //                 height: 800,
                //                 function() {
                //                     (bindPopup(myPopup).openOn(map))
                //                 }
                //             },
                //             icon: L.icon({
                //                 iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                //                 iconSize: [38, 95],
                //                 iconAnchor: [22, 94],
                //                 popupAnchor: [-3, -76],
                //                 shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                //                 shadowSize: [68, 95],
                //                 shadowAnchor: [22, 94]
                //             })
                //         });
                //         return marker;
                //     }
                // }).addTo(map);








            });



        });
    </script>
@endpush
