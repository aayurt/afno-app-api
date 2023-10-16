@isset($subActivity)
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\SubActivity::class)->getMediaCollection('cover'),
    'media' => $subActivity->getThumbs200ForCollection('cover'),
    'label' => 'Cover'
    ])
</div>

<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\SubActivity::class)->getMediaCollection('gallery'),
    'media' => $subActivity->getThumbs200ForCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@else
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\SubActivity::class)->getMediaCollection('cover'),
    'label' => 'Cover'
    ])
</div>

<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\SubActivity::class)->getMediaCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@endisset