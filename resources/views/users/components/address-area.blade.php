@if($address_type == 'province')
    <select name="province" id="province" class="w-full ...">
        <option value="">Pilih Provinsi</option>
    </select>

    <script>
    $(function () {
        const selectedProvince = @json($profile->province ?? '');

        $.getJSON('/api/provinces', function (res) {
            $.each(res.data, function (_, item) {
                let value = `${item.code}|${item.name}`;
                let selected = value === selectedProvince ? 'selected' : '';
                $('#province').append(
                    `<option value="${value}" ${selected}>${item.name}</option>`
                );
            });

            if (selectedProvince) {
                $('#province').trigger('change');
            }
        });
    });
    </script>
@elseif($address_type == 'city')
    <select name="city" id="city" class="w-full ...">
        <option value="">Pilih Kabupaten</option>
    </select>

    <script>
    $(function () {
        const selectedCity = @json($profile->city ?? '');

        $('#province').on('change', function () {
            let raw = $(this).val();
            $('#city').html('<option value="">Pilih Kabupaten</option>');

            if (!raw) return;

            let provinceCode = raw.split('|')[0];

            $.getJSON(`/api/regencies/${provinceCode}`, function (res) {
                $.each(res.data, function (_, item) {
                    let value = `${item.code}|${item.name}`;
                    let selected = value === selectedCity ? 'selected' : '';
                    $('#city').append(
                        `<option value="${value}" ${selected}>${item.name}</option>`
                    );
                });

                if (selectedCity) {
                    $('#city').trigger('change');
                }
            });
        });
    });
    </script>
@elseif($address_type == 'district')
    <select name="district" id="district" class="w-full ...">
        <option value="">Pilih Kecamatan</option>
    </select>

    <script>
    $(function () {
        const selectedDistrict = @json($profile->district ?? '');

        $('#city').on('change', function () {
            let raw = $(this).val();
            $('#district').html('<option value="">Pilih Kecamatan</option>');

            if (!raw) return;

            let cityCode = raw.split('|')[0];

            $.getJSON(`/api/districts/${cityCode}`, function (res) {
                $.each(res.data, function (_, item) {
                    let value = `${item.code}|${item.name}`;
                    let selected = value === selectedDistrict ? 'selected' : '';
                    $('#district').append(
                        `<option value="${value}" ${selected}>${item.name}</option>`
                    );
                });

                if (selectedDistrict) {
                    $('#district').trigger('change');
                }
            });
        });
    });
    </script>
@elseif($address_type == 'subdistrict')
    <select name="subdistrict" id="subdistrict" class="w-full ...">
        <option value="">Pilih Kelurahan</option>
    </select>

    <script>
    $(function () {
        const selectedSubdistrict = @json($profile->subdistrict ?? '');

        $('#district').on('change', function () {
            let raw = $(this).val();
            $('#subdistrict').html('<option value="">Pilih Kelurahan</option>');

            if (!raw) return;

            let districtCode = raw.split('|')[0];

            $.getJSON(`/api/villages/${districtCode}`, function (res) {
                $.each(res.data, function (_, item) {
                    let value = `${item.code}|${item.name}`;
                    let selected = value === selectedSubdistrict ? 'selected' : '';
                    $('#subdistrict').append(
                        `<option value="${value}" ${selected}>${item.name}</option>`
                    );
                });
            });
        });
    });
    </script>
@endif

