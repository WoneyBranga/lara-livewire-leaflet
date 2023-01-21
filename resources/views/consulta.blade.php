<x-app-layout>
    @push('styles')
        <link crossorigin=""
              href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
              integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
              rel="stylesheet" />
        <link href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css"
              rel="stylesheet" />
        <link href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css"
              rel="stylesheet" />
    @endpush

    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
                integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
                crossorigin=""></script>
        <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    @endpush

    <div class="bg-gray-200">
        <div class="py-6">

            <div class="m-4 grid grid-cols-6 gap-2 p-4">
                <div>
                    <x-card padding='p-2'
                            title="Selecione um produto">
                        <div class="flex flex-col space-y-4">
                            <x-radio id="right-label"
                                     label="Produto A"
                                     lg
                                     wire:model.defer="model" />
                            <x-radio id="right-label"
                                     label="Produto B"
                                     lg
                                     wire:model.defer="model" />
                            <x-radio id="right-label"
                                     label="Produto C"
                                     lg
                                     wire:model.defer="model" />
                        </div>
                    </x-card>
                    <div class="my-1">
                        <x-card padding='p-2'
                                title="Selecione um produto">
                            <div class="flex flex-col space-y-3">
                                <x-button icon='view-grid-add'
                                          label="Produto A"
                                          lg
                                          slate />
                                <x-button icon="document-add"
                                          label="Produto B"
                                          lg
                                          slate />
                                <x-button icon="cube"
                                          label="Produto C"
                                          lg
                                          slate />
                            </div>
                        </x-card>
                    </div>
                </div>

                <div>
                    <x-card padding="p-2"
                            title="Dados Ponta A">
                        <x-button class="w-full"
                                  icon="location-marker"
                                  label="Informar um local"
                                  lg
                                  onclick=" Livewire.emit('openModal','mapa.mapa-modal' )"
                                  slate />
                    </x-card>

                    <div class="mt-2"></div>
                    <x-card padding="p-2"
                            title="Dados Ponta A">
                        <x-button class="w-full"
                                  icon="map"
                                  label="Informar um local"
                                  lg
                                  onclick=" Livewire.emit('openModal','mapa.mapa-modal' )"
                                  slate />
                        <div class="">
                            <div class="mt-4 flex flex-col items-start justify-items-start text-xs">
                                <table class="w-full table-auto border-separate bg-white text-left text-xs shadow">
                                    <tr class="odd:bg-gray-200 even:bg-gray-100 hover:bg-purple-100">
                                        <th>Latitude</th>
                                        <td>-22.345</td>
                                    </tr>
                                    <tr class="odd:bg-gray-200 even:bg-gray-100 hover:bg-purple-100">
                                        <th>Longitude</th>
                                        <td>-48.444</td>
                                    </tr>
                                    <tr class="odd:bg-gray-200 even:bg-gray-100 hover:bg-purple-100">
                                        <th>Estação próxima</th>
                                        <td>SC-FNS-FNS</td>
                                    </tr>
                                    <tr class="odd:bg-gray-200 even:bg-gray-100 hover:bg-purple-100">
                                        <th>Distância reta</th>
                                        <td>1.23Km</td>
                                    </tr>
                                    <tr class="odd:bg-gray-200 even:bg-gray-100 hover:bg-purple-100">
                                        <th>Distância rodovias</th>
                                        <td>223.34Km</td>
                                    </tr>
                                </table>
                                <div class="z-0 mt-2 h-40 w-full rounded-lg shadow"
                                     id="mini_mapa_a"></div>
                                <img alt=""
                                     class="mt-2 hidden rounded shadow"
                                     src="https://fakeimg.pl/300x300/">
                            </div>
                        </div>

                    </x-card>
                </div>

                <div>
                    <x-card padding="p-2"
                            title="Dados Ponta B">
                        <x-button class="w-full"
                                  icon="location-marker"
                                  label="Informar um local"
                                  lg
                                  onclick=" Livewire.emit('openModal','mapa.mapa-modal' )"
                                  slate />
                    </x-card>

                    <div class="mt-2"></div>
                    <x-card padding="p-2"
                            title="Dados Ponta B">
                        <x-button class="w-full"
                                  icon="location-marker"
                                  label="Informar um local"
                                  lg
                                  onclick=" Livewire.emit('openModal','mapa.mapa-modal' )"
                                  slate />
                        <div class="">
                            <div class="mt-4 flex flex-col items-start justify-items-start text-xs">
                                <table class="w-full table-auto border-separate bg-white text-left text-xs shadow">
                                    <tr class="odd:bg-gray-200 even:bg-gray-100 hover:bg-purple-100">
                                        <th>Latitude</th>
                                        <td>-22.345</td>
                                    </tr>
                                    <tr class="odd:bg-gray-200 even:bg-gray-100 hover:bg-purple-100">
                                        <th>Longitude</th>
                                        <td>-48.444</td>
                                    </tr>
                                    <tr class="odd:bg-gray-200 even:bg-gray-100 hover:bg-purple-100">
                                        <th>Estação próxima</th>
                                        <td>SC-FNS-FNS</td>
                                    </tr>
                                    <tr class="odd:bg-gray-200 even:bg-gray-100 hover:bg-purple-100">
                                        <th>Distância reta</th>
                                        <td>1.23Km</td>
                                    </tr>
                                    <tr class="odd:bg-gray-200 even:bg-gray-100 hover:bg-purple-100">
                                        <th>Distância rodovias</th>
                                        <td>223.34Km</td>
                                    </tr>
                                </table>
                                <div class="z-0 mt-2 h-40 w-full rounded-lg shadow"
                                     id="mini_mapa_b"></div>
                                <img alt=""
                                     class="mt-2 hidden rounded shadow"
                                     src="https://fakeimg.pl/300x300/">
                            </div>
                        </div>
                    </x-card>
                </div>
                <div class="col-span-3">
                    <x-card padding='p-2'
                            title="Análise Final">
                        <p class="font-bold">Topologia Final</p>

                        <img alt=""
                             class="hidden w-full rounded shadow"
                             src="https://fakeimg.pl/600x300/">

                        <div class="z-0 mt-2 h-96 w-full rounded-lg shadow"
                             id="mapa_topologia"></div>

                        <p class="font-bold">Dados Diversos Tabulados...</p>
                        <table class="w-full table-auto border-separate bg-white text-left text-xs shadow">
                            <thead class="bg-gray-300">
                                <tr>
                                    <th></th>
                                    <th>Cliente Ponta A</th>
                                    <th>Central A</th>
                                    <th>Central B</th>
                                    <th>Cliente Ponta B</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd:bg-gray-200 even:bg-gray-100 hover:bg-purple-100">
                                    <th>Distancia Reta</td>
                                    <td>-22.345</td>
                                    <td>-22.345</td>
                                    <td>-22.345</td>
                                    <td>-22.345</td>
                                </tr>
                                <tr class="odd:bg-gray-200 even:bg-gray-100 hover:bg-purple-100">
                                    <th>Distância Rodovia</td>
                                    <td>-22.345</td>
                                    <td>-22.345</td>
                                    <td>-22.345</td>
                                    <td>-22.345</td>
                                </tr>
                                <tr class="odd:bg-gray-200 even:bg-gray-100 hover:bg-purple-100">
                                    <th>parametros DVS</th>
                                    <td>-22.345</td>
                                    <td>-22.345</td>
                                    <td>-22.345</td>
                                    <td>-22.345</td>
                                </tr>
                            </tbody>
                        </table>
                    </x-card>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            var map = L.map('mini_mapa_a').setView([-27.592591, -48.585223], 9);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                // maxZoom: 19,
            }).addTo(map);
            map.removeControl(map.zoomControl);
            L.marker([-27.592591, -48.585223]).addTo(map);

            var map = L.map('mini_mapa_b').setView([-27.592591, -51.585223], 9);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                // maxZoom: 19,
            }).addTo(map);
            map.removeControl(map.zoomControl);
            L.marker([-27.592591, -51.585223]).addTo(map);


            var map = L.map('mapa_topologia');
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                // maxZoom: 10,
            }).addTo(map);
            map.removeControl(map.zoomControl);
            L.marker([-27.592591, -48.575223]).addTo(map);
            L.marker([-27.542591, -50.56223]).addTo(map);
            L.marker([-27.532591, -49.655223]).addTo(map);
            L.marker([-27.522591, -48.945223]).addTo(map);

            var bounds = L.latLngBounds(
                [-27.592591, -48.575223],
                [-27.542591, -50.565223],
                [-27.532591, -49.655223],
                [-27.522591, -48.945223]);

            var rectangle = L.rectangle(bounds, {
                color: "#000",
                weight: 1,
                opacity: 0.1
            }).addTo(map);
            map.fitBounds(rectangle.getBounds(), true);

            // map.setZoom(map.getZoom() - 1)

            // map.setMinZoom(map.getZoom() - 5)
            // map.fitBounds(bounds, true);
            // map.setMinZoom(map.getZoom());
        </script>
    @endpush

</x-app-layout>
