@php
    $firstIndex = ($selectedCompany) ? $selectedCompany : array_key_first($compnies->toArray())
@endphp
<div class="row">
    <div class="col-lg-6">
        <label for="">Select Company:</label>
    </div>
    <div class="col-lg-6">
        <div class="input-group h-100">
            <select name="company" id="select-company" class="form-control">
                @foreach ($compnies as $key => $company)
                    <option co-key="{{ $key }}" {{($firstIndex == $company->id) ? 'selected' : null}} value="{{ $company->id }}">{{ $company->company_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <label for="">Square Footage:</label>
    </div>
    <div class="col-lg-6 mt-1">
        <div class="input-group h-100">
            <input type="number" class="form-control" id="total-sqare" name="total_sqare" value=""
                placeholder="Total area in squarefit">
        </div>
    </div>
    <div class="col-lg-6">
        <label for="">Year Built:</label>
    </div>
    <div class="col-lg-6 mt-1">
        <div class="input-group h-100">
            <select name="" id="total-years" class="form-control">
                <option value="" disabled selected>Please select --</option>
                @foreach (config('constants.year_built') as $item)
                    <option value="{{ $item }}">{{ $item }} Year</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<hr class="text-dgreen">
<div class="row company-detail-block">
    @foreach ($compnies[$firstIndex]->pricing['item_name'] as $key => $item)
        <div class="col-lg-6">
            <label for="">{{ $item }}</label>
        </div>
        <div class="col-lg-6 mt-1">
            <div class="input-group h-100">
                <input type="text" class="form-control" name="" placeholder=""
                    value="{{ $compnies[$firstIndex]->pricing['item_price'][$key] }}" readonly>
                <span class="my-auto ml-2" style="margin-left: 10px"><input type="checkbox"
                        class="form-check-input pricing-checkbox"
                        check-price="{{ $compnies[$firstIndex]->pricing['item_price'][$key] }}" name="item_selection[]"
                        {{ in_array($item, $compnies[$firstIndex]->pricing['item_selection']) ? 'checked disabled' : null }}
                        value="{{ $item }}"></span>
            </div>
        </div>
    @endforeach
</div>
<hr class="text-dgreen">
<div class="row mt-2">
    <div class="col-lg-6">
        <label for=""><strong>Total:</strong></label>
    </div>
    <div class="col-lg-6">
        <h6 class="text-dgreen total-price">0$</h6>
    </div>
</div>

@section('script')
<script>
    $(document).ready(function() {

        let currency = "{{ currency() }}"
        let totalPrice = 0;
        let allCompanies = @json($compnies);
        console.log('companies - ', allCompanies);
        let selectedCompany = @json($firstIndex); // bydefault first company will be selected
        calculateTotalPrice(allCompanies[selectedCompany])

        $(document).on('change', '.pricing-checkbox', function() {
            let checkPrice = $(this).attr('check-price');
            console.log('checkPrice ', checkPrice);
            if ($(this).prop('checked') == true) totalPrice += parseFloat(checkPrice)
            else totalPrice -= parseFloat(checkPrice)
            setTotalPrice(totalPrice)
        })

        $('.total-sqare').change(function(e) {
            e.preventDefault();

        });
        $('#total-sqare').on('keyup', function() {
            calculateTotalPrice(allCompanies[selectedCompany])
        })
        $('#total-sqare').on('change', function() {
            calculateTotalPrice(allCompanies[selectedCompany])
        })
        $('#total-years').on('change', function() {
            calculateTotalPrice(allCompanies[selectedCompany])
        })
        $('#select-company').on('change', function(){
            selectedCompany = $(this).find(":selected").attr('co-key')
            console.log('selected ', selectedCompany);
            let html = ''
            // let checked = null
            $.map(allCompanies[selectedCompany].pricing['item_name'], function (values, index) {
                console.log(jQuery.inArray(values, allCompanies[selectedCompany].pricing['item_selection']));
                let checked = (jQuery.inArray(values, allCompanies[selectedCompany].pricing['item_selection']) >= 0) ? "checked disabled" : null
                console.log('cheked', checked);
                html +=    '<div class="col-lg-6">\
                        <label for="">'+values+'</label>\
                    </div>\
                    <div class="col-lg-6 mt-1">\
                        <div class="input-group h-100">\
                            <input type="text" class="form-control" name="" placeholder="" value="'+allCompanies[selectedCompany].pricing['item_price'][index]+'" readonly>\
                            <span class="my-auto ml-2" style="margin-left: 10px"><input type="checkbox" class="form-check-input pricing-checkbox" check-price=" '+allCompanies[selectedCompany].pricing['item_price'][index]+'" name="item_selection[]" '+checked+' value="'+values+'"></span>\
                        </div>\
                    </div>'
            });
            calculateTotalPrice(allCompanies[selectedCompany])
            $('.company-detail-block').html(html)
        })

        // resueable functions block
        function calculateTotalPrice(company) {
            totalPrice = 0;
            $.map(company.pricing.item_name, function(values, index) {
                if ($.inArray(values, company.pricing.item_selection) >= 0) {
                    totalPrice += parseFloat(company.pricing.item_price[index])
                }
            });
            let totalSquare = $('#total-sqare').val();
            let totalYears = $('#total-years').val();
            totalPrice += parseFloat(company.per_square) * totalSquare
            totalPrice += parseFloat(company.per_year) * totalYears
            setTotalPrice(totalPrice)
        }

        function setTotalPrice(price) {
            $('.total-price').text(currency + price)
            return true
        }
    });
</script>
@endsection
