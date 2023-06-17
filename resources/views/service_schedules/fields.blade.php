<!-- Beneficiary Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('beneficiary_id', 'Beneficiary Id:') !!}
    {!! Form::select('beneficiary_id', $beneficiaryItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Service Provider Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_provider_id', 'Service Provider Id:') !!}
    {!! Form::select('service_provider_id', $service_providerItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Branch Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_id', 'Branch Id:') !!}
    {!! Form::select('branch_id', $firm_branchItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Department Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_id', 'Department Id:') !!}
    {!! Form::select('department_id', $departmentItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Service Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_type_id', 'Service Type Id:') !!}
    {{-- {!! Form::select('service_type_id', $service_typeItems, null, ['class' => 'form-control custom-select']) !!} --}}
    {!! Form::select('service_type_id', [], null, ['class' => 'form-control custom-select']) !!}
</div>



<!-- Room Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_id', 'Room Id:') !!}
    {!! Form::select('room_id', $roomItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Date Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_time', 'Date Time:') !!}
    {!! Form::text('date_time', null, ['class' => 'form-control','id'=>'date_time']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_time').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Room Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('repeat', 'Repeat:') !!}
    {!! Form::select('repeat', $repeatItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Accounting Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accounting_type', 'Accounting Type:') !!}
    {!! Form::select('accounting_type', $accountingTypes , null, ['class' => 'form-control']) !!}
</div>

<!-- Base Fees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('base_fees', 'Base Fees:') !!}
    {!! Form::number('base_fees', null, ['class' => 'form-control','readonly'=>'true']) !!}
</div>

<!-- Extra Fees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('extra_fees', 'Extra Fees:') !!}
    {!! Form::number('extra_fees', null, ['class' => 'form-control']) !!}
</div>

<!-- Extra Fees Note Field -->
<div class="form-group col-sm-6">
    {!! Form::label('extra_fees_note', 'Extra Fees Note:') !!}
    {!! Form::text('extra_fees_note', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Fees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_fees', 'Total Fees:') !!}
    {!! Form::number('total_fees', null, ['class' => 'form-control','readonly'=>'true']) !!}
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

$(document).ready(function()
{
var id=$( "#department_id" ).val();
$.ajax
    ({
    type: "GET",
    url: "/get-service-types",
    data: { id: id},
    cache: false,
    success: function(data)
    {
    console.log(data); // I get error and success function does not execute
    var text = "";
    var result = Object.keys(data).map(function (key) {

          text += "<option value=" + Number(key) +">" + data[key] + "</option>";
      });
    var select = document.getElementById("service_type_id").innerHTML = text;
    var service_type_id=$( "#service_type_id" ).val();
    console.log(service_type_id);


}
});


$("#department_id").change(function()
{
    var id=$( "#department_id" ).val();
console.log(id);
$.ajax
    ({
    type: "GET",
    url: "/get-service-types",
    data: { id: id},
    cache: false,
    success: function(data)
    {
    console.log(data); // I get error and success function does not execute
    var text = "";
    var result = Object.keys(data).map(function (key) {

          text += "<option value=" + Number(key) +">" + data[key] + "</option>";
      });
    var select = document.getElementById("service_type_id").innerHTML = text;
    var service_type_id=$( "#service_type_id" ).val();
    console.log(service_type_id);


}
});
});

    document.getElementById("service_type_id").addEventListener('change', sendPriceRequest);
    document.getElementById("accounting_type").addEventListener('change', sendPriceRequest);
    document.getElementById("extra_fees").addEventListener('change', sendPriceRequest);
    function sendPriceRequest(){
        var service_type = $( "#service_type_id" ).val(); ;
        var accounting_type=$( "#accounting_type" ).val();
        var extra_fees=$( "#extra_fees" ).val();
        $.ajax
        ({
        type: "GET",
        url: "/get-base-fees",
        data: {service_type:service_type,accounting_type:accounting_type,extra_fees:extra_fees},
        cache: false,
        success: function(data)
        {
            document.getElementById("total_fees").value = data.final;
            document.getElementById("base_fees").value = data.base;
        }
        });

}


});

// $("#service_type_id").change(function()
// {
// console.log("dssad");
// var dataString = 'id='+ id;
// console.log(dataString);
// $.ajax
// ({
// type: "GET",
// url: "{{url('/users/abc')}}",
// data: dataString,
// cache: false,
// success: function(data)
// {
//   console.log("das"); // I get error and success function does not execute
// }
// });

// });

</script>
