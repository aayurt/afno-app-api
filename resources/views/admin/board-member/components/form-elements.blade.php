<div class="form-group row align-items-center" :class="{'has-danger': errors.has('designation'), 'has-success': fields.designation && fields.designation.valid }">
    <label for="designation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.board-member.columns.designation') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.designation" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('designation'), 'form-control-success': fields.designation && fields.designation.valid}" id="designation" name="designation" placeholder="{{ trans('admin.board-member.columns.designation') }}">
        <div v-if="errors.has('designation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('designation') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('member_id'), 'has-success': fields.member_id && fields.member_id.valid }">
    <label for="member_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.board-member.columns.member_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.member_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('member_id'), 'form-control-success': fields.member_id && fields.member_id.valid}" id="member_id" name="member_id" placeholder="{{ trans('admin.board-member.columns.member_id') }}">
        <div v-if="errors.has('member_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('member_id') }}</div>
    </div>
</div>


