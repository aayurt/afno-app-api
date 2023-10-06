@isset($activity)
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Activity::class)->getMediaCollection('cover'),
    'media' => $activity->getThumbs200ForCollection('cover'),
    'label' => 'Cover'
    ])
</div>

<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Activity::class)->getMediaCollection('gallery'),
    'media' => $activity->getThumbs200ForCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@else
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Activity::class)->getMediaCollection('cover'),
    'label' => 'Cover'
    ])
</div>

<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Activity::class)->getMediaCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@endisset