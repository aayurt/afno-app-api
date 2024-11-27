<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tag'), 'has-success': fields.tag && fields.tag.valid }">
    <label for="tag" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.food-item-tag.columns.tag') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tag" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tag'), 'form-control-success': fields.tag && fields.tag.valid}" id="tag" name="tag" placeholder="{{ trans('admin.food-item-tag.columns.tag') }}">
        <div v-if="errors.has('tag')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tag') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('count'), 'has-success': fields.count && fields.count.valid }">
    <label for="count" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.food-item-tag.columns.count') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.count" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('count'), 'form-control-success': fields.count && fields.count.valid}" id="count" name="count" placeholder="{{ trans('admin.food-item-tag.columns.count') }}">
        <div v-if="errors.has('count')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('count') }}</div>
    </div>
</div>


