<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('activity_id'), 'has-success': fields.activity_id && fields.activity_id.valid }">
    <label for="activity_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sub-activity.columns.activity_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.activity_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('activity_id'), 'form-control-success': fields.activity_id && fields.activity_id.valid}" id="activity_id" name="activity_id" placeholder="{{ trans('admin.sub-activity.columns.activity_id') }}">
        <div v-if="errors.has('activity_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activity_id') }}</div>
    </div>
</div> -->
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('activity_id'), 'has-success': fields.activity_id && fields.activity_id.valid }">
    <label for="activity_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sub-activity.columns.activity_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" name="activity_id" id="activity_id" v-model="form.activity_id" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('activity_id'), 'form-control-success': fields.activity_id && fields.activity_id.valid}">
            @foreach($activities as $activity )
            <option value="{{$activity->id}}">{{ $activity->title}}</option>
            @endforeach

        </select>
        <div v-if="errors.has('activity_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activity_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sub-activity.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.sub-activity.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('subtitle'), 'has-success': fields.subtitle && fields.subtitle.valid }">
    <label for="subtitle" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sub-activity.columns.subtitle') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.subtitle" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('subtitle'), 'form-control-success': fields.subtitle && fields.subtitle.valid}" id="subtitle" name="subtitle" placeholder="{{ trans('admin.sub-activity.columns.subtitle') }}">
        <div v-if="errors.has('subtitle')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('subtitle') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('body'), 'has-success': fields.body && fields.body.valid }">
    <label for="body" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sub-activity.columns.body') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.body" v-validate="''" id="body" name="body" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('body')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('body') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('link'), 'has-success': fields.link && fields.link.valid }">
    <label for="link" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sub-activity.columns.link') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.link" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('link'), 'form-control-success': fields.link && fields.link.valid}" id="link" name="link" placeholder="{{ trans('admin.sub-activity.columns.link') }}">
        <div v-if="errors.has('link')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('link') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.sub-activity.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>


