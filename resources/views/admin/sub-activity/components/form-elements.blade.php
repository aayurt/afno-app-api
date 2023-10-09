<div class="form-group row align-items-center" :class="{'has-danger': errors.has('activity_id'), 'has-success': fields.activity_id && fields.activity_id.valid }">
    <label for="activity_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sub-activity.columns.activity_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.activity_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('activity_id'), 'form-control-success': fields.activity_id && fields.activity_id.valid}" id="activity_id" name="activity_id" placeholder="{{ trans('admin.sub-activity.columns.activity_id') }}">
        <div v-if="errors.has('activity_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activity_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sub-activity.columns.title') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.title" v-validate="''" id="title" name="title"></textarea>
        </div>
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('subtitle'), 'has-success': fields.subtitle && fields.subtitle.valid }">
    <label for="subtitle" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sub-activity.columns.subtitle') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.subtitle" v-validate="''" id="subtitle" name="subtitle"></textarea>
        </div>
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

<div class="form-check row" :class="{'has-danger': errors.has('fullWidth'), 'has-success': fields.fullWidth && fields.fullWidth.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="fullWidth" type="checkbox" v-model="form.fullWidth" v-validate="''" data-vv-name="fullWidth"  name="fullWidth_fake_element">
        <label class="form-check-label" for="fullWidth">
            {{ trans('admin.sub-activity.columns.fullWidth') }}
        </label>
        <input type="hidden" name="fullWidth" :value="form.fullWidth">
        <div v-if="errors.has('fullWidth')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fullWidth') }}</div>
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

<div class="form-check row" :class="{'has-danger': errors.has('textTop'), 'has-success': fields.textTop && fields.textTop.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="textTop" type="checkbox" v-model="form.textTop" v-validate="''" data-vv-name="textTop"  name="textTop_fake_element">
        <label class="form-check-label" for="textTop">
            {{ trans('admin.sub-activity.columns.textTop') }}
        </label>
        <input type="hidden" name="textTop" :value="form.textTop">
        <div v-if="errors.has('textTop')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('textTop') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('textDark'), 'has-success': fields.textDark && fields.textDark.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="textDark" type="checkbox" v-model="form.textDark" v-validate="''" data-vv-name="textDark"  name="textDark_fake_element">
        <label class="form-check-label" for="textDark">
            {{ trans('admin.sub-activity.columns.textDark') }}
        </label>
        <input type="hidden" name="textDark" :value="form.textDark">
        <div v-if="errors.has('textDark')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('textDark') }}</div>
    </div>
</div>


