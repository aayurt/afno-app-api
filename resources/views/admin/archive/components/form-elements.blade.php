<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.archive.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.archive.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('body'), 'has-success': fields.body && fields.body.valid }">
    <label for="body" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.archive.columns.body') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.body" v-validate="'required'" id="body" name="body" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('body')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('body') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('archive_subcategory_id'), 'has-success': fields.archive_subcategory_id && fields.archive_subcategory_id.valid }">
    <label for="archive_subcategory_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.archive.columns.archive_subcategory_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.archive_subcategory_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('archive_subcategory_id'), 'form-control-success': fields.archive_subcategory_id && fields.archive_subcategory_id.valid}" id="archive_subcategory_id" name="archive_subcategory_id" placeholder="{{ trans('admin.archive.columns.archive_subcategory_id') }}">
        <div v-if="errors.has('archive_subcategory_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('archive_subcategory_id') }}</div>
    </div>
</div> -->
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('archive_subcategory_id'), 'has-success': fields.archive_subcategory_id && fields.archive_subcategory_id.valid }">
    <label for="archive_subcategory_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.archive.columns.archive_subcategory_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" name="archive_subcategory_id" id="archive_subcategory_id" v-model="form.archive_subcategory_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('archive_subcategory_id'), 'form-control-success': fields.archive_subcategory_id && fields.archive_subcategory_id.valid}">
        @foreach($archiveSubcategories as $category )
            <option value="{{$category->id}}">{{ $category->title}}</option>
            @endforeach

        </select>
        <!-- <input type="text" v-model="form.archive_subcategory_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('archive_subcategory_id'), 'form-control-success': fields.archive_subcategory_id && fields.archive_subcategory_id.valid}" id="archive_subcategory_id" name="archive_subcategory_id" placeholder="{{ trans('admin.post.columns.archive_subcategory_id') }}"> -->
        <div v-if="errors.has('archive_subcategory_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('archive_subcategory_id') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.archive.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('public'), 'has-success': fields.public && fields.public.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="public" type="checkbox" v-model="form.public" v-validate="''" data-vv-name="public"  name="public_fake_element">
        <label class="form-check-label" for="public">
            {{ trans('admin.archive.columns.public') }}
        </label>
        <input type="hidden" name="public" :value="form.public">
        <div v-if="errors.has('public')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('public') }}</div>
    </div>
</div>


