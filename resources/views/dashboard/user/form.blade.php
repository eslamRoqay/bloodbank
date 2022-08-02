<div class="card-body row">
    <div class="form-group  col-4">
        <label>{{trans('users.name')}}<span
                class="text-danger">*</span></label>
        <input name="name" placeholder="{{trans('users.enter_name')}}" value="{{ old('name', $data->name ?? '') }}"
               class="form-control  {{ $errors->has('name') ? 'border-danger' : '' }}" type="text"
               maxlength="255"/>
        <span style="color: #FF5B5B" class="errors error_name" role="alert"></span>
    </div>
    <div class="form-group  col-4">
        <label>{{trans('users.email')}}<span
                class="text-danger">*</span></label>
        <input name="email" placeholder="{{trans('users.enter_email')}}" value="{{ old('email', $data->email ?? '') }}"
               class="form-control  {{ $errors->has('email') ? 'border-danger' : '' }}" type="email"
               maxlength="255"/>
        <span style="color: #FF5B5B" class="errors error_email" role="alert"></span>
    </div>

    <div class="form-group  col-4">
        <label>{{trans('users.phone')}}<span
                class="text-danger">*</span></label>
        <input name="phone" placeholder="{{trans('users.enter_phone')}}" value="{{ old('phone', $data->phone ?? '') }}"
               class="form-control  {{ $errors->has('phone') ? 'border-danger' : '' }}" type="tel"
               maxlength="255"/>
        <span style="color: #FF5B5B" class="errors error_phone" role="alert"></span>

    </div>

    <div class="form-group col-4">
        <label>{{trans('users.city')}}</label>
        <select name="city_id" class="form-control select2 {{ $errors->has('city_id') ? 'border-danger' : '' }}"
                id="kt_select2_1_modal">
            @foreach($cities as $row)
                <option
                    @if( Request::segment(3)== 'edit')
                    {{ $row->id == old('city_id',  $data->city_id)  ? 'selected' : '' }}
                    @else
                    {{ $row->id == old('city_id') ? 'selected' : '' }}
                    @endif
                    value="{{ $row->id }}">{{ $row->name_ar }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-4">
        <label>{{trans('users.government')}}</label>
        <select name="government_id"
                class="form-control select2 {{ $errors->has('government_id') ? 'border-danger' : '' }}"
                id="kt_select2_2_modal">
            @foreach($governments as $row)
                <option
                    @if( Request::segment(3)== 'edit')
                    {{ $row->id == old('government_id',  $data->city_id)  ? 'selected' : '' }}
                    @else
                    {{ $row->id == old('government_id') ? 'selected' : '' }}
                    @endif
                    value="{{ $row->id }}">{{ $row->name_ar }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-4">
        <label>{{trans('users.blood')}}</label>
        <select name="blood_id" class="form-control select2 {{ $errors->has('blood_id') ? 'border-danger' : '' }}"
                id="kt_select2_3_modal">
            @foreach($bloods as $row)
                <option
                    @if( Request::segment(3)== 'edit')
                    {{ $row->id == old('blood_id',  $data->blood_id)  ? 'selected' : '' }}
                    @else
                    {{ $row->id == old('blood_id') ? 'selected' : '' }}
                    @endif
                    value="{{ $row->id }}">{{ $row->blood }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-4">
        <label class="form-label text-right  ">{{trans('users.date_of_birth')}}</label>
        <div class="">
            <input type="date" name="date_of_birth"  value="{{ old('date_of_birth', $data->date_of_birth ?? '') }}" class="form-control  {{ $errors->has('date_of_birth') ? 'border-danger' : '' }}"  placeholder="{{trans('users.enter_date_of_birth')}}"/>
        </div>
    </div>

    <div class="form-group  col-4">
        <label>{{trans('users.password')}}

            @if(request()->segment(2) == 'create') <span class="text-danger">*</span>@endif

        </label>
        <input name="password" placeholder="{{trans('users.enter_password')}}" value="{{ old('password') }}"
               class="form-control  {{ $errors->has('password') ? 'border-danger' : '' }}" type="password"
               maxlength="255"/>
        <span style="color: #FF5B5B" class="errors error_password" role="alert"></span>
    </div>
    <div class="form-group  col-4">
        <label>{{trans('users.confirmation_password')}}
            @if(request()->segment(2) == 'create') <span class="text-danger">*</span> @endif
        </label>
        <input name="password_confirmation" placeholder="{{trans('users.enter_confirmation_password')}}"
               value="{{ old('password_confirmation') }}"
               class="form-control  {{ $errors->has('password_confirmation') ? 'border-danger' : '' }}" type="password"
               maxlength="255"/>
        <span style="color: #FF5B5B" class="errors error_password_confirmation" role="alert"></span>

    </div>



</div>
<div class="card-footer text-left">
    <button type="Submit" id="submit" class="btn btn-success btn-default ">حفظ</button>
    <a href="{{ URL::previous() }}" class="btn btn-secondary">الغاء</a>
</div>

