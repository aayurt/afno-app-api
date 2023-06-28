@isset($affiliatedGroup)
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\AffiliatedGroup::class)->getMediaCollection('cover'),
    'media' => $affiliatedGroup->getThumbs200ForCollection('cover'),
    'label' => 'Cover'
    ])
</div>

<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\AffiliatedGroup::class)->getMediaCollection('gallery'),
    'media' => $affiliatedGroup->getThumbs200ForCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@else
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\AffiliatedGroup::class)->getMediaCollection('cover'),
    'label' => 'Cover'
    ])
</div>

<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\AffiliatedGroup::class)->getMediaCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@endisset