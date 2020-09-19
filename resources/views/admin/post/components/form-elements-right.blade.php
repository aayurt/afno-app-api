<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('brackets/admin-ui::admin.forms.publish') }}
    </div>
    <div class="card-block">

        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('published_at'), 'has-success': fields.published_at && fields.published_at.valid }">
            <label for="published_at" class="col-form-label text-md-left" :class="isFormLocalized ? 'col-md-12' : 'col-md-12'">{{ trans('admin.post.columns.published_at') }}</label>
            <div :class="isFormLocalized ? 'col-md-12' : 'col-md-12 col-xl-12'">
                <div class="input-group input-group--custom">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    <datetime v-model="form.published_at" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('published_at'), 'form-control-success': fields.published_at && fields.published_at.valid}" id="published_at" name="published_at" placeholder="Select date and time"></datetime>
                </div>
                <div v-if="errors.has('published_at')" class="form-control-feedback form-text" v-cloak>@{{errors.first('published_at') }}</div>
            </div>
        </div>
    </div>
</div>



@isset($post)
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Post::class)->getMediaCollection('cover'),
    'media' => $post->getThumbs200ForCollection('cover'),
    'label' => 'Cover'
    ])
</div>
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Post::class)->getMediaCollection('pdf'),
    'media' => $post->getThumbs200ForCollection('pdf'),
    'label' => 'PDF appendix'
    ])
</div>
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Post::class)->getMediaCollection('gallery'),
    'media' => $post->getThumbs200ForCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@else
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Post::class)->getMediaCollection('cover'),
    'label' => 'Cover'
    ])
</div>
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Post::class)->getMediaCollection('pdf'),
    'label' => 'PDF appendix'
    ])
</div>
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Post::class)->getMediaCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@endisset