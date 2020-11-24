@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.ad.actions.edit', ['name' => $ad->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <ad-form
                :action="'{{ $ad->resource_url }}'"
                :data="{{ $ad->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.ad.actions.edit', ['name' => $ad->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.ad.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </ad-form>

        </div>
    
</div>

@endsection