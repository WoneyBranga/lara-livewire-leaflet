<div>

    <x-card title="Mapa">
        <div class="h-[500px]"
             id='mapa_modal'
             wire:ignore>x</div>
        <x-slot name="footer">
            <div class="flex items-center justify-between">
                <x-button flat
                          label="Delete"
                          negative />
                <x-button label="Save"
                          primary />
            </div>
        </x-slot>
    </x-card>

    @push('scripts')
        <script>
            document.addEventListener('livewire:load', () => {

                var mapx = L.map('mapa_modal').setView([-27.592591, -48.585223], 12);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(mapx);
            });
        </script>
    @endpush
</div>
