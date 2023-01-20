<div class="grid-flow-col">
    <div>
        <div class="grid-cols-10">

            <div class="h-[500px]"
                 id='map'
                 wire:ignore>x</div>
        </div>
        <div class="grid-cols-2 bg-gray-200">
            <table>
                <tr>
                    <td>Lat</td>
                    <td>Long</td>
                </tr>
                <tr>
                    <td>{{ $lat }}</td>
                    <td>{{ $long }}</td>
                </tr>
            </table>

        </div>

    </div>

</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', () => {

            var map = L.map('map').setView([51.505, -0.09], 1);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            var marker = L.marker([51.5, -0.09]).addTo(map);

            var circle = L.circle([51.508, -0.11], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 500
            }).addTo(map);

            var polygon = L.polygon([
                [51.509, -0.08],
                [51.503, -0.06],
                [51.51, -0.047]
            ]).addTo(map);


            const geoJson = {
                "type": "FeatureCollection",
                "features": [{
                        "type": "Feature",
                        "geometry": {
                            "coordinates": [
                                "106.73830754205",
                                "-6.2922403995615"
                            ],
                            "type": "Point"
                        },
                        "properties": {
                            "message": "Mantap",
                            "iconSize": [
                                50,
                                50
                            ],
                            "locationId": 30,
                            "title": "Hello new",
                            "image": "1a1eb1e4106fff0cc3467873f0f39cab.jpeg",
                            "description": "Mantap"
                        }
                    },
                    {
                        "type": "Feature",
                        "geometry": {
                            "coordinates": [
                                "106.68681595869",
                                "-6.3292244652013"
                            ],
                            "type": "Point"
                        },
                        "properties": {
                            "message": "oke mantap Edit",
                            "iconSize": [
                                50,
                                50
                            ],
                            "locationId": 29,
                            "title": "Rumah saya Edit",
                            "image": "0ea59991df2cb96b4df6e32307ea20ff.png",
                            "description": "oke mantap Edit"
                        }
                    },
                    {
                        "type": "Feature",
                        "geometry": {
                            "coordinates": [
                                "106.62490035406",
                                "-6.3266855038639"
                            ],
                            "type": "Point"
                        },
                        "properties": {
                            "message": "Update Baru",
                            "iconSize": [
                                50,
                                50
                            ],
                            "locationId": 22,
                            "title": "Update Baru Gambar",
                            "image": "d09444b68d8b72daa324f97c999c2301.jpeg",
                            "description": "Update Baru"
                        }
                    },
                    {
                        "type": "Feature",
                        "geometry": {
                            "coordinates": [
                                "106.72391468711",
                                "-6.3934163494543"
                            ],
                            "type": "Point"
                        },
                        "properties": {
                            "message": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                            "iconSize": [
                                50,
                                50
                            ],
                            "locationId": 19,
                            "title": "awdwad",
                            "image": "f0b88ffd980a764b9fca60d853b300ff.png",
                            "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
                        }
                    },
                    {
                        "type": "Feature",
                        "geometry": {
                            "coordinates": [
                                "106.67224158205",
                                "-6.3884963990263"
                            ],
                            "type": "Point"
                        },
                        "properties": {
                            "message": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                            "iconSize": [
                                50,
                                50
                            ],
                            "locationId": 18,
                            "title": "adwawd",
                            "image": "4c35cb1b76af09e6205f94024e093fe6.jpeg",
                            "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
                        }
                    },
                    {
                        "type": "Feature",
                        "geometry": {
                            "coordinates": [
                                "106.74495523289",
                                "-6.3642034511073"
                            ],
                            "type": "Point"
                        },
                        "properties": {
                            "message": "awdwad",
                            "iconSize": [
                                50,
                                50
                            ],
                            "locationId": 12,
                            "title": "adawd",
                            "image": "7c8c949fd0499eb50cb33787d680778c.jpeg",
                            "description": "awdwad"
                        }
                    }
                ]
            };


            const loadLocations = () => {
                geoJson.features.forEach((location) => {
                    const {
                        geometry,
                        properties
                    } = location

                    const {
                        iconSize,
                        locationId,
                        title,
                        image,
                        description
                    } = properties

                    let markerElement = document.createElement('div')
                    markerElement.className = 'marker' + locationId
                    markerElement.id = locationId
                    markerElement.style.backgroundImage =
                        'url(https://docs.mapbox.com/help/demos/custom-markers-gl-js/mapbox-icon.png)'
                    markerElement.style.backgroundSize = 'cover'
                    markerElement.style.width = '50px'
                    markerElement.style.hight = '50px'

                    console.log(geometry.coordinates)
                    L.marker([geometry.coordinates[1], geometry.coordinates[0]],
                            'https://docs.mapbox.com/help/demos/custom-markers-gl-js/mapbox-icon.png')
                        .bindPopup('teste')
                        .addTo(map);


                })
            }
            loadLocations()









            console.log('ini livewire', @this.test);

            map.on('    click', (e) => {
                const longitude = e.latlng.lng
                const latitude = e.latlng.lat
                console.log('lat: ' + latitude + ' Long: ' + longitude)
                @this.lat = latitude;
                @this.long = longitude;
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


        });
    </script>
@endpush
