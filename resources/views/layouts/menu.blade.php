@php
    // dd(Auth::user()->userServiceProviders());
@endphp
@if (Auth::user()->hasRole('admin'))
{{-- <li class="nav-item">
    <a href="{{ route('firms.index') }}"
       class="nav-link {{ Request::is('firms*') ? 'active' : '' }}">
        <p>Firms</p>
    </a>
</li> --}}
<li class="nav-item has-treeview {{ Request::is('firms') || Request::is('firms/create') ? 'menu-is-opening menu-open' : 'menu-close' }}">
    <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-home"></i>
      <p>
        {{__('app.firms')}}
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
      <ul class="nav nav-treeview" style="display: {{ Request::is('firms') || Request::is('firms/create') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('firms.index') }}"
            class="nav-link {{ Request::is('firms') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
                <p>{{__('app.show firms')}}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('firms.create') }}"
            class="nav-link {{ Request::is('firms/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
                <p>{{__('app.create firm')}}</p>
            </a>
        </li>
      </ul>
</li>
<li class="nav-item has-treeview {{ Request::is('countries') || Request::is('countries/create') ? 'menu-is-opening menu-open' : 'menu-close' }}">
    <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-globe"></i>
      <p>
        {{__('app.countries')}}
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
      <ul class="nav nav-treeview" style="display: {{ Request::is('countries') || Request::is('countries/create') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('countries.index') }}"
            class="nav-link {{ Request::is('countries') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
                <p>{{__('app.show countries')}}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('countries.create') }}"
            class="nav-link {{ Request::is('countries/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
                <p>{{__('app.create countries')}}</p>
            </a>
        </li>
      </ul>
</li>
<li class="nav-item has-treeview {{ Request::is('cities') || Request::is('cities/create') ? 'menu-is-opening menu-open' : 'menu-close' }}">
    <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-map"></i>
      <p>
        {{__('app.cities')}}
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
      <ul class="nav nav-treeview" style="display: {{ Request::is('cities') || Request::is('cities/create') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('cities.index') }}"
            class="nav-link {{ Request::is('cities') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
                <p>{{__('app.show cities')}}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('cities.create') }}"
            class="nav-link {{ Request::is('cities/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
                <p>{{__('app.create cities')}}</p>
            </a>
        </li>
      </ul>
</li>
<li class="nav-item has-treeview {{ Request::is('users') || Request::is('users/create') ? 'menu-is-opening menu-open' : 'menu-close' }}">
    <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-user-circle"></i>
      <p>
        {{__('app.users')}}
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
      <ul class="nav nav-treeview" style="display: {{ Request::is('users') || Request::is('users/create') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('users.index') }}"
            class="nav-link {{ Request::is('users') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
                <p>{{__('app.show users')}}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.create') }}"
            class="nav-link {{ Request::is('users/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
                <p>{{__('app.create users')}}</p>
            </a>
        </li>
      </ul>
</li>

{{-- <li class="nav-item">
    <a href="{{ route('countries.index') }}"
    class="nav-link {{ Request::is('countries*') ? 'active' : '' }}">
    <p>Countries</p>
</a>
</li> --}}


{{-- <li class="nav-item">
    <a href="{{ route('cities.index') }}"
    class="nav-link {{ Request::is('cities*') ? 'active' : '' }}">
    <p>Cities</p>
</a>
</li> --}}
{{-- <li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>Users</p>
    </a>
</li> --}}

@endif
{{-- firmBranches --}}
@if (Auth::user()->permiisionsOwner('show branches'))
<li class="nav-item has-treeview {{ Request::is('firmBranches') || Request::is('firmBranches/create')  ? 'menu-open' : 'menu-close' }} ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-building"></i>
      <p>
          {{__('app.firm branches')}}
          <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ Request::is('firmBranches')|| Request::is('firmBranches/create') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('firmBranches.index') }}"
            class="nav-link {{ Request::is('firmBranches') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.show firm branches')}}</p>
        </a>
    </li>
        @if (Auth::user()->permiisionsOwner('manage branches'))
        <li class="nav-item">
            <a href="{{ route('firmBranches.create') }}"
            class="nav-link {{ Request::is('firmBranches/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.create firm branches')}}</p>
        </a>
    </li>
    @endif
</ul>
</li>
@endif

@if (Auth::user()->permiisionsOwner('show department'))
<li class="nav-item has-treeview {{ Request::is('departments') ? 'menu-open' : 'menu-close' }}">
    <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-th-large"></i>
      <p>
        {{__('app.departments')}}
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
      <ul class="nav nav-treeview" style="display: {{ Request::is('departments') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('departments.index') }}"
            class="nav-link {{ Request::is('departments') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
                <p>{{__('app.show departments')}}</p>
            </a>
        </li>
        @if (Auth::user()->permiisionsOwner('manage department'))
        <li class="nav-item">
            <a href="{{ route('departments.create') }}"
            class="nav-link {{ Request::is('departments/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
                <p>{{__('app.create department')}}</p>
            </a>
        </li>
        @endif
      </ul>
</li>
@endif
@if (Auth::user()->permiisionsOwner('show service'))
<li class="nav-item has-treeview {{ Request::is('services') ? 'menu-open' : 'menu-close' }} ">
    <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-handshake"></i>
      <p>
        {{__('app.services')}}
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
      <ul class="nav nav-treeview" style="display: {{ Request::is('services') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('services.index') }}"
            class="nav-link {{ Request::is('services') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
                <p>{{__('app.show services')}}</p>
            </a>
        </li>
        @if (Auth::user()->permiisionsOwner('manage service'))
        <li class="nav-item">
            <a href="{{ route('services.create') }}"
            class="nav-link {{ Request::is('services/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.create service')}}</p>
        </a>
    </li>
        @endif
    </ul>
</li>

{{-- <li class="nav-item">
    <a href="{{ route('serviceProviderServices.index') }}"
       class="nav-link {{ Request::is('serviceProviderServices*') ? 'active' : '' }}">
       <p>Service Provider Services</p>
    </a>
</li> --}}
<li class="nav-item has-treeview {{ Request::is('serviceSchedules')  ? 'menu-open' : 'menu-close' }} ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-calendar"></i>
      <p>
          {{__('app.service schedules')}}
          <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ Request::is('serviceSchedules')|| Request::is('serviceSchedules/create') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('serviceSchedules.index') }}"
            class="nav-link {{ Request::is('serviceSchedules') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.show service schedules')}}</p>
        </a>
    </li>
        @if (Auth::user()->permiisionsOwner('manage service'))
        <li class="nav-item">
            <a href="{{ route('serviceSchedules.create') }}"
            class="nav-link {{ Request::is('serviceSchedules/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.create service schedules')}}</p>
        </a>
    </li>
    @endif
</ul>
</li>

{{-- <li class="nav-item">
    <a href="{{ route('serviceSchedules.index') }}"
       class="nav-link {{ Request::is('serviceSchedules*') ? 'active' : '' }}">
       <p>Service Schedules</p>
    </a>
</li> --}}

@endif

@if (Auth::user()->permiisionsOwner('show providers'))
<li class="nav-item has-treeview {{ Request::is('serviceProviderServices')  ? 'menu-open' : 'menu-close' }} ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-server"></i>
      <p>
          {{__('app.service Provider Services')}}
          <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ Request::is('serviceProviderServices')|| Request::is('serviceProviderServices/create') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('serviceProviderServices.index') }}"
            class="nav-link {{ Request::is('serviceProviderServices') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.show service Provider Services')}}</p>
        </a>
    </li>
        @if (Auth::user()->permiisionsOwner('manage providers'))
        <li class="nav-item">
            <a href="{{ route('serviceProviderServices.create') }}"
            class="nav-link {{ Request::is('serviceProviderServices/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.create service Provider Services')}}</p>
        </a>
    </li>
    @endif
</ul>
</li>
@endif

@if (Auth::user()->permiisionsOwner('show user group'))
<li class="nav-item has-treeview {{ Request::is('userGroups')  ? 'menu-open' : 'menu-close' }} ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-users"></i>
      <p>
          {{__('app.user groups')}}
          <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ Request::is('userGroups')|| Request::is('userGroups/create') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('userGroups.index') }}"
            class="nav-link {{ Request::is('userGroups') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.show user groups')}}</p>
        </a>
    </li>
        @if (Auth::user()->permiisionsOwner('manage user group'))
        <li class="nav-item">
            <a href="{{ route('userGroups.create') }}"
            class="nav-link {{ Request::is('userGroups/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.create user groups')}}</p>
        </a>
    </li>
    @endif
</ul>
</li>
@endif


@if (Auth::user()->permiisionsOwner('manage service'))
<li class="nav-item has-treeview {{ Request::is('serviceTypes') || Request::is('serviceTypes/create')  ? 'menu-open' : 'menu-close' }} ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-info-circle"></i>
      <p>
          {{__('app.service types')}}
          <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ Request::is('serviceTypes')|| Request::is('serviceTypes/create') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('serviceTypes.index') }}"
            class="nav-link {{ Request::is('serviceTypes') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.show service types')}}</p>
        </a>
    </li>
        @if (Auth::user()->permiisionsOwner('manage service'))
        <li class="nav-item">
            <a href="{{ route('serviceTypes.create') }}"
            class="nav-link {{ Request::is('serviceTypes/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.create service types')}}</p>
        </a>
    </li>
    @endif
</ul>
</li>
@endif


@if (Auth::user()->permiisionsOwner('show rooms'))
<li class="nav-item has-treeview {{ Request::is('rooms*')   ? 'menu-open' : 'menu-close' }} ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-braille"></i>
      <p>
          {{__('app.rooms')}}
          <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ Request::is('rooms*') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('rooms.index') }}"
            class="nav-link {{ Request::is('rooms') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.show rooms')}}</p>
        </a>
    </li>
        @if (Auth::user()->permiisionsOwner('manage rooms'))
        <li class="nav-item">
            <a href="{{ route('rooms.create') }}"
            class="nav-link {{ Request::is('rooms/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.create rooms')}}</p>
        </a>
    </li>
    @endif
</ul>
</li>
@endif


@if (Auth::user()->permiisionsOwner('show user type'))
<li class="nav-item has-treeview {{ Request::is('userTypes*')   ? 'menu-open' : 'menu-close' }} ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-user-plus"></i>
      <p>
          {{__('app.user types')}}
          <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ Request::is('userTypes*') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('userTypes.index') }}"
            class="nav-link {{ Request::is('userTypes') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.show user types')}}</p>
        </a>
    </li>
        @if (Auth::user()->permiisionsOwner('manage user type'))
        <li class="nav-item">
            <a href="{{ route('userTypes.create') }}"
            class="nav-link {{ Request::is('userTypes/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.create user types')}}</p>
        </a>
    </li>
    @endif
</ul>
</li>
@endif


@if (Auth::user()->permiisionsOwner('show providers'))
<li class="nav-item has-treeview {{ Request::is('serviceProviders*')   ? 'menu-open' : 'menu-close' }} ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-address-card"></i>
      <p>
          {{__('app.service providers')}}
          <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ Request::is('serviceProviders*') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('serviceProviders.index') }}"
            class="nav-link {{ Request::is('serviceProviders') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.show service providers')}}</p>
        </a>
    </li>
        @if (Auth::user()->permiisionsOwner('manage providers'))
        <li class="nav-item">
            <a href="{{ route('serviceProviders.create') }}"
            class="nav-link {{ Request::is('serviceProviders/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.create service providers')}}</p>
        </a>
    </li>
    @endif
</ul>
</li>
@endif


@if (Auth::user()->permiisionsOwner('show beneficiaries'))
<li class="nav-item has-treeview {{ Request::is('beneficiaries*')   ? 'menu-open' : 'menu-close' }} ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-universal-access"></i>
      <p>
          {{__('app.beneficiaries')}}
          <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ Request::is('beneficiaries*') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('beneficiaries.index') }}"
            class="nav-link {{ Request::is('beneficiaries') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.show beneficiaries')}}</p>
        </a>
    </li>
        @if (Auth::user()->permiisionsOwner('manage beneficiaries'))
        <li class="nav-item">
            <a href="{{ route('beneficiaries.create') }}"
            class="nav-link {{ Request::is('beneficiaries/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.create beneficiaries')}}</p>
        </a>
    </li>
    @endif
</ul>
</li>

{{--
<li class="nav-item">
    <a href="{{ route('firmBeneficiaries.index') }}"
    class="nav-link {{ Request::is('firmBeneficiaries*') ? 'active' : '' }}">
    <p>Firm Beneficiaries</p>
</a>
</li> --}}
<li class="nav-item has-treeview {{ Request::is('caseDetails*')   ? 'menu-open' : 'menu-close' }} ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-file-text"></i>
      <p>
          {{__('app.case details')}}
          <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ Request::is('caseDetails*') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('caseDetails.index') }}"
            class="nav-link {{ Request::is('caseDetails') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.show case details')}}</p>
        </a>
    </li>
        @if (Auth::user()->permiisionsOwner('manage beneficiaries'))
        <li class="nav-item">
            <a href="{{ route('caseDetails.create') }}"
            class="nav-link {{ Request::is('caseDetails/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.create case details')}}</p>
        </a>
    </li>
    @endif
</ul>
</li>
@endif


@if (Auth::user()->permiisionsOwner('show accounting records'))
<li class="nav-item has-treeview {{ Request::is('beneficiaryAccountingRecords*')   ? 'menu-open' : 'menu-close' }} ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas icon-money"></i>
      <p>
          {{__('app.beneficiary accounting records')}}
          <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ Request::is('beneficiaryAccountingRecords*') ? 'block' : 'none' }};">
        <li class="nav-item">
            <a href="{{ route('beneficiaryAccountingRecords.index') }}"
            class="nav-link {{ Request::is('beneficiaryAccountingRecords') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.show beneficiary accounting records')}}</p>
        </a>
    </li>
        @if (Auth::user()->permiisionsOwner('manage accounting records'))
        <li class="nav-item">
            <a href="{{ route('beneficiaryAccountingRecords.create') }}"
            class="nav-link {{ Request::is('beneficiaryAccountingRecords/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>{{__('app.create beneficiary accounting records')}}</p>
        </a>
    </li>
    @endif
</ul>
</li>
@endif


{{-- @if (Auth::user()->permiisionsOwner('show users'))
<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>Users</p>
    </a>
</li>
@endif --}}



