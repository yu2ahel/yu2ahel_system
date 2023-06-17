<style>
    .toggle{
        margin: 5px;
    }
</style>
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_group_id', 'User Group:') !!}
    {!! Form::select('user_group_id', $usergroupItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Dashboard Accesable Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_dashboard_accesable', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_dashboard_accesable', '1', null, ['class' => 'form-check-input', 'onclick'=>'processForm()','id'=>"is_dashboard_accesable_id"]) !!}
        {!! Form::label('is_dashboard_accesable', 'Is Dashboard Accesable', ['class' => 'form-check-label']) !!}
    </div>
</div>

<div class="form-group col-sm-6">
    <h5>services</h5>
@foreach ( $services as $i => $service )
    {!! Form::checkbox( 'services[]',
                  $i,
                  isset($saved_service) && in_array($i,$saved_service),
                  ['class' => 'toggle-class', 'id' => $service,
                  'data-onstyle'=>"success", 'data-offstyle'=>"danger", 'data-toggle'=>"toggle" ,'data-on'=>"Active" ,'data-off'=>"InActive"
                  ]
                  ) !!}
{!! Form::label($service,  $service) !!}

<br>
@php
 $display = (isset($userType->is_dashboard_accesable_id) && $userType->is_dashboard_accesable_id == 1 ) ? "block;" :"none;";
@endphp

@endforeach
</div>
<div class="form-group col-sm-12" id="permissions" style="display:{{$display}}")>
    <h5>permissions</h5>
@foreach ( $permissions as $i => $permission )
    {!! Form::checkbox( 'permissions[]',
                  $i,
                  isset($saved_permissions) && in_array($i,$saved_permissions),
                  ['class' => 'toggle-class', 'id' => $permission,
                  'data-onstyle'=>"success", 'data-offstyle'=>"danger", 'data-toggle'=>"toggle" ,'data-on'=>"Active" ,'data-off'=>"InActive"
                  ]
                  ) !!}
{!! Form::label($permission,  $permission) !!}
<br>
@endforeach
</div>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            if($('#is_dashboard_accesable_id').is(":checked")) {
            $("#permissions").show();
        }else {
            $("#permissions").hide();
        }
        });

    function processForm() {
        if($('#is_dashboard_accesable_id').is(":checked")) {
            $("#permissions").show();
        }else {
            $("#permissions").hide();
        }
    }

</script>
