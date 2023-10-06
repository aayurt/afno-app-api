@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.sub-activity.actions.edit', ['name' => $subActivity->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <sub-activity-form
                :action="'{{ $subActivity->resource_url }}'"
                :data="{{ $subActivity->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.sub-activity.actions.edit', ['name' => $subActivity->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.sub-activity.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </sub-activity-form>

        </div>
    
</div>

@endsection