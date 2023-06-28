@isset($member)
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Member::class)->getMediaCollection('cover'),
    'media' => $member->getThumbs200ForCollection('cover'),
    'label' => 'Cover'
    ])
</div>

<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Member::class)->getMediaCollection('gallery'),
    'media' => $member->getThumbs200ForCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@else
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Member::class)->getMediaCollection('cover'),
    'label' => 'Cover'
    ])
</div>

<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Member::class)->getMediaCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@endisset