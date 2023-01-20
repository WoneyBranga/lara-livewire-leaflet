<div>
    <div class="w-92 h-[500px]"
         id='map2'
         wire:ignore>x</div>
</div>

@push('scripts')
    <script>
        var littleton = L.marker([39.61, -105.02]).bindPopup('This is Littleton, CO.'),
            denver = L.marker([39.74, -104.99]).bindPopup('This is Denver, CO.'),
            aurora = L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.'),
            golden = L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.');

        var polygon = L.polygon([
            [39.61, -105.02],
            [39.74, -104.99],
            [39.73, -104.8]
        ]);

        var polyline = L.polyline([
            [39.73, -104.8],
            [39.61, -105.02],
            [39.74, -104.99]
        ]);


        var cities = L.layerGroup([littleton, denver, aurora, golden])
            .addLayer(polygon)

        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        });

        var teste = L.layerGroup([aurora, golden, polygon]);
        var streets = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap2'
        });

        var map = L.map('map2', {
            center: [39.73, -104.99],
            zoom: 10,
            layers: [osm, cities, teste]
        });


        // var baseMaps = {
        //     "OpenStreetMap": osm,
        //     "Mapbox Streets": streets
        // };

        var overlayMaps = {
            "Cities": cities,
            "Teste": teste
        };
        var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);

        var baseMaps = {
            "<span style='color: gray'>Grayscale</span>": 1,
            "Streets": streets
        };

        var crownHill = L.marker([39.75, -105.09]).bindPopup('This is Crown Hill Park.'),
            rubyHill = L.marker([39.68, -105.00]).bindPopup('This is Ruby Hill Park.');

        var parks = L.layerGroup([crownHill, rubyHill, polyline]);
        var satellite = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap2'
        });

        layerControl.addBaseLayer(satellite, "Satellite");
        layerControl.addOverlay(parks, "Parks");
    </script>
@endpush
