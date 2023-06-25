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
                <label for="title_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.member.columns.title') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.title.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title_{{ $locale }}'), 'form-control-success': fields.title_{{ $locale }} && fields.title_{{ $locale }}.valid }" id="title_{{ $locale }}" name="title_{{ $locale }}" placeholder="{{ trans('admin.member.columns.title') }}">
                    <div v-if="errors.has('title_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('title_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>


<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('short_description_{{ $locale }}'), 'has-success': fields.short_description_{{ $locale }} && fields.short_description_{{ $locale }}.valid }">
                <label for="short_description_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.member.columns.short_description') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <!-- <input type="text" v-model="form.short_description.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('short_description_{{ $locale }}'), 'form-control-success': fields.short_description_{{ $locale }} && fields.short_description_{{ $locale }}.valid }" id="short_description_{{ $locale }}" name="short_description_{{ $locale }}" placeholder="{{ trans('admin.member.columns.short_description') }}"> -->
                    <div>
                        <textarea class="form-control" v-model="form.short_description.{{ $locale }}" v-validate="''" id="short_description_{{ $locale }}" name="short_description_{{ $locale }}" placeholder="{{ trans('admin.member.columns.short_description') }}"></textarea>
                    </div>
                    <div v-if="errors.has('short_description_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('short_description_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('short_description'), 'has-success': fields.short_description && fields.short_description.valid }">
    <label for="short_description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.member.columns.short_description') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.short_description" v-validate="''" id="short_description" name="short_description"></textarea>
        </div>
        <div v-if="errors.has('short_description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('short_description') }}</div>
    </div>
</div> -->

<div class="row">
    @foreach($locales as $locale)
    <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('description_{{ $locale }}'), 'has-success': fields.description_{{ $locale }} && fields.description_{{ $locale }}.valid }">
            <label for="description_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.member.columns.description') }}</label>
            <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                <div>
                    <wysiwyg v-model="form.description.{{ $locale }}" v-validate="''" id="description_{{ $locale }}" name="description_{{ $locale }}" :config="mediaWysiwygConfig"></wysiwyg>
                </div>
                <div v-if="errors.has('description_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('description_{{ $locale }}') }}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.member.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div> -->

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.member.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('member_category_id'), 'has-success': fields.member_category_id && fields.member_category_id.valid }">
    <label for="member_category_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.member.columns.member_category_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.member_category_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('member_category_id'), 'form-control-success': fields.member_category_id && fields.member_category_id.valid}" id="member_category_id" name="member_category_id" placeholder="{{ trans('admin.member.columns.member_category_id') }}">
        <div v-if="errors.has('member_category_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('member_category_id') }}</div>
    </div>
</div> -->
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('member_category_id'), 'has-success': fields.member_category_id && fields.member_category_id.valid }">
    <label for="member_category_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.member_category_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" name="member_category_id" id="member_category_id" v-model="form.member_category_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('member_category_id'), 'form-control-success': fields.member_category_id && fields.member_category_id.valid}">
            @foreach($memberCategories as $category )
            <option value="{{$category->id}}">{{ $category->title}}</option>
            @endforeach

        </select>
        <!-- <input type="text" v-model="form.member_category_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('member_category_id'), 'form-control-success': fields.member_category_id && fields.member_category_id.valid}" id="member_category_id" name="member_category_id" placeholder="{{ trans('admin.post.columns.member_category_id') }}"> -->
        <div v-if="errors.has('member_category_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('member_category_id') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('tags'), 'has-success': this.fields.tags && this.fields.tags.valid }">
    <label for="tags_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.tags_id') }}</label>
    <div class="col-md-8 col-lg-9">
        <multiselect v-model="form.tags" :options="availableTags" :multiple="true" track-by="id" label="title" tag-placeholder="{{ __('Select Tags') }}" placeholder="{{ __('Tags') }}">
        </multiselect>

        <div v-if="errors.has('tags')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('tags') }}
        </div>
    </div>
</div> -->