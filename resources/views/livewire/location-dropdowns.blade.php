<div class="mt-2">
    <div class="row mb-2">
        <div class="col-sm-3 mb-2">
            <label class="form-label" for="provinsi">{{ __('Provinsi') }} <span class="text-danger">*</span></label>
            <div wire:loading>Loading...</div>
            <div wire:ignore>
                <select wire:model="selectedProvinsi" style="width: 100%;" class="form-select form-select-sm"
                    name="provinsi" id="selectedProvinsi">
                    <option value="" selected disabled>Pilih Provinsi</option>
                    @foreach ($provinsi as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div wire:loading.remove></div>
        </div>

        @if (!is_null($selectedProvinsi))
            <div class="col-sm-3 mb-2">
                <label class="form-label" for="kabupaten">{{ __('Kabupaten / Kota') }} <span
                        class="text-danger">*</span></label>
                <div wire:loading>Loading...</div>
                <select wire:model="selectedKota" style="width: 100%;" class="form-select form-select-sm"
                    name="kota">
                    <option value="" selected disabled>Pilih Kabupaten / Kota</option>
                    @foreach ($kota as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
                <div wire:loading.remove></div>
            </div>
        @endif

        @if (!is_null($selectedKota))
            <div class="col-sm-3 mb-2">
                <label class="form-label" for="kecamatan">{{ __('Kecamatan') }} <span
                        class="text-danger">*</span></label>
                <div wire:loading>Loading...</div>
                <select wire:model="selectedKecamatan" style="width: 100%;" class="form-select form-select-sm"
                    name="kecamatan">
                    <option value="" selected disabled>Pilih Kecamatan</option>
                    @foreach ($kecamatan as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                <div wire:loading.remove></div>
            </div>
        @endif
        
        @if (!is_null($selectedKecamatan))
            <div class="col-sm-3 mb-2">
                <label class="form-label" for="kelurahan">{{ __('Kelurahan') }} <span
                        class="text-danger">*</span></label>
                <div wire:loading>Loading...</div>
                <select wire:model="selectedKelurahan" style="width: 100%;" class="form-select form-select-sm"
                    name="kelurahan">
                    <option value="" selected disabled>Pilih Kelurahan</option>
                    @foreach ($kelurahan as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                <div wire:loading.remove></div>
            </div>
        @endif
    </div>
</div>

@push('custom-script')

<script type="text/javascript">
    document.addEventListener("livewire:load", function() {
        $('#selectedProvinsi').select2();
        $('#selectedProvinsi').on('change', function(e) {
            var data = $('#selectedProvinsi').select2('val');
            @this.set('selectedProvinsi', data);
        });
    });
</script>
@endpush
