@isset($archive)
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Archive::class)->getMediaCollection('cover'),
    'media' => $archive->getThumbs200ForCollection('cover'),
    'label' => 'Cover'
    ])
</div>
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Archive::class)->getMediaCollection('pdf'),
    'media' => $archive->getThumbs200ForCollection('pdf'),
    'label' => 'PDF appendix'
    ])
</div>
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Archive::class)->getMediaCollection('gallery'),
    'media' => $archive->getThumbs200ForCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@else
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Archive::class)->getMediaCollection('cover'),
    'label' => 'Cover'
    ])
</div>
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Archive::class)->getMediaCollection('pdf'),
    'label' => 'PDF appendix'
    ])
</div>
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Archive::class)->getMediaCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@endisset