<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.student.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address'), 'has-success': fields.address && fields.address.valid }">
    <label for="address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.address') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('address'), 'form-control-success': fields.address && fields.address.valid}" id="address" name="address" placeholder="{{ trans('admin.student.columns.address') }}">
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address') }}</div>
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

