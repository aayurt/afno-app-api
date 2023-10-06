<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.student.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('ordination_name'), 'has-success': fields.ordination_name && fields.ordination_name.valid }">
    <label for="ordination_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.ordination_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ordination_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ordination_name'), 'form-control-success': fields.ordination_name && fields.ordination_name.valid}" id="ordination_name" name="ordination_name" placeholder="{{ trans('admin.student.columns.ordination_name') }}">
        <div v-if="errors.has('ordination_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ordination_name') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address'), 'has-success': fields.address && fields.address.valid }">
    <label for="address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.address') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('address'), 'form-control-success': fields.address && fields.address.valid}" id="address" name="address" placeholder="{{ trans('admin.student.columns.address') }}">
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('dob'), 'has-success': fields.dob && fields.dob.valid }">
    <label for="dob" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.dob') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.dob" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('dob'), 'form-control-success': fields.dob && fields.dob.valid}" id="dob" name="dob" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('dob')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('dob') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('gender'), 'has-success': fields.gender && fields.gender.valid }">
    <label for="gender" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.gender') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.gender" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('gender'), 'form-control-success': fields.gender && fields.gender.valid}" id="gender" name="gender" placeholder="{{ trans('admin.student.columns.gender') }}">
        <div v-if="errors.has('gender')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('gender') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.student.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('phone_no'), 'has-success': fields.phone_no && fields.phone_no.valid }">
    <label for="phone_no" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.phone_no') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phone_no" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('phone_no'), 'form-control-success': fields.phone_no && fields.phone_no.valid}" id="phone_no" name="phone_no" placeholder="{{ trans('admin.student.columns.phone_no') }}">
        <div v-if="errors.has('phone_no')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone_no') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('roll_no'), 'has-success': fields.roll_no && fields.roll_no.valid }">
    <label for="roll_no" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.roll_no') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.roll_no" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('roll_no'), 'form-control-success': fields.roll_no && fields.roll_no.valid}" id="roll_no" name="roll_no" placeholder="{{ trans('admin.student.columns.roll_no') }}">
        <div v-if="errors.has('roll_no')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('roll_no') }}</div>
    </div>
</div>



<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_type_id'), 'has-success': fields.student_type_id && fields.student_type_id.valid }">
    <label for="student_type_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_type_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" name="student_type_id" id="student_type_id" v-model="form.student_type_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_type_id'), 'form-control-success': fields.student_type_id && fields.student_type_id.valid}">
            @foreach($types as $type )
            <option value="{{$type->id}}">{{ $type->title}}</option>
            @endforeach

        </select>
        <!-- <input type="text" v-model="form.student_type_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_type_id'), 'form-control-success': fields.student_type_id && fields.student_type_id.valid}" id="student_type_id" name="student_type_id" placeholder="{{ trans('admin.student.columns.student_type_id') }}"> -->
        <div v-if="errors.has('student_type_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_type_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_class_id'), 'has-success': fields.student_class_id && fields.student_class_id.valid }">
    <label for="student_class_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.student_class_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" name="student_class_id" id="student_class_id" v-model="form.student_class_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_class_id'), 'form-control-success': fields.student_class_id && fields.student_class_id.valid}">
            @foreach($classes as $class )
            <option value="{{$class->id}}">{{ $class->title}}</option>
            @endforeach

        </select>
        <!-- <input type="text" v-model="form.student_class_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_class_id'), 'form-control-success': fields.student_class_id && fields.student_class_id.valid}" id="student_class_id" name="student_class_id" placeholder="{{ trans('admin.student.columns.student_class_id') }}"> -->
        <div v-if="errors.has('student_class_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_class_id') }}</div>
    </div>
</div>



