<div class="form-group row align-items-center" :class="{'has-danger': errors.has('date'), 'has-success': fields.date && fields.date.valid }">
    <label for="date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.member-attendance.columns.date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.date" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('date'), 'form-control-success': fields.date && fields.date.valid}" id="date" name="date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('clock_in'), 'has-success': fields.clock_in && fields.clock_in.valid }">
    <label for="clock_in" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.member-attendance.columns.clock_in') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.clock_in" :config="timePickerConfig" v-validate="'required|date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('clock_in'), 'form-control-success': fields.clock_in && fields.clock_in.valid}" id="clock_in" name="clock_in" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('clock_in')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('clock_in') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('clock_out'), 'has-success': fields.clock_out && fields.clock_out.valid }">
    <label for="clock_out" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.member-attendance.columns.clock_out') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.clock_out" :config="timePickerConfig" v-validate="'required|date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('clock_out'), 'form-control-success': fields.clock_out && fields.clock_out.valid}" id="clock_out" name="clock_out" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('clock_out')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('clock_out') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('early'), 'has-success': fields.early && fields.early.valid }">
    <label for="early" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.member-attendance.columns.early') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.early" :config="timePickerConfig" v-validate="'required|date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('early'), 'form-control-success': fields.early && fields.early.valid}" id="early" name="early" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('early')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('early') }}</div>
    </div>
</div>


<div class="form-check row" :class="{'has-danger': errors.has('must_cin'), 'has-success': fields.must_cin && fields.must_cin.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="must_cin" type="checkbox" v-model="form.must_cin" v-validate="''" data-vv-name="must_cin"  name="must_cin_fake_element">
        <label class="form-check-label" for="must_cin">
            {{ trans('admin.member-attendance.columns.must_cin') }}
        </label>
        <input type="hidden" name="must_cin" :value="form.must_cin">
        <div v-if="errors.has('must_cin')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('must_cin') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('must_cout'), 'has-success': fields.must_cout && fields.must_cout.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="must_cout" type="checkbox" v-model="form.must_cout" v-validate="''" data-vv-name="must_cout"  name="must_cout_fake_element">
        <label class="form-check-label" for="must_cout">
            {{ trans('admin.member-attendance.columns.must_cout') }}
        </label>
        <input type="hidden" name="must_cout" :value="form.must_cout">
        <div v-if="errors.has('must_cout')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('must_cout') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('att_time'), 'has-success': fields.att_time && fields.att_time.valid }">
    <label for="att_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.member-attendance.columns.att_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.att_time" :config="timePickerConfig" v-validate="'required|date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('att_time'), 'form-control-success': fields.att_time && fields.att_time.valid}" id="att_time" name="att_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('att_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('att_time') }}</div>
    </div>
</div>




<div class="form-group row align-items-center" :class="{'has-danger': errors.has('member_id'), 'has-success': fields.member_id && fields.member_id.valid }">
    <label for="member_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.member-attendance.columns.member_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" name="member_id" id="member_id" v-model="form.member_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('member_id'), 'form-control-success': fields.member_id && fields.member_id.valid}">
            @foreach($members as $member )
            <option value="{{$member->id}}">{{ $member->name}}</option>
            @endforeach

        </select>
        <!-- <input type="text" v-model="form.member_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('member_id'), 'form-control-success': fields.member_id && fields.member_id.valid}" id="member_id" name="member_id" placeholder="{{ trans('admin.student.columns.member_id') }}"> -->
        <div v-if="errors.has('member_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('member_id') }}</div>
    </div>
</div>