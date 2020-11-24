<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('page'), 'has-success': fields.page && fields.page.valid }">
    <label for="page" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ad.columns.page') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.page" v-validate="''" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('page'), 'form-control-success': fields.page && fields.page.valid}"
            id="page" name="page" placeholder="{{ trans('admin.ad.columns.page') }}">
        <div v-if="errors.has('page')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('page') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('direction'), 'has-success': fields.direction && fields.direction.valid }">
    <label for="direction" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ad.columns.direction') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.direction" v-validate="''" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('direction'), 'form-control-success': fields.direction && fields.direction.valid}"
            id="direction" name="direction" placeholder="{{ trans('admin.ad.columns.direction') }}">
        <div v-if="errors.has('direction')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('direction') }}</div>
    </div>
</div>

@isset($ad)
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Ad::class)->getMediaCollection('cover'),
    'media' => $ad->getThumbs200ForCollection('cover'),
    'label' => 'Cover'
    ])
</div>
@else
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Ad::class)->getMediaCollection('cover'),
    'label' => 'Cover'
    ])
</div>
@endisset