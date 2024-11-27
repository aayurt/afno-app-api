@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.food-item-tag.actions.edit', ['name' => $foodItemTag->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <food-item-tag-form
                :action="'{{ $foodItemTag->resource_url }}'"
                :data="{{ $foodItemTag->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.food-item-tag.actions.edit', ['name' => $foodItemTag->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.food-item-tag.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </food-item-tag-form>

        </div>
    
</div>

@endsection