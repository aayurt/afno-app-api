<div class="row form-inline" style="padding-bottom: 10px;" v-cloak>
    <div :class="{'col-xl-10 col-md-11 text-right': !isFormLocalized, 'col text-center': isFormLocalized, 'hidden': onSmallScreen }">
        <small>{{ trans('brackets/admin-ui::admin.forms.currently_editing_translation') }}<span v-if="!isFormLocalized && otherLocales.length > 1"> {{ trans('brackets/admin-ui::admin.forms.more_can_be_managed') }}</span><span v-if="!isFormLocalized"> | <a href="#" @click.prevent="showLocalization">{{ trans('brackets/admin-ui::admin.forms.manage_translations') }}</a></span></small>
        <i class="localization-error" v-if="!isFormLocalized && showLocalizedValidationError"></i>
    </div>

    <div class="col text-center" :class="{'language-mobile': onSmallScreen, 'has-error': !isFormLocalized && showLocalizedValidationError}" v-if="isFormLocalized || onSmallScreen" v-cloak>
        <small>{{ trans('brackets/admin-ui::admin.forms.choose_translation_to_edit') }}
            <select class="form-control" v-model="currentLocale">
                <option :value="defaultLocale" v-if="onSmallScreen">@{{defaultLocale.toUpperCase()}}</option>
                <option v-for="locale in otherLocales" :value="locale">@{{locale.toUpperCase()}}</option>
            </select>
            <i class="localization-error" v-if="isFormLocalized && showLocalizedValidationError"></i>
            <span>|</span>
            <a href="#" @click.prevent="hideLocalization">{{ trans('brackets/admin-ui::admin.forms.hide') }}</a>
        </small>
    </div>
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('title_{{ $locale }}'), 'has-success': fields.title_{{ $locale }} && fields.title_{{ $locale }}.valid }">
                <label for="title_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.post.columns.title') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.title.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title_{{ $locale }}'), 'form-control-success': fields.title_{{ $locale }} && fields.title_{{ $locale }}.valid }" id="title_{{ $locale }}" name="title_{{ $locale }}" placeholder="{{ trans('admin.post.columns.title') }}">
                    <div v-if="errors.has('title_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('title_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('location_{{ $locale }}'), 'has-success': fields.location_{{ $locale }} && fields.location_{{ $locale }}.valid }">
                <label for="location_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.post.columns.location') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.location.{{ $locale }}" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('location_{{ $locale }}'), 'form-control-success': fields.location_{{ $locale }} && fields.location_{{ $locale }}.valid }" id="location_{{ $locale }}" name="location_{{ $locale }}" placeholder="{{ trans('admin.post.columns.location') }}">
                    <div v-if="errors.has('location_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('location_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('body_{{ $locale }}'), 'has-success': fields.body_{{ $locale }} && fields.body_{{ $locale }}.valid }">
                <label for="body_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.post.columns.body') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <div>
                        <wysiwyg v-model="form.body.{{ $locale }}" v-validate="''" id="body_{{ $locale }}" name="body_{{ $locale }}" :config="mediaWysiwygConfig"></wysiwyg>
                    </div>
                    <div v-if="errors.has('body_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('body_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>


<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.post.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('popularity'), 'has-success': fields.popularity && fields.popularity.valid }">
    <label for="popularity" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.popularity') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.popularity" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('popularity'), 'form-control-success': fields.popularity && fields.popularity.valid}" id="popularity" name="popularity" placeholder="{{ trans('admin.post.columns.popularity') }}">
        <div v-if="errors.has('popularity')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('popularity') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('category_id'), 'has-success': fields.category_id && fields.category_id.valid }">
    <label for="category_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.category_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.category_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('category_id'), 'form-control-success': fields.category_id && fields.category_id.valid}" id="category_id" name="category_id" placeholder="{{ trans('admin.post.columns.category_id') }}">
        <div v-if="errors.has('category_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('category_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('author_id'), 'has-success': fields.author_id && fields.author_id.valid }">
    <label for="author_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.author_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.author_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('author_id'), 'form-control-success': fields.author_id && fields.author_id.valid}" id="author_id" name="author_id" placeholder="{{ trans('admin.post.columns.author_id') }}">
        <div v-if="errors.has('author_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('author_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tags_id'), 'has-success': fields.tags_id && fields.tags_id.valid }">
    <label for="tags_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.tags_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tags_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tags_id'), 'form-control-success': fields.tags_id && fields.tags_id.valid}" id="tags_id" name="tags_id" placeholder="{{ trans('admin.post.columns.tags_id') }}">
        <div v-if="errors.has('tags_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tags_id') }}</div>
    </div>
</div>


