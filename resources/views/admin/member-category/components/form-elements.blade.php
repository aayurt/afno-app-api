<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
      abel for="title" class="col-form-label text-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.member-category.columns.title') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
             <textarea class="form-control" v-model="form.title" v-validate'required'" id="title" name="title"></textarea>
        </div>
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
      div>
</div> -->
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

       
              
                                     <label for="title_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.member-category.columns.title') }}</label>

                                        <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                                     <div>
                                  <textarea class="form-control" v-model="form.title.{{ $locale }}" v-validate="'required'" id="title_{{ $locale }}" name="title_{{ $locale }}" placeholder="{{ trans('admin.member-category.columns.title') }}"></textarea>

           
                               </div>
                              <div v-if="errors.has('title_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('title_{{ $locale }}') }}</div>
            
                               </div>
</div>
                      </div>
    @endforeach
</div>    