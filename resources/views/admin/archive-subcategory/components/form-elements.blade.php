<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.archive-subcategory.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.archive-subcategory.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.archive-subcategory.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>
<!-- 
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('archive_category_id'), 'has-success': fields.archive_category_id && fields.archive_category_id.valid }">
    <label for="archive_category_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.archive-subcategory.columns.archive_category_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.archive_category_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('archive_category_id'), 'form-control-success': fields.archive_category_id && fields.archive_category_id.valid}" id="archive_category_id" name="archive_category_id" placeholder="{{ trans('admin.archive-subcategory.columns.archive_category_id') }}">
        <div v-if="errors.has('archive_category_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('archive_category_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('archive_category_id'), 'has-success': fields.archive_category_id && fields.archive_category_id.valid }">
    <label for="archive_category_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.archive-subcategory.columns.archive_category_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" name="archive_category_id" id="archive_category_id" v-model="form.archive_category_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('archive_category_id'), 'form-control-success': fields.archive_category_id && fields.archive_category_id.valid}">
        @foreach($archiveCategories as $category )
            <option value="{{$category->id}}">{{ $category->title}}</option>
            @endforeach

        </select>
        <!-- <input type="text" v-model="form.archive_category_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('archive_category_id'), 'form-control-success': fields.archive_category_id && fields.archive_category_id.valid}" id="archive_category_id" name="archive_category_id" placeholder="{{ trans('admin.post.columns.archive_category_id') }}"> -->
        <div v-if="errors.has('archive_category_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('archive_category_id') }}</div>
    </div>
</div>
